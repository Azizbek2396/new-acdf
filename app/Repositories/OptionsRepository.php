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


}
