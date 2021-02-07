<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use App\Validators\Validators;

class MenuController extends Controller
{
    protected $repo;
    public function __construct(MenuRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }


    public function index()
    {
        $model = $this->repo->getAll(20);
        $data = [
            'model' => $model,
        ];

        return view('admin.menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    public function create_item(Request $request, $parent)
    {
        $parent = $this->repo->getFindById($parent);
        $data = [
            'parent' => $parent,
            'parents' => $this->repo->getParents($parent->id)
        ];

        return view('admin.menu.create-item', $data);
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
        $validator = $validator->menu($request);
        if ($validator->fails()) {
            return redirect()->route('menu.create')
                ->withInput($request->input())
                ->withErrors($validator);
        }else {
            $res = $this->repo->create($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('menu.index');
            }else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    public function store_item(Request $request, $parent)
    {
        $validator = new Validators;
        $validator = $validator->menuitem($request);
        if ($validator->fails()) {
            return redirect()->route('menu.create-item', $parent)
                ->withInput($request->input())
                ->withErrors($validator);
        }else{
            $res = $this->repo->create_item($request, $parent);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('menu.show', $parent);
            }else{
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    public function edit_item(Request $request, $parent, $model)
    {
        $model = $this->repo->getFindById($model);
        $parent = $this->repo->getFindById($parent);
        $data = [
            'parent' => $parent,
            'model' => $model,
            'parents' => $this->repo->getParents($parent->id, $model->id)
        ];

        return view('admin.menu.edit-item', $data);
    }

    public function update_item(Request $request, $parent, $model)
    {
        $model = $this->repo->getFindById($model);
        $validator = new Validators;
        $validator = $validator->menuitem($request);
        if ($validator->fails()){
            return redirect()->route('menu.edit-item', ['menu' => $parent, 'item' => $model->id])
                ->withInput($request->input())
                ->withErrors($validator);
        }else {
            $res = $this->repo->update_item($request, $parent, $model);
            if ($res) {
                $request->session()->flash('success', 'Success');
                return redirect()->route('menu.show', $parent);
            }else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($model)
    {
        $model = $this->repo->getFindById($model);
        $data = [
            'model' => $model,
            'childrens' => $this->repo->getChildrens($model->id)
        ];

        return view('admin.menu.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
     public function edit($model)
     {
     		$model = $this->repo->getFindById($model);
         $data = [
           'model' => $model,
         ];

         return view('admin.menu.edit', $data);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $model)
     {
     		$model = $this->repo->getFindById($model);
         $validator = new Validators;
         $validator = $validator->menu($request);
         if ($validator->fails()) {
             return redirect()->route('menu.edit', $model->id)
                 ->withInput($request->input())
                 ->withErrors($validator);
         }else{
             $res = $this->repo->update($request, $model);
             if ($res) {
                 $request->session()->flash('success', 'Success!');
                 return redirect()->route('menu.index');
             }else{
                 $request->session()->flash('error', 'Error!');
                 return back();
             }
         }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $model)
    {
        $result = $this->repo->delete($model);
        if ($request) {
            $request->session()->flash('success', 'Success!');
            return redirect()->route('menu.index');
        }else {
            $request->session()->flash('error', 'Errors!');
        }
    }
}
