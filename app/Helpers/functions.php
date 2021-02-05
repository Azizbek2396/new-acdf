<?php

if (!function_exists('menu')) {
    function menu($name) {
        $menu = App\Repositories\MenuRepository::getMenuForSite($name);
        return $menu;
    }
}

if (!function_exists('tableLength')) {
    function tableLength($model) {
        $startPagePost = ($model->currentPage()-1)* $model->perPage() + 1;
        $endPagePost = ($model->currentPage()-1)* $model->perPage() + $model->perPage();
        $total = $model->total();
        if ($endPagePost > $total) {
            $endPagePost = $total;
        }
        if ($total == 0) {
            $startPagePost = 0;
        }
        return [
            'lengthPage' => $startPagePost.' - '.$endPagePost.' из '.$total,
            'startPage' => $startPagePost
        ];
    }
}
