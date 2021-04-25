<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RolesRepository;
use App\Validators\Validators;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $repo;

    public function __construct(RolesRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->repo->getAll(20);
        $data = [
            'roles' => $roles,
        ];
        return view('admin.roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [

        ];
        return view('admin.roles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = new Validators();
        $validator = $validator->roles($request);

        if ($validator->fails()) {
            return redirect()->route('roles.create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success');
                return redirect()->route('roles.index');
            } else {
                $request->session()->flash('error', 'Error');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
        $role = $this->repo->getFindById($role);
        $data = [
            'role' => $role,
        ];

        return view('admin.roles.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {
        $role = $this->repo->getFindById($role);
        $data = [
            'role' => $role
        ];
        return view('admin.roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $role = $this->repo->getFindById($role);
        $validtor = new Validators;
        $validtor = $validtor->roles($request);
        if ($validtor->fails()) {
            return redirect()->route('roles.edit')
                ->withInput($request->input())
                ->withErrors($validtor);
        } else {
            $res = $this->repo->update($request, $role);
            if ($res) {
                $request->session()->flash('success', 'Success');
                return redirect()->route('roles.index');
            } else {
                $request->session()->flash('error', 'Error');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $role)
    {
        $result = $this->repo->delete($role);
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('roles.index');
        } else {
            $request->session()->flash('error', 'Error');
            return back();
        }
    }
}
