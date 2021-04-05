<?php

namespace App\Repositories;

use App\Models\SocialNetwork;

class SocialNetworksRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new SocialNetwork();
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->orderBy('id', 'desc')->paginate($limit);
        return $data;
    }

    public function create($request)
    {
        $data = $request->except('_token');
        if (isset($data['icon'])){
            $icon = $this->fileUpload($data['icon']);
            $data['icon'] = $icon;
        }
        $model = $this->model;
        return $model->fill($data)->save();
    }

    public function fileUpload($file)
    {
        $fileName = time() . '-' . randomString() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs(
            'public', $fileName
        );

        return $fileName;
    }

}
