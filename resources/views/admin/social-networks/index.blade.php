@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Социальные сети</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('social-networks.create') }}" class="btn btn-primary pull-right">Добавить</a>
    </div>
    <br>
    <!-- /.row -->
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Название</th>
                <th>Ссылка</th>
                <th>Иконка</th>
                <th></th>
            </tr>
            </thead>
            <?php if ($model): ?>
            <tbody>
            <?php foreach ($model as $item): ?>
            <tr>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="<?= $item->url ?>" target='_blank'><?= $item->url ?></a>
                </td>
                <td>
                    <?php if (getStorageFile($item->icon)): ?>
                    <div class="ico-Box">
                        <img src="<?= getStorageFile($item->icon) ?>" alt="" width='20' height='20'>
                    </div>
                    <?php endif ?>
                </td>
                <td style="text-align: right;">
                    <a href="{{ route('social-networks.edit', $item->id) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?php echo Form::open(['route' => ['social-networks.destroy',$item->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
                    {{ Form::hidden('id', $item->id) }}
                    <button class="btn btn-sm btn-danger btnConfirm">
                        <i class='glyphicon glyphicon-trash'></i>
                    </button>
                    <?= Form::close() ?>
                </td>
            </tr>
            <?php endforeach ?>
            </tbody>
            <?php endif ?>
        </table>
    </div>
@endsection
