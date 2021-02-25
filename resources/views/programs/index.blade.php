@extends('layouts.site')
@section('title', __('main.programs'))
@section('content')
    @include('layouts._template_info_blocks', [
        'title' => __('main.programs'),
        'model' => $model,
        'route' => 'site.programs.show',
        'links' => 'pagination.site',
    ])
@endsection
