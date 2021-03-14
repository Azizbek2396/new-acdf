<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AlbumsRepository;
use App\Validators\Validators;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{

    protected $repo;

    public function __construct(AlbumsRepository $repo)
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

        return view('admin.albums.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'statuses'  => $this->repo->getStatuses(),
            'visibleList'   => $this->repo->getVisibleList()
        ];

        return view('admin.albums.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = new Validators;
        $validator = $validator->albums($request);
        if ($validator->fails()) {
            return redirect()->route('albums.create')
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('albums.index');
            } else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $model
     * @return \Illuminate\Http\Response
     */
    public function show($model)
    {
        $model = $this->repo->getFindById($model);
        return view('admin.albums.show', [
            'model'  => $model,
            'albums' => $this->repo->getAlbumList(),
            'photos' => $this->repo->getAlbumImages($model->id),
        ]);
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

        return view('admin.albums.edit', [
            'statuses'      => $this->repo->getStatuses(),
            'model'         => $model,
            'visibleList'   => $this->repo->getVisibleList(),
        ]);
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
        $validator = new Validators;
        $validator = $validator->albums_update($request);
        if ($validator->fails()) {
            return redirect()->route('albums.edit', $model->id)
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $res = $this->repo->update($request, $model);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('albums.show', $model->id);
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
        $result = $this->repo->delete($model);
        if ($result) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('albums.index');
        }
        $request->session()->flash('error', 'Error!');
        return back();
    }
}
