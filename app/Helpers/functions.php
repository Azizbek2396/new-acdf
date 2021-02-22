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

if (!function_exists('toAscii')) {
    function toAscii($str, $delimiter='-') {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', rus2translit(trim($str)));
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[_|+ -]+/", $delimiter, $clean);
        return $clean;
    }
}

if (!function_exists('rus2translit')) {
    function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }
}

if (!function_exists('getMadium')) {
    function getMedium($fileName){
        $file = public_path('uploads/medium/' . $fileName);
        if (file_exists($file)) {
            return '/uploads/medium/' . $fileName;
        }

        return false;
    }
}

if (!function_exists('mDateFormat')) {
    function mDateFormat($date) {
        $date = new \DateTime($date);
        $day = $date->format('d');
        $month = monthList($date->format('n'));
        $year = $date->format('Y');
        return $day . ' ' . $month . ' ' . $year;
    }
}

if (!function_exists('monthList')) {
    function monthList($month = false) {
        $arr = array(
            1  => __('main.January'),
            2  => __('main.February'),
            3  => __('main.March'),
            4  => __('main.April'),
            5  => __('main.May'),
            6  => __('main.June'),
            7  => __('main.July'),
            8  => __('main.August'),
            9  => __('main.September'),
            10 => __('main.October'),
            11 => __('main.November'),
            12 => __('main.December'),
        );
        if (isset($arr[$month])) {
            return $arr[$month];
        }
        return $arr;
    }
}
