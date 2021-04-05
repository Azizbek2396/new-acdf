@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Блок</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('blocks.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.blocks._form',[
        'statuses'  => $statuses,
        'types'     => $types,
    ]) ?>
@endsection
