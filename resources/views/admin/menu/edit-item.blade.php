@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Меню</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('menu.show', $parent) }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.menu._form-item',[
        'parent' => $parent,
        'model' => $model,
        'parents' => $parents
    ]) ?>
@endsection
