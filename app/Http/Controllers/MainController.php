<?php

namespace App\Http\Controllers;

use App\Repositories\MainRepository;
use App\Validators\Validators;
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
        $data = [
          'banners' => $this->repo->getBanners(),
            'programs' => $this->repo->getPrograms(6),
            'news' => $this->repo->getNews(6),
        ];
        return view('main.index', $data);
    }

    public function contacts()
    {
        $data = [
            'contacts' => $this->repo->getContacts(),
            'model'    => $this->repo->getContactList(),
        ];

        return view('main.contacts', $data);
    }

    public function vacancies()
    {
        $model = $this->repo->getVacancies(20);

        $data = [
            'model' => $model
        ];

        return view('main.vacancies', $data);
    }

    public function contactSubmit(Request $request)
    {
        $validator = new Validators();
        $validator = $validator->contact_submit($request);
        if (count($validator->errors()) > 0) {
            return redirect()->route('site.contacts')
                ->withInput($request->input())
                ->withErrors($validator);
        }else {
            $res = $this->repo->createContactRequest($request);
            if ($res) {
                $request->session()->flash('success', 'Success!');
                return redirect()->route('site.contacts');
            }else {
                $request->session()->flash('error', 'Error!');
                return back();
            }
        }
    }
}
