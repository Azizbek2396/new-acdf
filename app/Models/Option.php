<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Option extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'json_field',
        'text_field',
        'name',
    ];

    public $translatable = [
        'json_field',
    ];
}
