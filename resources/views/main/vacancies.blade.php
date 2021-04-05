@extends('layouts.site')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 mt-4 mb-3">
                <h1 class="h1 caption text-uppercase text-center">{{ __('main.vacancies') }}</h1>
            </div>
        </div>
    </div>
    @if(isset($model) && !empty($model))
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="black-accordion mb-5">
                        @include('layouts._accordion', [
                            'model' => $model
                        ])
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    {{ $model->links('pagination.site', ['model' => $model]) }}
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p>{{ __('main.not_available') }}</p>
                </div>
            </div>
        </div>
    @endif

@endsection
