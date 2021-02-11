<?php

namespace App\Repositories;

use App\Models\TextBlock;

class MainRepository
{
    public function getBanners()
    {
        $data = TextBlock::where('name','like','%mainbanner%')->where('status',1)->orderBy('title->ru', 'asc')->get();
        if ($data) {
            return $data;
        }
        return false;
    }
}
