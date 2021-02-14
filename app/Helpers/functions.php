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

if (!function_exists('generateMenu')){
    function generateMenu($childs, $class = "", $id = ""){
        if ($childs){
            $result = '<ul class="' . $class . '" ' . (!empty($id) ? 'id="' . $id . '"' : '') . '>';
            foreach ($childs as $item) {
                $result .= "<li>";
                $result .= "<a href='" . $item['item']->url . "'>";
                $result .= $item['item']->title;
                $result .= "</a>";
                if (generateMenu($item['childrens'])){
                    $result .= generateMenu($item['childrens'], 'sub-menu animated fadeIn');
                }
                $result .= "</li>";
            }
            $result .= "</ul>";
            return $result;
        }
        return false;
    }
}

if (!function_exists('generateMenuMobile')) {
    function generateMenuMobile($childs) {
        if ($childs) {
            $result = '<ul class="mmenu" id="top-mobile-menu">';
            $i = 1;
            foreach ($childs as $item) {
                $result .= "<li>";
                $sub = generateMenu($item['childrens'], 'collapse', 'sub-menu-link-' .$i);
                if ($sub) {
                    $result .= '<a data-toggle="collapse" data-parent="#top-mobile-menu" href="#sub-menu-link-' .$i.'">';
                    $i++;
                }else {
                    $result .= '<a href="' .$item['item']->url . '">';
                }
                $result .= $item['item']->title;
                $result .= "</a>";
                if ($sub){
                    $result .= $sub;
                }
                $result .= "</li>";
            }
            $result .= "</ul>";
            return $result;
        }
        return false;
    }
}

if (!function_exists('menu')){
    function menu($name) {
        $menu = \App\Repositories\MenuRepository::getMenuForSite($name);
        return $menu;
    }
}

if (!function_exists('randomString')) {
    function randomString($length = 16) {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($fileName)
    {
        if ($fileName){
            $fullFile = public_path('uploads/' . $fileName);
            $thumbnailFile = public_path('uploads/thumbnails/' . $fileName);
            $mediumFile = public_path('uploads/medium/' . $fileName);
            $squareThumbnail = public_path('uploads/360x360/' . $fileName);

            if (file_exists($fullFile)){
                unlink($fullFile);
            }

            if (file_exists($thumbnailFile)){
                unlink($thumbnailFile);
            }

            if (file_exists($squareThumbnail)){
                unlink($squareThumbnail);
            }
            if (file_exists($mediumFile)){
                unlink($mediumFile);
            }
        }
    }
}

if (!function_exists('getThumbnail')) {
    function getThumbnail($filename) {
        $file = public_path('uploads/thumbnails/' . $filename);
        if (file_exists($file)) {
            return '/uploads/thumbnails/' . $filename;
        }

        return false;
    }
}

if (!function_exists('getFull')) {
    function getFull($fileName)
    {
        $file = public_path('uploads/'.$fileName);
        if (file_exists($file)) {
            return '/uploads/'.$fileName;
        }
    }
}

if (!function_exists('textBlock')) {
    function textBlock($name){
        $textblock = \App\Repositories\TextBlocksRepository::getForSite($name);
        if ($textblock) {
            return $textblock;
        }
        return false;
    }
}
