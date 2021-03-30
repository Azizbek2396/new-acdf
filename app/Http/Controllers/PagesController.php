<?php

namespace App\Http\Controllers;

use App\Repositories\PagesRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $repo;

    public function __construct(PagesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function show($name)
    {
        $data = [
            'model' => $this->repo->getFindByIdSite($name),
        ];

        return view('pages.show', $data);
    }
}
