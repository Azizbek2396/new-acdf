@extends('layouts.site')
@section('title', __('main.news'))
@section('content')

    <section class="section pb-5 light-primary">
        <div class="container">
            <div class="row">
                <div class="col-12 text-uppercase text-center">
                    <h1 class="h1 caption mt-5 mb-1">{{ __('main.news') }}</h1>
                </div>
            </div>
        </div>
        <article class="container">
            <div class="row">
                @foreach($model as $item)
                    <div class="col-12 col-sm-6 col-lg-4 mt-4 mb-4">
                        <div class="post ml-2 mr-2">
                            <a class="post-img" href="{{ route('site.news.show', $item->name) }}">
                                <img src="{{ getMedium($item->image) }}" alt="{{ $item->title }}" class="img-fluid w-100">
                            </a>
                            <div class="post-body pt-3 pl-4 pr-4 pb-4">
                                <div class="post-meta mb-1">
                                    <span class="post-date">{{ mDateFormat($item->date) }}</span>
                                </div>
                                <h3 class="post-title">
                                    <a class="t-25s" href="{{ route('site.news.show', $item->name) }}">{{ $item->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{  $model->links('pagination.site', ['model' => $model]) }}
        </article>
    </section>
@endsection
