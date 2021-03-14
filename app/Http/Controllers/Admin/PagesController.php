<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PagesRepository;
use App\Validators\Validators;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $repo;
    public function __construct(PagesRepository $repo)
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
        return view('admin.pages.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'statuses' => $this->repo->getStatuses(),
        ];

        return view('admin.pages.create', $data);
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
        $validator = $validator->pages($request);
        if (count($validator->errors()) > 0) {
            return redirect()->route('pages.create')
                ->withInput($request->input())
                ->withErrors($validator);
        }else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('pages.index');
            } else {
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

        return view('admin.pages.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $model
     * @return void
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

        return view('admin.pages.edit', $data);
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
        $validator = $validator->pages($request);
        if (count($validator->errors()) > 0) {
            return redirect()->route('pages.edit', $model->id)
                ->withInput($request->input())
                ->withErrors($validator);
        }else{
            $res = $this->repo->update($request, $model);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('pages.show', $model->id);
            }else{
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
    public function destroy($id)
    {
        //
    }
}
