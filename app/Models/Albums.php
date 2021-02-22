<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Albums extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'image',
        'date',
        'description',
        'status',
        'visible',
    ];

    public $translatable = [
        'title',
        'description',
    ];

}
