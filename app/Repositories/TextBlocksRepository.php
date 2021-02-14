<?php

namespace App\Repositories;

use App\Models\TextBlock;

class TextBlocksRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new TextBlock;
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->where('name', 'NOT LIKE', '%mainbanner%')->orderBy('id', 'desc')->paginate($limit);
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
        if (isset($data['image'])){
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }

        $model = new TextBlock;

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

    public function delete($model)
    {
        $model = $this->getFindById($model);
        return $model->delete();
    }

    public static function getForSite($name)
    {
        $data = TextBlock::where('name', $name)->where('status', 1)->first();
        return $data;
    }
}
