<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PermissionsRepository;
use App\Validators\Validators;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    protected $repo;

    public function __construct(PermissionsRepository $repo)
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
        $permissions = $this->repo->getAll(20);
        $data = [
            'permissions' => $permissions
        ];

        return view('admin.permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
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
        $validator = $validator->permissions($request);
        if (count($validator->errors()) > 0) {
            return redirect()->route('permissions.create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $result = $this->repo->create($request);
            if ($result) {
                $request->session()->flash('success', 'Success');
                return redirect()->route('permissions.index');
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
    public function show($id)
    {
        $permission = $this->repo->getFindById($id);
        $data = [
            'permission' => $permission,
        ];

        return view('admin.permissions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repo->getFindById($id);

        $data = [
            'permission' => $permission
        ];

        return view('admin.permissions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = $this->repo->getFindById($id);
        $validator = new Validators();
        $validator = $validator->permissions($request);

        if (count($validator->errors()) > 0) {
            return redirect()->route('permissions.create', $model)
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $result = $this->repo->update($request, $model);
            if($result) {
                $request->session()->flash('success', 'Success');
                return redirect()->route('permissions.index');
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
    public function destroy(Request $request, $id)
    {
        $result = $this->repo->delete($id);
        if ($request) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('permissions.index');
        }else {
            $request->session()->flash('error', 'Error');
            return back();
        }
    }
}
