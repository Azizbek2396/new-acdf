@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Разрешение</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('permissions.create') }}" class="btn btn-primary pull-right">Добавить</a>
    </div>
    <!-- /.row -->
    <div class="table-responsive">
        {{ tableLength($permissions)['lengthPage'] }}
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Guard Name</th>
            </tr>
            </thead>
            <?php if ($permissions): ?>
            <tbody>
            <?php $i = tableLength($permissions)['startPage']; foreach ($permissions as $permission): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $permission->name ? $permission->name : "<span style='color:red;'>Нет значение</span>" ?></td>
                <td><?= $permission->guard_name ? $permission->guard_name : "<span style='color:red;'>Нет значение</span>" ?></td>
                <?php  ?>
                <td style="text-align: right;">
                    <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-sm btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?= Form::open(['route' => ['permissions.destroy',$permission->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
                    <?= Form::hidden('id', $permission->id) ?>
                    <button class="btn btn-sm btn-danger btnConfirm">
                        <i class='glyphicon glyphicon-trash'></i>
                    </button>
                    <?= Form::close() ?>
                </td>
                <?php ?>
            </tr>
            <?php $i++; endforeach ?>
            </tbody>
            <?php endif ?>
        </table>

        <div class="text-right">
            <?= $permissions->links(); ?>
        </div>

    </div>
@endsection
