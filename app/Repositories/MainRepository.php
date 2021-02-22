<?php

namespace App\Repositories;

use App\Models\News;
use App\Models\TextBlock;

class MainRepository
{
    public function getNews($limit = 10)
    {
        $news = News::where('title->' . \App::getLocale(), '!=', '')->where('status', 1)->orderBy('date', 'DESC')->limit($limit)->get();
        return $news;
    }
    public function getBanners()
    {
        $data = TextBlock::where('name','like','%mainbanner%')->where('status',1)->orderBy('title->ru', 'asc')->get();
        if ($data) {
            return $data;
        }
        return false;
    }
}
