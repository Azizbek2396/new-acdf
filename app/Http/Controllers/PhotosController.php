<?php

namespace App\Http\Controllers;

use App\Repositories\AlbumsRepository;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    protected $repo;
    public function __construct(AlbumsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
            'model' => $this->repo->getAllForSite(18),
        ];

        return view('photos.index', $data);
    }

    public function show($model)
    {
        $model = $this->repo->getFindByIdSite($model);
        $data = [
            'model' => $model,
            'photos' => $this->repo->getAlbumImages($model->id, 36),
        ];

        return view('photos.show', $data);
    }
}
