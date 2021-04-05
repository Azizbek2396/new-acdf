<?php

namespace App\Repositories;

use App\Models\Option;

class OptionsRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Option();
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->get();
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
        $model = new Option;

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
