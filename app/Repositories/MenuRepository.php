<?php

namespace App\Repositories;


use App\Models\Menu;

class MenuRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Menu;
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->where('type', 'parent')->with('parent')->paginate($limit);
        return $data;
    }
}
