<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'parent_id',
        'title',
        'url',
        'name',
        'type',
        'order',
    ];

    public $translatable = [
        'title',
        'url',
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\Menu', 'parent_id');
    }

    public function getTitleDisplayAttribute()
    {
        return $this->title ? $this->title : "<span style='color: red;'>Нет значение</span>";
    }
}
