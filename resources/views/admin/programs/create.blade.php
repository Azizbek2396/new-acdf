@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Программа</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('programs.index') }}" class="btn btn-default pull-left">Назад</a>
    </div>
    <?= View::make('admin.programs._form', [
        'statuses' => $statuses,
    ])?>
@endsection
