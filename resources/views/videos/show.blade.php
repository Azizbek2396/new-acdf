@extends('layouts.site')
@section('title', $model->title)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 mt-4 text-uppercase text-center">
                <h1 class="h1 caption">{{ __('main.video_gallery') }}</h1>
            </div>
            <div class="col-12 mt-2 text-center">
                <h4>{{ $model->title }}</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 video col-unset-padding pb-5">
                {!! $model->content !!}
            </div>
        </div>
    </div>
@endsection
