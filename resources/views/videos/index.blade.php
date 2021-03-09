@extends('layouts.site')
@section('title', __('main.video_gallery'))
@section('content')
    @include('layouts._template_info_blocks', [
      'title' => __('main.video_gallery'),
      'model' => $model,
      'route' => 'site.videos.show',
      'links' => 'pagination.site',
    ])
@endsection
