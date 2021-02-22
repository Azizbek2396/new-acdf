<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class NewsController extends Controller
{
    protected $repo;

    public function __construct(NewsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
          'model' => $this->repo->getAllForSite(18)->appends(Input::except('page'))
        ];

        return view('news.index', $data);
    }

    public function show($model)
    {
        $model = $this->repo->getFindByIdSiteName($model);
        $photos = $this->repo->getPhotos($model);
        $data = [
            'model' => $model,
            'photos' => $photos,
        ];

        return view('news.show', $data);
    }

    public function test()
    {
        $m = \App\Models\Albums::all();

        $b = dirname(__DIR__, 3) . "/public/uploads/";

        foreach($m as $i) {
            echo $b . $i->image . PHP_EOL;


            // $medium = \Image::make(public_path(getFull($i->image)))->resize(750, null, function ($constraint) {
            // $constraint->aspectRatio();
            // })->save('./uploads/medium/'.$i->image);


            $w = 750;
            $h = 450;
            $ratioWidth  = 16;
            $ratioHeight = 9;

            $image  = Image::make(public_path(getMedium($i->image)));
            $width  = $image->getWidth();
            $height = $image->getHeight();
            $rotate = false;

            if($width != $height) {

                if($height > $width) {
                    $image  = $image->rotate(-90);
                    $rotate = true;
                    $temp   = $width;
                    $width  = $height;
                    $height = $temp;
                    $ratioHeight = 14.1;
                    $w = 511;
                }

                $ratio  = $ratioWidth / $ratioHeight;
                $ratio_source = $width / $height;

                $is_15x9 = (int)(round($ratio_source, 2) * 100) == (int)(round($ratio, 2) * 100);

                if (!$is_15x9) {
                    if ($ratio_source < $ratio) {
                        $height = (int)round($width / $ratio);
                    } else {
                        $width = (int)round($height * $ratio);
                    }
                    $image = $image->crop($width, $height);
                }
            } else {
                $h = $w;
            }
            $image = $image->resize($w, $h, function ($constraint) {
                $constraint->aspectRatio();
            });
            if($rotate) {
                $image = $image->rotate(90);
            }

            $image->save('./uploads/medium/'.$i->image);
        }
        die;
    }
//
//    public function crop($filename)
//    {
////        $thumbnail = \Image::make( 'uploads/')->resize(200, null, function ($constraint) {
////            $constraint->aspectRatio();
////        })->save('./uploads/thumbnails/'.$fileName);
////        $medium = \Image::make($file)->resize(600, null, function ($constraint) {
////            $constraint->aspectRatio();
////        })->save('./uploads/medium/'.$fileName);
////        $savedFile = $file->move('./uploads/', $fileName);
//        return $fileName;
//    }
}
