<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepasitory
{
    protected $model;
    public function __construct()
    {
        $this->model = new User();
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->with('roles')->orderBy('id', 'desc')->paginate($limit);
        return $data;
    }

}
