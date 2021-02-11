@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Фотогалерея</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('photos.edit', $model->id) }}" class="btn btn-primary pull-left">Редактировать</a>
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
                <th>Статус</th>
                <td><?= $model->status_name?$model->status_name:"<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
        </table>
    </div>
    <h2>Изображение</h2>
    <hr>
    <img src="<?= getFull($model->image) ?>" alt="">
    <hr>
    <?php echo Form::open(['route' => ['photos.destroy',$model->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
    {{ Form::hidden('id', $model->id) }}
    <button class="btn btn-danger btnConfirm">Удалить</button>
    <?= Form::close() ?>
@endsection
