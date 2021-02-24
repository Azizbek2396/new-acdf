<?php

namespace App\Http\Controllers;

use App\Repositories\ProgramsRepository;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    protected $repo;
    public function __construct(ProgramsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
            'model' => $this->repo->getAllForSite(18),
        ];

        return view('programs.index', $data);
    }

    public function show($model)
    {
        $data = [
            'model' => $this->repo->getFindByIdSite($model)
        ];
        return view('programs.show', $data);
    }
}
