<?php

namespace App\Http\Controllers;

use App\Repositories\MainRepository;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $repo;

    public function __construct(MainRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return view('main.index');
    }
}
