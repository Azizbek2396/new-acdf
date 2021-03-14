<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'name',
        'content',
        'description',
        'image',
        'status',
    ];

    public $translatable = [
        'title',
        'content',
        'description'
    ];

    public function delete()
    {
        deleteImage($this->image);

        parent::delete();

        return true;
    }

    public function getTitleDisplayAttribute()
    {
        return $this->title?$this->title:"<span style='color:red;'>Нет значение</span>";
    }

    public function getStatusNameAttribute()
    {
        $statuses = \Config::get('settings.statuses');
        $status = isset($statuses[$this->status]) ? $statuses[$this->status] : false;
        return $status;
    }

    public function getUrlAttribute()
    {
        $name = $this->name;
        return route('home') . "/pages/" . $name;
    }

}
