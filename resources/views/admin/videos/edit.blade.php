@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Видеогалерея</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('videos.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.videos._form', [
        'model'=> $model,
        'statuses' => $statuses
    ]) ?>
@endsection
