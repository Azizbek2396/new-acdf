<?php

namespace App\Repositories;

use App\Models\Images;

class ImageRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Images();
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->orderBy('order,id', 'desc')->paginate($limit);
        return $data;
    }



}
