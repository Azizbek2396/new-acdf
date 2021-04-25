@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Роль</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-primary pull-left">Редактировать</a>
    </div>
    <br>
    <!-- /.row -->
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <td><?= $role->name?$role->name:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
            <tr>
                <th>Guard name</th>
                <td><?= $role->guard_name?$role->guard_name:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
        </table>
    </div>
    <hr>
    <?php echo Form::open(['route' => ['roles.destroy',$role->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
    {{ Form::hidden('id', $role->id) }}
    <button class="btn btn-danger btnConfirm">Удалить</button>
    <?= Form::close() ?>
@endsection
