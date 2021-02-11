@extends('layouts.site')
@section('title', __('main.home'))

@section('content')

    <!-- slider begin -->
    <?php if ($banners): ?>
    <div id="slider">
        <div class="slider-main owl-carousel owl-theme">
            <?php foreach ($banners as $banner): ?>
            <a href="{{ !empty($banner->url) ? $banner->url : '#' }}">
                <div style="background-image:url({{ getFull($banner->image) }});" class="slider-item">
                    <div class="caption-wrapper">
                        <div class="caption">
                            <?php if ($banner->content): ?>
                    <?= $banner->content ?>
                    <?php endif ?>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>
    <?php endif ?>

{{--    <?php $aboutSection = textBlock('about_section'); ?>--}}
{{--    <?php if ($aboutSection && isset($aboutSection->title) && !empty($aboutSection->title)): ?>--}}
{{--    <section class="section pb-5">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 mb-3 mt-5 text-center text-uppercase">--}}
{{--                    <h1 class="h1 caption">{{ $aboutSection->title }}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <?= $aboutSection->content ?>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <?php endif ?>--}}
{{--    <!-- news begin -->--}}
{{--    @if(count($news) > 0)--}}
{{--        <section class="section pb-5 light-primary">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 text-uppercase text-center">--}}
{{--                        <h1 class="h1 caption mt-5 mb-3">{{ __('main.news') }}</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <article class="container">--}}
{{--                <div class="row">--}}
{{--                    @foreach($news as $item)--}}
{{--                        <div class="col-12 col-sm-6 col-lg-4 mt-4 mb-4">--}}
{{--                            <div class="post ml-2 mr-2">--}}
{{--                                <a class="post-img" href="{{ route('site.news.show', $item->name) }}">--}}
{{--                                    <img src="{{ getMedium($item->image) }}" alt="{{ $item->title }}"--}}
{{--                                         class="img-fluid w-100">--}}
{{--                                </a>--}}
{{--                                <div class="post-body pt-2 pl-4 pr-4 pb-4">--}}
{{--                                    <div class="post-meta mb-2">--}}
{{--                                        <span class="post-date">{{ mDateFormat($item->date) }}</span>--}}
{{--                                    </div>--}}
{{--                                    <h3 class="post-title">--}}
{{--                                        <a class="t-25s"--}}
{{--                                           href="{{ route('site.news.show', $item->name) }}">{{ $item->title }}</a>--}}
{{--                                    </h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 text-center mt-5 mb-1">--}}
{{--                        <a class="btn btn-default ui t-25s"--}}
{{--                           href="{{ route('site.news') }}">{{ __('main.all_news') }}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--        </section>--}}
{{--    @endif--}}
{{--    <!-- news end -->--}}
{{--    @if(isset($programs) && count($programs))--}}
{{--        <section class="section pb-5 light-primary-darken">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 text-center text-uppercase mt-5 mb-3">--}}
{{--                        <h1 class="h1 caption">{{ __('main.programs') }}</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <article class="container">--}}
{{--                <div class="row">--}}
{{--                    @foreach($programs as $program)--}}
{{--                        <div class="col-12 col-sm-6 col-lg-4 mt-4 mb-4">--}}
{{--                            <div class="post ml-2 mr-2">--}}
{{--                                <a class="post-img" href="{{ route('site.programs.show', $program->id) }}">--}}
{{--                                    <img src="{{ getMedium($program->image) }}" alt="{{ $program->title }}"--}}
{{--                                         class="img-fluid w-100">--}}
{{--                                </a>--}}
{{--                                <div class="post-body pt-3 pl-4 pr-4 pb-4">--}}
{{--                                    <h3 class="post-title">--}}
{{--                                        <a class="t-25s"--}}
{{--                                           href="{{ route('site.programs.show', $program->id) }}">{{ $program->title }}</a>--}}
{{--                                    </h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </article>--}}
{{--        </section>--}}
{{--    @endif--}}
@endsection
