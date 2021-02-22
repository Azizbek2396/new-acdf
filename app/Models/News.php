<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'name',
        'content',
        'image',
        'status',
        'date',
        'albums_id',
    ];

    public $translatable = [
        'title',
        'content',
        'description'
    ];

    public function subject()
    {
        return $this->hasOne(NewsSubject::class, 'id', 'subject_id');
    }

    public function getTitleDisplayAttribute()
    {
        return $this->title ? $this->title : "<span style='color:red;'>Нет значение</span>";
    }

    public function getStatusNameAttribute()
    {
        $statuses = \Config::get('settings.statuses');
        $status = isset($statuses[$this->status]) ? $statuses[$this->status] : false;
        return $status;
    }
}
