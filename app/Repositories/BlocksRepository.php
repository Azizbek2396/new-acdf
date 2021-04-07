<?php

namespace App\Repositories;

use App\Models\Blocks;

class BlocksRepository
{
    protected $model;
    protected $_types = [
        'vacancy' => 1,
        'contact' => 2,
    ];

    public function __construct()
    {
        $this->model = new Blocks();
    }

    public function getAll($type = "", $limit = 10)
    {
        if(isset($this->_types[$type]) && !empty($this->_types[$type])) {
            return $this->model->where('type', $this->_types[$type])->orderBy('created_at', 'desc')->paginate($limit);
        }

        $data = $this->model->orderBy('created_at', 'desc')->paginate($limit);
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

        if (isset($data['image'])){
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }

        $model = new Blocks();
        return $model->fill($data)->save();
    }

    public function update($request, $model)
    {
        $data = $request->except('_token');
        if (isset($data['image'])) {
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }

        return $model->fill($data)->update();
    }

    public function getStatuses()
    {
        return \Config::get('settings.statuses');
    }

    public function getTypes()
    {
        return \Config::get('settings.blocks_types');
    }

    public function delete($model)
    {
        $model = $this->getFindById($model);
        return $model->delete();
    }
}
