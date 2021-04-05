<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use phpDocumentor\Reflection\Types\Parent_;
use Spatie\Translatable\HasTranslations;

class Blocks extends Model
{
    use HasTranslations;

    protected $fillable = [
        'type',
        'title',
        'description',
        'content',
        'order',
        'status',
        'image',
    ];

    public $translatable = [
        'title',
        'description',
        'content',
    ];

    public function getStatusNameAttribute()
    {
        $statuses = Config::get('settings.statuses');
        $status = isset($statuses[$this->status]) ? $statuses[$this->status] : false;
        return $status;
    }

    public function getTypeNameAttribute()
    {
        $types = Config::get('settings.blocks_types');
        $type = isset($types[$this->type]) ? $types[$this->type] : false;

        return $type;
    }

    public function delete()
    {
        deleteImage($this->image);
        return parent::delete();
    }
}
