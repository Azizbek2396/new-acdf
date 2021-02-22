@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Новость</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('news.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.news._form', [
        'model'     => $model,
        'subjects'  => $subjects,
        'statuses'  => $statuses,
        'albums'    => $albums,
    ]) ?>
@endsection
