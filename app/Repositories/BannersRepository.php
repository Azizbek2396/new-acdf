<?php

namespace App\Repositories;

use App\Models\TextBlock;

class BannersRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new TextBlock;
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->where('name', 'like', '%mainbanner%')->orderBy('id', 'desc')->paginate($limit);
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

    public function getStatuses()
    {
        return \Config::get('settings.statuses');
    }

    public function create($request)
    {
        $data = $request->except('_token');
        $image = ImagesRepository::upload($data['image']);
        $data['image'] = $image;
        $data['name'] = 'mainbanner.' . $image;
        $data['title'] = [
            'ru'    => $data['title'],
            'uz'    => $data['title'],
            'en'    => $data['title']
        ];

        $model = new TextBlock;
        return $model->fill($data)->save();
    }
}
