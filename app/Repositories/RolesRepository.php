<?php

namespace App\Repositories;

use App\Models\Role;

class RolesRepository
{
    public function getAll($limit = 10)
    {
        $data = Role::orderBy('id', 'desc')->paginate($limit);
        return $data;
    }

    public function getFindById($id)
    {
        $data = Role::whereId($id)->first();
        if(!$data) {
            abort(404);
        }
        return $data;
    }

    public function create($request)
    {
        $data = $request->except('_token', 'permission');
        $role = Role::create($data);
        $permissions = $request->input('permission') ? $request->input('permission') : [];
       $role->givePermissionTo($permissions);
        if (! $role){
           return false;
       }
        return true;
    }

    public function update($request, $model)
    {
        $data = $request->except('_token');
        return $model->fill($data)->update();
    }

    public function getStatuses()
    {
        return \Config::get('settings.statuses');
    }

    public function delete($id)
    {
        $model = $this->getFindById($id);
        return $model->delete();
    }

    public function getAlbumImages($id, $limit = 10)
    {
        $data = Images::where('albums_id', $id)->orderBy('order', 'asc')->paginate($limit);
        return $data;
    }

    public function getAlbumList($limit = 100)
    {
        return ($this->model->limit($limit)->get())->mapWithKeys(function ($item) {
            return [$item->id => $item->title];
        });
    }

    public function getVisibleList()
    {
        return \Config::get('settings.visible');
    }

}
