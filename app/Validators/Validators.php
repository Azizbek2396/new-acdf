<?php

namespace App\Validators;

use App\Models\Page;
use Illuminate\Http\Request;
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

    public function videos($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'date'        => 'nullable|date',
            'content'        => 'required|string',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'status'         => 'required|integer',
        ], $this->messages);
    }

    public function videos_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'date'        => 'nullable|date',
            'content'        => 'required|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'status'         => 'required|integer',
        ], $this->messages);
    }

    public function albums($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width:360,max_height:360',
            'description'   => 'nullable|string',
            'date'          => 'nullable|date',
            'status'        => 'required|integer',
        ], $this->messages);
    }

    public function albums_update($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width:360,max_height:360',
            'description'   => 'nullable|string',
            'date'          => 'nullable|date',
            'status'        => 'required|integer',
        ], $this->messages);
    }

    public function image($request)
    {
        return Validator::make($request->all(), [
            'albums_id'  => 'required|numeric|exists:albums,id',
            'image'      => 'required|image',
        ], $this->messages);
    }

    public function image_update($request)
    {
        return Validator::make($request->all(), [
            'albums_id'  => 'required|numeric|exists:albums,id',
            'image'      => 'nullable|image',
        ], $this->messages);
    }
    public function image_move($request)
    {
        return Validator::make($request->all(), [
            'id'         => 'required|numeric|exists:images,id',
            'albums_id'  => 'required|numeric|exists:albums,id',
        ], $this->messages);
    }

    public function pages($request)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:255',
            'name'         => 'nullable|string|max:255',
            'content'      => 'required|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'nullable|string',
            'status'       => 'required|integer',
        ], $this->messages);

        return $this->checkPageNameToDublicate($validator, $request);
    }

    public function checkPageNameToDublicate($validator, $request)
    {
        if ($request->name) {
            $name = $request->name;
            $page = Page::where('name', $name)->first();
            if ($page) {
                $validator->getMessageBag()->add('name', 'Страница с таким Названием для урла уже существует');

            }
        }
        return $validator;
    }

    public function options($request)
    {
        return Validator::make($request->all(), [
            'title'         => 'nullable|string|max:255',
            'name'         => 'nullable|string',
        ], $this->messages);
    }

    public function blocks(Request $request)
    {
        return Validator::make($request->all(), [
            'type'          => 'required|integer',
            'title'         => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:255',
            'content'       => 'required|string',
            'order'         => 'nullable|integer',
            'status'        => 'required|integer',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], $this->messages);
    }

    public function blocks_update(Request $request)
    {
        return Validator::make($request->all(), [
            'type'          => 'required|integer',
            'title'         => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:255',
            'content'       => 'required|string',
            'order'         => 'nullable|integer',
            'status'        => 'required|integer',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], $this->messages);
    }

    public function contact_submit(Request $request)
    {
        return Validator::make($request->all(), [
            'name'                  => 'required|string|min:3|max:254',
            'email'                 => 'required|email|max:254',
            'subject'               => 'required|string|min:3|max:254',
            'message'               => 'required|string|min:3|max:512',
            'g-recaptcha-response'  => 'required|captcha',
        ], $this->messages);
    }
}
