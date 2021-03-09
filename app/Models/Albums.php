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

    public function Photo()
    {
        return $this->hasMany('App\Models\Images', 'albums_id', 'id');
    }

    public function photoOrdered()
    {
        return $this->Photo()->orderBy('order', 'asc');
    }

    public function getStatusNameAttribute()
    {
        $statuses = \Config::get('settings.statuses');
        $status = isset($statuses[$this->status]) ? $statuses[$this->status] : false;
        return $status;
    }

    public function getVisibleNameAttribute()
    {
        $visible = \Config::get('settings.visible');
        $status  = isset($visible[$this->visible]) ? $visible[$this->visible] : false;
        return $status;
    }

}
