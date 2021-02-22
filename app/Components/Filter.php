<?php

namespace App\Components;


use Illuminate\Support\Facades\Request;

class Filter {
    public $model;
    public $attributes = [];
    public $limit;

    function __construct($model)
    {
        $this->model = $model;
        $this->attributes = [];
        $this->limit = 20;
    }

    public function getResults($attributes, $limit)
    {
        $selected = $this->getParams($attributes);
        return $this->model->where($selected);
    }

    public function getParams($attributes)
    {
        $params = Request::all();
        $arr = [];
        if (count($params) > 0) {
            foreach ($params as $param=>$value) {
                if (in_array($param, array_keys($attributes))){
                    if ($attributes[$param] == 'str') {
                        $arr[] = [$param, 'like', '%'. $value.'%'];
                    }
                    if ($attributes[$param] == 'int'){
                        $arr[] = [$param, '=', $value];
                    }
                }
            }
        }

        return $arr;
    }
}
