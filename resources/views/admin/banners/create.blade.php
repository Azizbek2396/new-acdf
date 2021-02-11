@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Баннеры</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('mainbanners.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.banners._form',[
        'statuses' => $statuses,
    ]) ?>
@endsection
