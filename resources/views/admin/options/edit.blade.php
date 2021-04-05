@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $model->title }}</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('options.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.options._form', [
        'model'=> $model,
    ]) ?>
@endsection
