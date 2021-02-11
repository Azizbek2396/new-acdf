<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BannersRepository;
use App\Validators\Validators;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    protected $repo;
    public function __construct(BannersRepository $repo)
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
            'model' => $model,
        ];

        return view('admin.banners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
          'statuses' => $this->repo->getStatuses()
        ];

        return view('admin.banners.create', $data);
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
        $validator = $validator->banners($request);

        if ($validator->fails()) {
            return redirect()->route('mainbanners.create')
                ->withInput($request->input())
                ->withErrors($validator);
        }else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Succes!');
                return redirect()->route('mainbanners.index');
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

        return view('admin.banners.show', $data);
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
            deleteImage($model->image);
            $model->image = '';
            $model->save();
            echo 'removed';
            exit;
        }

        $data = [
            'statuses' => $this->repo->getStatuses(),
            'model' => $model,
        ];

        return view('admin.banners.edit', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
