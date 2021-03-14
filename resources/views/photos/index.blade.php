@extends('layouts.site')
@section('title', __('main.photo_gallery'))
@section('content')
    @include('layouts._template_info_blocks', [
      'title' => __('main.photo_gallery'),
      'model' => $model,
      'route' => 'site.photos.show',
      'links' => 'pagination.site',
    ])
@endsection
