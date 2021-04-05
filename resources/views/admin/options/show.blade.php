@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Опции</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('options.edit', $model->id) }}" class="btn btn-primary pull-left">Редактировать</a>
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
                <th>Контент</th>
                <td>
                    <?php if ($model->json_field): ?>
                        <?= $model->json_field?>
                    <?php else:?>
                        <?= $model->text_field ?>
                    <?php endif ?>
                </td>
            </tr>
        </table>
    </div>
    <?php echo Form::open(['route' => ['options.destroy',$model->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
    {{ Form::hidden('id', $model->id) }}
    <button class="btn btn-danger btnConfirm">Удалить</button>
    <?= Form::close() ?>
@endsection
