@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Альбом</h1>
        </div>
    </div>
    <div class="clearfix">

        <a href="{{ route('albums.edit', $model->id) }}" class="btn btn-primary pull-left" style="margin-right: 5px">Редактировать</a>

        <?php echo Form::open(['route' => ['albums.destroy', $model->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
        {{ Form::hidden('id', $model->id) }}
        <button class="btn btn-danger btnConfirm">Удалить</button>
        <?= Form::close() ?>

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
                <th>Картинка</th>
                <td>
                    <?php if ($model->image): ?>
                    <img src="<?= getThumbnail($model->image) ?>" alt="">
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <th>Дата</th>
                <td><?= $model->date ? $model->date : "<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
            <tr>
                <th>Статус</th>
                <td><?= $model->status_name ? $model->status_name : "<span style='color:red;'>Нет значение</span>" ?></td>
            </tr>
        </table>
    </div>
    <h2>Контент</h2>
    <hr>
    <p>
        <a class="btn btn-sm btn-info" href="{{ route('image.create', $model->id) }}">
            <i class='glyphicon glyphicon-picture'></i> Добавить картинку в альбом
        </a>
    </p>
    <hr>

    @if($photos)

        <div class="table-responsive">
            {{ tableLength($photos)['lengthPage'] }}
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Картинка</th>
                    <th>Сортировка</th>
                    <th>Переместить в другой альбом</th>
                    <th></th>
                </tr>
                </thead>
                <?php if ($photos): ?>
                <tbody>
                <?php $i = tableLength($photos)['startPage']; foreach ($photos as $item): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><img src="{{getThumbnail($item->image)}}" alt="{{$item->order}}"></td>
                    <td>
                        <?= Form::open(['url' => route('image.update', $item->id), 'method' => 'put'])?>

                        <?= Form::hidden('id', $item->id) ?>

                        <?= Form::hidden('albums_id', $model->id)?>

                        <div class="input-group">
                            <?= Form::text('order', isset($item->order)?$item->order:old('order'), ['class' => 'form-control']) ?>
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="submit">
                                    <i class='glyphicon glyphicon-ok'></i> Изменить
                                </button>
                            </div>
                        </div>
                        <?= Form::close() ?>
                    </td>

                    <td>
                        <?= Form::open(['route' => ['image.move', $model->id], 'method' => 'post']) ?>

                        <?= Form::hidden('id', $item->id) ?>
                        <div class="input-group">

                            <?= Form::select('albums_id', $albums, $model->id, ['class' => "form-control"])?>

                            <div class="input-group-btn">
                                <button class="btn btn-default btnConfirm">
                                    <i class='glyphicon glyphicon-move'></i> Переместить
                                </button>
                            </div>
                        </div>
                        <?= Form::close() ?>
                    </td>

                    <td style="text-align: right;">
                        <?= Form::open(['route' => ['image.destroy', $item->id], 'method' => 'post', 'style' => 'display: inline-block']) ?>
                        <?= Form::hidden('id', $item->id) ?>
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
                <?= $photos->links(); ?>
            </div>

            @endif

            <hr>
            <p>
                <a class="btn btn-sm btn-info" href="{{ route('image.create', $model->id) }}">
                    <i class='glyphicon glyphicon-picture'></i> Добавить картинку в альбом
                </a>
            </p>
@endsection
