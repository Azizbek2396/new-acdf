<?php
namespace App\Repositories;


use Intervention\Image\Facades\Image;

class ImagesRepository
{
    public static function upload($file)
    {
        $fileName = time() . '-' . randomString() . '.' . $file->getClientOriginalExtension();
        $thumbnail = Image::make($file)->resize(200, null, function ($constraint){
            $constraint->aspectRatio();
        })->save('./uploads/thumbnails/' . $fileName);

        $medium = static::medium($file, $fileName);

        $savedFile = $file->move('./uploads/', $fileName);
        return $fileName;
    }

    public static function medium($file, $filename, $w = 750, $h = 450, $ratioWidth = 16, $ratioHeight = 9)
    {
        $image = Image::make($file);
        $width = $image->getWidth();
        $height = $image->getHeight();
        $rotate = false;

        if ($width != $height) {

            if ($height > $width) {
                $image = $image->rotate(-90);
                $rotate = true;
                $temp = $width;
                $width = $height;
                $height = $temp;
                $ratioHeight = 14.1;
                $w = 511;
            }

            $ratio = $ratioWidth / $ratioHeight;
            $ratio_source = $width / $height;

            $is_15x9 = (int)(round($ratio_source, 2) * 100) == (int)(round($ratio, 2) * 100);

            if (!$is_15x9){
                if ($ratio_source < $ratio){
                    $height = (int)round($width / $ratio);
                }else {
                    $width = (int)round($height * $ratio);
                }
                $image = $image->crop($width, $height);
            }
        }else {
            $h = $w;
        }

        $image = $image->resize($w, $h, function ($constraint) {
            $constraint->aspectRatio();
        });
        if ($ratio) {
            $image = $image->rotate(90);
        }

        return $image->save('./uploads/medium/' . $filename);
    }
}
