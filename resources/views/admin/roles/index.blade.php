@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Роли</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('roles.create') }}" class="btn btn-primary pull-right">Добавить</a>
    </div>
    <!-- /.row -->
    <div class="table-responsive">
        {{ tableLength($roles)['lengthPage'] }}
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Guard Name</th>
            </tr>
            </thead>
            <?php if ($roles): ?>
            <tbody>
            <?php $i = tableLength($roles)['startPage']; foreach ($roles as $role): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $role->name?$role->name:"<span style='color:red;'>Нет значение</span>" ?></td>
                <td><?= $role->guard_name?$role->guard_name:"<span style='color:red;'>Нет значение</span>" ?></td>
                <?php  ?>
							<td style="text-align: right;">
								<a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-info">
									<i class="glyphicon glyphicon-eye-open"></i>
								</a>
								<a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								<?= Form::open(['route' => ['roles.destroy',$role->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
		                <?= Form::hidden('id', $role->id) ?>
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
            <?= $roles->links(); ?>
        </div>

    </div>
@endsection
