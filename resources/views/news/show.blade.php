@extends('layouts.site')
@section('title', $model->title)

@section('css')

@endsection
@section('content')
@section('meta')
    <meta name="description" content="{{ strip_tags(mb_substr($model->content, 0,256)) }}">
    <meta name="keywords" content="{{ __('main.news') }},Культура,Маданият">
    <meta type="image/jpeg" name="link" href="{{ asset(getFull($model->image)) }}" rel="image_src">
    <meta property="og:title" content="{{ $model->title }}">
    <meta property="og:description" content="{{ strip_tags(mb_substr($model->content, 0,256)) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('site.news.show', $model->name) }}">
    <meta property="og:image" content="{{ asset(getFull($model->image)) }}">
    <meta property="og:site_name" content="acdf.uz">
    <meta property="article:published_time" content="{{ metaPublished($model->date) }}">
@endsection

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1 mt-4">
                <h1 class="h3">{{ $model->title }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1 my-2 col-unset-padding">
                <img class="img-fluid w-100" src="{{ getFull($model->image) }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="page-content section height-wrapper-400">
    <article class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1 mb-4 mt-2 mt-md-4 article">
                <?= $model->content ?>
            </div>
        </div>
    </article>
</div>

@if(isset($photos) && !empty($photos))
    <div class="galery light-primary">
        <div class="container">
            <div class="row">
                <div class="col-12 text-uppercase text-center">
                    <h2 class="mt-5 mb-1">{{ __('main.photo_gallery') }}</h2>
                </div>
            </div>
        </div>
        <div class="gallery-wrap pt-4 pb-5">
            <div class="container">
                <div class="row">
                    <div class="gallery-carousel owl-carousel">
                        <?php $i = 0; ?>
                        @foreach($photos as $item)
                            <div class="gallery-item item px-md-0 px-3 t-25s"
                                 style="{{isset($item->image_sizes->width) ? "width:". $item->image_sizes->width."px;": ""}}">
                                <div class="gallery-img" style="min-height: 260px;">
                                    <img src="{{ getMedium($item->image) }}" class="img-fluid w-100"
                                         alt="{{ $model->albumSite->title }}">
                                    <a class="gallery-expand t-25s"
                                       data-index="{{ $i++ }}"
                                       href="{{ getFull($item->image) }}"><i class="fa fa-expand"></i></a>
                                </div>
                                <div class="gallery-content mt-3">{!! $item->description !!}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
