@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Разрешение</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('permissions.edit', ['permission' => $permission->id]) }}" class="btn btn-primary pull-left">Редактировать</a>
    </div>
    <br>
    <!-- /.row -->
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <td><?= $permission->name ? $permission->name : "<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
            <tr>
                <th>Guard name</th>
                <td><?= $permission->guard_name ? $permission->guard_name : "<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
        </table>
    </div>
    <hr>
    <?php echo Form::open(['route' => ['permissions.destroy',$permission->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
    {{ Form::hidden('id', $permission->id) }}
    <button class="btn btn-danger btnConfirm">Удалить</button>
    <?= Form::close() ?>
@endsection
