@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Роли</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('roles.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.roles._form', [
    ]) ?>
@endsection
