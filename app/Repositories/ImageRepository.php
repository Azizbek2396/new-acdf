<?php

namespace App\Repositories;

use App\Models\Images;

class ImageRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Images();
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->orderBy('order,id', 'desc')->paginate($limit);
        return $data;
    }

    public function create($request)
    {
        $data = $request->except('_token');
        if (isset($data['image'])){
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }
        $model = new Images();
        $bool = $model->fill($data)->save();
        $this->setImageOptions($model);
        return $bool;
    }

    public function setImageOptions(Images $model)
    {
        $photos = $this->model->where('albums_id', $model->albums_id)->get();
        $sizes = getImageSizes($photos);
//        dd($sizes);
        foreach ($photos as $item) {
//            dd($sizes[$item->id]);
//            $item->image_options = json_decode($sizes[$item->id]);
            $item->image_options = $sizes[$item->id];
            $item->save();
        }
    }

}
