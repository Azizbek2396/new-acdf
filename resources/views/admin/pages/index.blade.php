@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <?php /* ?>
    		<div class="object-link pull-right">
    			<strong>Перейти:</strong>
    			<a href="{{ route('site.pages.index') }}" target="_blank">{{ route('site.pages.index') }}</a>
    		</div>
    		<?php */ ?>
            <h1 class="page-header">Страницы</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('pages.create') }}" class="btn btn-primary pull-right">Добавить</a>
    </div>
    <!-- /.row -->
    <div class="table-responsive">
        {{ tableLength($model)['lengthPage'] }}
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Сататус</th>
                <th>Url</th>
                <th></th>
            </tr>
            </thead>
            <?php if ($model): ?>
            <tbody>
            <?php $i = tableLength($model)['startPage']; foreach ($model as $item): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $item->title_display ?></td>
                <td><?= $item->status_name ?></td>
                <td>
                    <a href="<?= $item->url ?>" target="_blank"><?= $item->url ?></a>
                </td>
                <td style="text-align: right;">
                    <a href="{{ route('pages.show', $item->id) }}" class="btn btn-sm btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{ route('pages.edit', $item->id) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?php if ($item->name != 'about' && $item->name != 'reports' && $item->name != 'practical-information'): ?>
                    <?php echo Form::open(['route' => ['pages.destroy',$item->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
                    {{ Form::hidden('id', $item->id) }}
                    <button class="btn btn-sm btn-danger btnConfirm">
                        <i class='glyphicon glyphicon-trash'></i>
                    </button>
                    <?= Form::close() ?>
                    <?php endif ?>
                </td>
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
