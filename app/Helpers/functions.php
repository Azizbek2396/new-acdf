<?php

if (!function_exists('menu')) {
    function menu($name) {
        $menu = App\Repositories\MenuRepository::getMenuForSite($name);
        return $menu;
    }
}
