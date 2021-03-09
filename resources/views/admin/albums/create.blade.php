@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать альбом</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('albums.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.albums._form',[
        'statuses'      => $statuses,
        'visibleList'   => $visibleList,
    ]) ?>
@endsection
