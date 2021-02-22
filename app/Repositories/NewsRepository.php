<?php

namespace App\Repositories;

use App\Components\Filter;
use App\Models\Albums;
use App\Models\News;
use App\Models\NewsSubject;
use League\Flysystem\Config;

class NewsRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new News;
    }

    public function getAll($limit = 10)
    {
        $data = $this->model->with('subject')->orderBy('id', 'desc')->paginate($limit);
        return $data;
    }

    public function getAllForSite($limit)
    {
        $data = (new Filter($this->model))->getResults([
            'subject_id' => 'int'
        ], $limit)->where('title->' . \App::getLocale(), '!=', '')->orderBy('date', 'desc')->where('status', 1)->paginate($limit);

        return $data;
    }

    public function getFindByIdSite($id)
    {
        $data = $this->model->where('id', $id)->where('title->' . \App::getLocale(), '!=', '')->where('status', 1)->first();
        if (!$data) {
            abort(404);
        }
        return $data;
    }

    public function getFindByIdSiteName($name)
    {
        $data = $this->model->where('name', $name)->where('title->' . \App::getLocale(), '!=', '')->where('status', 1)->first();
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
        if (isset($data['name'])){
            $data['name'] = toAscii($data['name']);
        }else {
            $data['name'] = $this->generateName(toAscii($data['title']));
        }

        $model = new News;
        return $model->fill($data)->save();
    }

    public function update($request, $model)
    {
        $data = $request->except('_token');
        if(isset($data['image'])) {
            $image = ImagesRepository::upload($data['image']);
            $data['image'] = $image;
        }
        return $model->fill($data)->update();
    }

    public function delete($model)
    {
        $model = $this->getFindById($model);
        return $model->delete();
    }

    public function getSubjects()
    {
        $data = NewsSubject::all();
        $arr = [];
        if ($data) {
            foreach ($data as $item) {
                if ($item->title) {
                    $arr[$item->id] = $item->title;
                }
            }
        }

        return $arr;
    }

    public function generateName($name)
    {
        $page = News::where('name', $name)->first();
        if ($page) {
            $name = $name . '2';
            return $this->generateName($name);
        }else {
            return $name;
        }
    }

    public function getAlbums($limit = 100)
    {
        return Albums::limit($limit)->get();
    }

    public function getAlbumsList($limit = 100)
    {
        return $this->getAlbums($limit)
            ->mapWithKeys(function ($item) {
                return [$item['id'] => $item['title']];
            });
    }

    public function getStatuses()
    {
        return \Config::get('settings.statuses');
    }

    public function getPhotos(News $model)
    {
        if ($albums = $model->albumSite) {
            return $albums->photoOrdered;
        }

        return false;
    }
}
