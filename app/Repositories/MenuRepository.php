<?php

namespace App\Repositories;


use App\Models\Menu;

class MenuRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Menu;
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->where('type', 'parent')->with('parent')->paginate($limit);
        return $data;
    }

    public function getFindById($id)
    {
        $data = $this->model->find($id);
        if (!$data){
            abort(404);
        }

        return $data;
    }

    public function create($request)
    {
        $data = $request->except('_token');
        $model = new Menu;
        $data['type'] = 'parent';

        return $model->fill($data)->save();
    }

    public function update($request, $model)
    {
        $data = $request->except('_token');
        return $model->fill($data)->update();
    }

    public function delete($model)
    {
        $model = $this->getFindById($model);
        return $model->delete();
    }

    public function create_item($request, $parent)
    {
        $data = $request->except('_token');
        $model = new Menu;
        $data['type'] = 'child';
        if (!isset($data['parent_id'])){
            $data['parent_id'] = $parent;
        }

        return $model->fill($data)->save();
    }

    public function update_item($request, $parent, $model)
    {
        $data = $request->except('_token');
        $data['type'] = 'child';
        if (!isset($data['parent_id'])) {
            $data['parent_id'] = $parent;
        }

        return $model->fill($data)->save();
    }

    public function getParents($id = false, $model_id = false)
    {
        if ($model_id){
            $data = $this->model->where('id', '!=', $model_id)->orderBy('order', 'ASC')->get();
        }else {
            $data = $this->model->orderBy('order', 'ASC')->get();
        }

        return $this->getMenuTree($data, $id);
    }

    public function getMenuTree($data, $parent_id, $level = '', $result = [])
    {
        $level .= '-';
        if ($data) {
            foreach ($data as $menu){
                if ($menu->parent_id == $parent_id && $menu->title){
                    $result[$menu->id] = $level.$menu->title;
                    $result = $this->getMenuTree($data, $menu->id, $level, $result);
                }
            }
        }

        return $result;
    }

    public function getChildrens($parent_id)
    {
        $data = $this->model->orderBy('order', 'ASC')->get();

        return $this->getChildsTree($data, $parent_id, '');
    }

    public function getChildsTree($data, $parent_id, $level = '', $result = [])
    {
        $level .= ' -';
        if ($data) {
            foreach ($data as $menu) {
                if ($menu->parent_id == $parent_id && $menu->title) {
                    $menu->title = $level . ' ' . $menu->title;
                    $result[] = $menu;
                    $result = $this->getChildsTree($data, $menu->id, $level, $result);
                }
            }
        }
        return $result;
    }
}
