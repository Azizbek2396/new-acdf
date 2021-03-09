<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Images extends Model
{
    use HasTranslations;

    protected $fillable = [
        'albums_id',
        'image',
        'order',
        'description',
        'image_options',
    ];

    public $translatable = [
        'description',
    ];

    public function delete()
    {
        deleteImage($this->image);
        parent::delete();
        return true;
    }

    public function getImageSizesAttribute()
    {
        return isset($this->image_options) ? json_decode($this->image_options) : false;
    }
}
