@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Разрешение</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('permissions.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.permissions._form', [
        'permission'=> $permission,
    ]) ?>
@endsection
