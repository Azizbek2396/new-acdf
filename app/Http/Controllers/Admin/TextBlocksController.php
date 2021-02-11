<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TextBlocksRepository;
use App\Validators\Validators;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;

class TextBlocksController extends Controller
{
    protected $repo;
    public function __construct(TextBlocksRepository $repo)
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

        return view('admin.textblocks.index', $data);
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

        return view('admin.textblocks.create', $data);
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
        $validator = $validator->textblocks($request);
        if ($validator->fails()){
            return redirect()->route('textblocks.create')
                ->withInput($request->input())
                ->withErrors($validator);
        }else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('textblocks.index');
            }else{
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $model
     * @return void
     */
    public function show($model)
    {
        $model = $this->repo->getFindById($model);
        $data = [
            'model' => $model
        ];

        return view('admin.textblocks.show', $data);
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
        if (isset($_GET['removeimage'])){
            deleteImage($model->image);
            $model->image = '';
            $model->save();
            echo 'removed';
            exit;
        }

        $data = [
            'statuses' => $this->repo->getStatuses(),
            'model'    => $model,
        ];

        return view('admin.textblocks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $model
     * @return void
     */
    public function update(Request $request, $model)
    {
        $model = $this->repo->getFindById($model);
        $validator = new Validators;
        $validator = $validator->textblocks($request);
        if ($validator->fails()) {
            return redirect()->route('textblocks.edit', $model->id)
                ->withInput($request->input())
                ->withErrors($validator);
        }else {
            $res = $this->repo->update($request, $model);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('textblocks.show', $model->id);
            }else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $model
     * @return void
     */
    public function destroy(Request $request, $model)
    {
        $result = $this->repo->delete($model);
        if ($result) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('textblocks.index');
        }else {
            $request->session()->flash('error', 'Error!');
            return back();
        }
    }
}
