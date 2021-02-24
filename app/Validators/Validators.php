<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class Validators {

    public $messages = [
        'required' => 'Поля обязательно для заполнение',
        'email'    => 'E-mail',
        'max:255'  => 'Максимальная кольчество символов 255',
        'integer'  => 'Integer',
        'mimes'    => 'Разрешенные типы файлов: :values',
        'max'      => 'Максимальное значение :max',
        'image'    => 'Полья только для изображений',
        'date'     => 'Полья только для даты',
        'min'      => 'Минимальное количество символов :min',
        'exist'    => 'ddd',
    ];

    public function menu($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'name'         => 'required|string|max:255',
        ], $this->messages);
    }

    public function menuitem($request)
    {
        return Validator::make($request->all(), [
            'parent_id'         => 'nullable|string|max:255',
            'title'         => 'required|string|max:255',
            'url'         => 'required|string|max:255',
            'order'         => 'required|integer',
        ], $this->messages);
    }

    public function textblocks($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'name'         => 'nullable|string|max:255',
            'content'         => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'status'         => 'required|integer',
        ], $this->messages);
    }

    public function banners($request)
    {
        return Validator::make($request->all(), [
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'url'              => 'required|string|max:255',
        ], $this->messages);
    }

    public function news($request)
    {
        return Validator::make($request->all(), [
            // 'subject_id' => 'required|integer',
            'title'         => 'required|string|max:255',
            'content' => 'required|string',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'date'        => 'nullable|date',
            'status'      => 'required|integer',
        ], $this->messages);
    }

    public function news_update($request)
    {
        return Validator::make($request->all(), [
//            'subject_id' => 'required|integer',
            'title'         => 'required|string|max:255',
            'content' => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'date'        => 'nullable|date',
            'status'      => 'required|integer',
        ], $this->messages);
    }

    public function programs($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'content' => 'required|string',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'status'      => 'required|integer',
        ], $this->messages);
    }

    public function programs_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'content' => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'status'      => 'required|integer',
        ], $this->messages);
    }
}
