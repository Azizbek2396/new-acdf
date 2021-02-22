<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NewsSubject extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
    ];

    public $translatable = [
        'title',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'subject_id', 'id');
    }

    public function getTitleDisplayAttribute()
    {
        return $this->title?$this->title:"<span style='color:red;'>Нет значение</span>";
    }
}
