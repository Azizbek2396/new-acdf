<?php

namespace App\Http\Controllers;

use App\Repositories\VideosRepository;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    protected $repo;
    public function __construct(VideosRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
            'model' => $this->repo->getAllForSite(18),
        ];

        return view('videos.index', $data);
    }

    public function show($model)
    {
        $data = [
            'model' => $this->repo->getFindByIdSite($model)
        ];

        return view('videos.show', $data);
    }
}
