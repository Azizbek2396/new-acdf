<?php

namespace App\Repositories;


use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionsRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Permission();
    }

    public function getAll($limit = 10)
    {
//        if (! Gate::allows('users_manage')){
//            return abort(401);
//        }
//        dd(Gate::allows('users_manage'));
        $data = $this->model->orderBy('id', 'DESC')->paginate($limit);
        return $data;
    }

    public function getFindById($id)
    {
        $data = $this->model->find($id);
        if (!$data) {
            abort(404);
        }
        return $data;
    }

    public function create($request)
    {
        $data = $request->except('_token');
        $model = new Permission();
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


}
