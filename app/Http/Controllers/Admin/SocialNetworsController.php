<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\SocialNetworksRepository;
use App\Validators\Validators;
use Illuminate\Http\Request;

class SocialNetworsController extends Controller
{
    protected $repo;

    public function __construct(SocialNetworksRepository $repo)
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
        $model = $this->repo->getAll(20);
        $data = [
            'model' => $model
        ];

        return view('admin.social-networks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social-networks.create');
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
        $validator = $validator->social_networks($request);
        if ($validator->fails()) {
            return redirect()->route('social-networks.create')
                ->withInput($request->input())
                ->withErrors($validator);
        }else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('social-networks.index');
            }else {
                $request->session()->flash('error', 'Error!');
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
    public function show($model)
    {
        $model = $this->repo->getFindById($model);
        $data = [
            'model' => $model
        ];

        return view('admin.social-networks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($model)
    {
        $model = $this->repo->getFindById($model);
        if (isset($_GET['removeimage'])) {
            deleteStorageFile($model->icon);
            $model->icon = '';
            $model->save();
            echo 'removed';
            exit;
        }

        $data = [
            'model' => $model
        ];

        return view('admin.social-networks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $model)
    {
        $model = $this->repo->getFindById($model);
        $validator = new Validators();
        $validator = $validator->social_networks_update($request);
        if ($validator->fails()) {
            return redirect()->route('social-networks.create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->update($request, $model);
            if ($res) {
                $request->session()->flash('success', 'Success!');
               return redirect()->route('social-networks.index');
            } else {
                $request->session()->flash('error', 'Error!');
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
    public function destroy(Request $request, $model)
    {
        $res = $this->repo->delete($model);
        if ($res) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('social-networks.index');
        } else {
            $request->session()->flash('error', 'Error!');
            return back();
        }
    }
}
