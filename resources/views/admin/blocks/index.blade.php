<?php
/**
 *
 * @var \App\Models\Blocks $model
 * @var \App\Models\Blocks $item
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Блоки</h1>
        </div>
    </div>
    <div class="clearfix text-right">
        <a href="{{ route('blocks.index') }}" class="btn btn-default" style="margin-left: 5px;">Все</a>
        <a href="{{ route('blocks.index.filter', 'vacancy') }}" class="btn btn-default" style="margin-left: 5px;">Вакансии</a>
        <a href="{{ route('blocks.index.filter', 'contact') }}" class="btn btn-default" style="margin-left: 5px;">Контакты</a>
        <a href="{{ route('blocks.create') }}" class="btn btn-primary" style="margin-left: 5px;">Добавить</a>
    </div>
    <!-- /.row -->
    <div class="table-responsive">
        {{ tableLength($model)['lengthPage'] }}
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Тип</th>
                <th>Статус</th>
                <th>Порядковый номер</th>
                <th></th>
            </tr>
            </thead>
            <?php if ($model): ?>
            <tbody>
            <?php $i = tableLength($model)['startPage']; foreach ($model as $item): ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->type_name }}</td>
                <td>{{ $item->status_name }}</td>
                <td>{{ $item->order }}</td>
                <td style="text-align: right;">
                    <a href="{{ route('blocks.show', $item->id) }}" class="btn btn-sm btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{ route('blocks.edit', $item->id) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?php echo Form::open(['route' => ['blocks.destroy', $item->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
                    {{ Form::hidden('id', $item->id) }}
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
            <?= $model->links(); ?>
        </div>
    </div>
@endsection
