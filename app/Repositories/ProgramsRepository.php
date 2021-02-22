<?php

namespace App\Repositories;

use App\Models\Program;

class ProgramsRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Program;
    }

    public function getAll($limit)
    {
        $data = $this->model->orderBy('id', 'desc')->paginate($limit);
        return $data;
    }
}
