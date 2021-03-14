@extends('layouts.site')
@section('title', $model->title)

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/lightgallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/unite-gallery.css') }}">
@endsection

@section('content')

    <div class="py-5">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="h3">{{ $model->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($photos) && count($photos))
            <div class="page-content section single_gallery height-wrapper-400">
                <article class="container">
                    <div class="row">
                        <div class="col-12 mb-4 mt-2 mb-4 article">
                            <div id="gallery" style="display: none;">
                                @foreach($photos as $photo)
                                    <a href="http://unitegallery.net">
                                        <img alt="{{ $model->title }}"
                                             src="{{ getMedium($photo->image) }}"
                                             data-image="{{ getFull($photo->image) }}"
                                             data-description="{{ $model->title }}"
                                             style="display: none;">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </article>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            {{ $photos->links('pagination.site', ['model' => $photos]) }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
@endsection

@section('js')
    <script src="{{ asset('/acdf/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('/acdf/js/unitegallery.min.js') }}"></script>
    <script src="{{ asset('/acdf/js/ug-theme-tiles.js') }}"></script>
    <script src="{{ asset('/acdf/js/galery.js')}}"></script>
@endsection
