@extends('layouts.site')
@section('title', $model->title)
@section('content')

    <div class="section">
        <article class="container">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 mt-4">
                    <h1 class="h3">{{ $model->title }}</h1>
                </div>
            </div>
        </article>
    </div>
    <div class="section height-wrapper-400">
        <article class="container">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 article mt-2 mb-4">
                    <?= $model->content ?>
                </div>
            </div>
        </article>
    </div>

@endsection
