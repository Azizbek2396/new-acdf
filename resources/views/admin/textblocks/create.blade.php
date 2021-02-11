@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Текстовый блок</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('textblocks.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <br>
    <?= View::make('admin.textblocks._form',[
        'statuses' => $statuses,
    ]) ?>
@endsection
