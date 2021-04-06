@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Пользователи</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">Добавить</a>
    </div>
    <!-- /.row -->
    <div class="table-responsive">
        {{ tableLength($users)['lengthPage'] }}
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Login</th>
                <th>Username</th>
                <th>Role</th>
                <th></th>
            </tr>
            </thead>
            <?php if ($users): ?>
            <tbody>
            <?php $i = tableLength($users)['startPage']; foreach ($users as $user): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $user->name?$user->name:"<span style='color:red;'>Нет значение</span>" ?></td>
                <td><?= $user->username?$user->username:"<span style='color:red;'>Нет значение</span>" ?></td>
                <td><?= $user->role_name?$user->role_name:"<span style='color:red;'>Нет значение</span>" ?></td>
                <td style="text-align: right;">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?= Form::open(['route' => ['users.destroy',$user->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
                    <?= Form::hidden('id', $user->id) ?>
                    <button class="btn btn-sm btn-danger btnConfirm">
                        <i class='glyphicon glyphicon-trash'></i>
                    </button>
                    <?= Form::close() ?>
                </td>
            </tr>
            <?php $i++; endforeach ?>
            </tbody>
            <?php endif ?>
        </table>

        <div class="text-right">
            <?= $users->links(); ?>
        </div>

    </div>
@endsection
