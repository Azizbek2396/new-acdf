<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Program extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'content',
        'description',
        'image',
        'status',
    ];

    public $translatable = [
        'title',
        'description',
        'content',
    ];

    public function getTitleDisplayAttribute()
    {
        return $this->title?$this->title:"<span style='color:red;'>Нет значение</span>";
    }

    public function getStatusNameAttribute()
    {
        $statuses = \Config::get('settings.statuses');
        $status = isset($statuses[$this->status])?$statuses[$this->status]:false;
        return $status;
    }
}
