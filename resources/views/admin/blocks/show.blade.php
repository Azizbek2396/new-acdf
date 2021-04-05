<?php
/**
 *
 * @var \App\Models\Blocks $model
 */
?>

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Текстовый блок</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('blocks.edit', $model->id) }}" class="btn btn-primary pull-left">Редактировать</a>
    </div>
    <br>
    <!-- /.row -->
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Название</th>
                <td><?= $model->title ?></td>
            </tr>
            <tr>
                <th>Тип</th>
                <td>{{ $model->type_name }}</td>
            </tr>
            <tr>
                <th>Контент</th>
                <td>{!! $model->content !!}</td>
            </tr>
            <?php /*
        <tr>
            <th>Картинка</th>
            <td>
                <?php if ($model->image): ?>
                    <img src="<?= getThumbnail($model->image) ?>" alt="">
                <?php endif ?>
            </td>
        </tr>
        */ ?>
            <tr>
                <th>Порядок</th>
                <td>{{ $model->order }}</td>
            </tr>
            <tr>
                <th>Статус</th>
                <td><?= $model->status_name?$model->status_name:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
        </table>
    </div>
@endsection
