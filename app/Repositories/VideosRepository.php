<?php

namespace App\Repositories;

use App\Models\Video;

class VideosRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Video();
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->orderBy('id', 'DESC')->paginate($limit);
        return $data;
    }

    public function create($request)
    {
        $data = $request->except('_token');
        if (isset($data['image'])) {
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }

        $model = new Video;
        return $model->fill($data)->save();
    }

    public function getStatuses()
    {
        return \Config::get('settings.statuses');
    }

}
