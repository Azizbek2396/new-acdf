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

    public function getParentItemAttribute()
    {
        if ($this->parent) {
            if ($this->parent->type == 'child') {
                return $this->parent;
            }
        }
        return false;
    }

    public function getParentRootAttribute()
    {
        return $this->getRootParent($this->parent);
    }

    public function getRootParent($parent)
    {
        if ($parent) {
            if ($parent->type == 'child') {
                return $this->getRootParent($parent->parent);
            }else{
                return $parent;
            }
        }
        return false;
    }

    public function children()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id')->orderBy('order', 'ASC');
    }

    public function getChildrensAttribute()
    {
        return $this->getTreeChildrens($this);
    }

    public function getTreeChildrens($model)
    {
        if(count($model->children)){
            $arr = [];
            foreach ($model->children as $child) {
                $arr[$child->id]['item'] = $child;
                $arr[$child->id]['childrens'] = $this->getTreeChildrens($child);
            }
            return $arr;
        }
        return false;
    }

    public function getTitleDisplayAttribute()
    {
        return $this->title ? $this->title : "<span style='color: red;'>Нет значение</span>";
    }
}
