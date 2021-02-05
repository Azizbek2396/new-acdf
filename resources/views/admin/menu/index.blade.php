@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Меню</h1>
        </div>
    </div>
    <?php if (isset($_GET['dev'])): ?>
    <div class="clearfix">
        <a href="{{ route('menu.create') }}" class="btn btn-primary pull-right">Добавить</a>
    </div>
    <?php endif ?>
    <!-- /.row -->
    <div class="table-responsive">
        {{ tableLength($model)['lengthPage'] }}
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <?php if (isset($_GET['dev'])): ?>
                <th></th>
                <?php endif ?>
            </tr>
            </thead>
            <?php if ($model): ?>
            <tbody>
            <?php $i = tableLength($model)['startPage']; foreach ($model as $item): ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="{{ route('menu.show', $item->id) }}"><?= $item->title_display ?></a>
                </td>
                <?php if (isset($_GET['dev'])): ?>
                <td style="text-align: right;">
                    <a href="{{ route('menu.show', $item->id) }}" class="btn btn-sm btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?php echo Form::open(['route' => ['menu.destroy',$item->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
                    {{ Form::hidden('id', $item->id) }}
                    <button class="btn btn-sm btn-danger btnConfirm">
                        <i class='glyphicon glyphicon-trash'></i>
                    </button>
                    <?= Form::close() ?>
                </td>
                <?php endif ?>
            </tr>
            <?php $i++; endforeach ?>
            </tbody>
            <?php endif ?>
        </table>

        <div class="text-right">
            <?= $model->links(); ?>
        </div>
    </div>
@endsection
