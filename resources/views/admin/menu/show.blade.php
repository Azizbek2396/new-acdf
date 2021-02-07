@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Меню <small>{{ $model->title }}</small></h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('menu.create-item', $model->id) }}" class="btn btn-primary pull-right">Добавить пункт меню</a>
    </div>
    <br>
    <!-- /.row -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Родитель</th>
                <th>Порядковый номер</th>
                <th>Url</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if ($childrens): ?>
            <?php $i=1; foreach ($childrens as $child): ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $child->title }}</td>
                <td><?= $child->parent_item?$child->parent_item->title:''; ?></td>
                <td>{{ $child->order }}</td>
                <td>{{ $child->url }}</td>
                <td style="text-align: right;">
                    <a href="{{ route('menu.edit-item', ['menu' => $model->id,'item' => $child->id]) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?php echo Form::open(['route' => ['menu.destroy',$child->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
                    {{ Form::hidden('id', $child->id) }}
                    <button class="btn btn-sm btn-danger btnConfirm">
                        <i class='glyphicon glyphicon-trash'></i>
                    </button>
                    <?= Form::close() ?>
                </td>
            </tr>
            <?php $i++; endforeach ?>
            <?php endif ?>
            </tbody>
        </table>
    </div>
@endsection
