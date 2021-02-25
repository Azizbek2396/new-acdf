@extends('layouts.site')
@section('title', $model->title)
@section('content')

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
                <div class="col-12 col-lg-10 offset-lg-1 col-unset-padding my-2">
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

@endsection
