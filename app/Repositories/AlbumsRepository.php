<?php

namespace App\Repositories;

use App\Models\Albums;
use App\Models\Images;

class AlbumsRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Albums();
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->with('Photo')->orderBy('id', 'DESC')->paginate($limit);
        return $data;
    }

    public function getAllForSite($limit = 10)
    {
        $data = $this
            ->model
            ->orderBy('date', 'desc')
            ->where(['status' => 1, 'visible' => 1])
            ->paginate($limit);
        return $data;
    }

    public function getFindByIdSite($id)
    {
        $data = $this
            ->model
            ->where('id',$id)
            ->where('title->'.\App::getLocale(),'!=','')
            ->where('status',1)
            ->first();
        if (!$data) {
            abort(404);
        }
        return $data;
    }

    public function getFindById($id)
    {
        $data = $this->model->find($id);
        if (!$data) {
            abort(404);
        }
        return $data;
    }

    public function create($request)
    {
        $data = $request->except('_token');
        if (isset($data['image'])) {
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }
        $model = new Albums();
        return $model->fill($data)->save();
    }

    public function update($request, $model)
    {
        $data = $request->except('_token');
        if (isset($data['image'])) {
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }
        return $model->fill($data)->update();
    }

    public function getStatuses()
    {
        return \Config::get('settings.statuses');
    }

    public function delete($model)
    {
        $model = $this->getFindById($model);
        foreach($model->Photo as $item) {
            $item->delete();
        }
        return $model->delete();
    }

    public function getAlbumImages($id, $limit = 10)
    {
        $data = Images::where('albums_id', $id)->orderBy('order', 'asc')->paginate($limit);
        return $data;
    }

    public function getAlbumList($limit = 100)
    {
        return ($this->model->limit($limit)->get())->mapWithKeys(function ($item) {
            return [$item->id => $item->title];
        });
    }

    public function getVisibleList()
    {
        return \Config::get('settings.visible');
    }

}
