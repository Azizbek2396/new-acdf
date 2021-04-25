@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Пользователь</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary pull-left">Редактировать</a>
    </div>
    <br>
    <!-- /.row -->
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Login</th>
                <td><?= $user->name?$user->name:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?= $user->username?$user->username:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><?= $user->email?$user->email:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td><?= $user->role_name?$user->role_name:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
        </table>
    </div>
    <hr>
    <?php echo Form::open(['route' => ['users.destroy',$user->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
    {{ Form::hidden('id', $user->id) }}
    <button class="btn btn-danger btnConfirm">Удалить</button>
    <?= Form::close() ?>
@endsection
