@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Программа</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('programs.edit', $model->id) }}" class="btn btn-primary pull-left">Редактировать</a>
    </div>
    <br>
    <!-- /.row -->
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Название</th>
                <td><?= $model->title_display ?></td>
            </tr>
            <tr>
                <th>Картинка</th>
                <td>
                    <?php if ($model->image): ?>
                    <img src="<?= getThumbnail($model->image) ?>" alt="">
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <th>Описание</th>
                <td><?= $model->description?$model->description:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
            <tr>
                <th>Статус</th>
                <td><?= $model->status_name?$model->status_name:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
        </table>
    </div>
    <h2>Контент</h2>
    <hr>
    <div class="post-content">
        <?= $model->content ?>
    </div>
    <hr>
    <?php echo Form::open(['route' => ['programs.destroy',$model->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
    {{ Form::hidden('id', $model->id) }}
    <button class="btn btn-danger btnConfirm">Удалить</button>
    <?= Form::close() ?>
@endsection
