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

    public function getFindById($id)
    {
        $data = $this->model->find($id);
        if (!$data)
        {
            abort(404);
        }
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

    public function update($request, $model)
    {
        $data = $request->except('_token');
        if (isset($data['image'])) {
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }

        $bool = $model->fill($data)->save();
        $this->setImageOptions($model);
        return $bool;
    }

    public function delete($model)
    {
        $model = $this->getFindById($model);
        return $model->delete();
    }

    public function setImageOptions(Images $model)
    {
        $photos = $this->model->where('albums_id', $model->albums_id)->get();
        $sizes = getImageSizes($photos);

        foreach ($photos as $item) {
            $item->image_options = json_encode($sizes[$item->id]);
            $item->save();
        }
    }

}
