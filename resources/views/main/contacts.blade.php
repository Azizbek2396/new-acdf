@extends('layouts.site')
@section('title', __('main.contacts'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5 text-center text-uppercase">
                <h1>{{ __('main.contacts') }}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-2 m-t-30">
                <div class="container">
                    <p>{!! isset($contacts['address']) ? $contacts['address'] : "" !!}</p>
                </div>
            </div>
            <div class="col-lg-4 m-t-30">
                <div class="container">
                    <p>{{ __('main.phone') }}:
                        <a href="tel:{{ isset($contacts['telNumber']) ? $contacts['telNumber'] : '' }}" class="text-decoration-none underline">
                            {{ isset($contacts['telNumber']) ? $contacts['telNumber'] : "" }}
                        </a>
                    </p>
                    <p>Email:
                        <a href="mailto:{{ isset($contacts['adminEmail']) ? $contacts['adminEmail'] : '' }}" class="text-decoration-none underline">
                            {{ isset($contacts['adminEmail']) ? $contacts['adminEmail'] : "" }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="black-accordion my-3">
                    <div class="container">
                        @include('layouts._accordion', [
                            'model' => $model
                        ])
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5">
                {{ $model->links('pagination.site', ['model' => $model]) }}
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 my-2">
                <h3 class="text-uppercase text-center">{{__('main.contact_us')}}</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 mb-4">
                @include('layouts._contact_form')
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @if($contacts['iframeMaps'])
                {!! $contacts['iframeMaps'] !!}
            @endif
        </div>
    </div>
@endsection
