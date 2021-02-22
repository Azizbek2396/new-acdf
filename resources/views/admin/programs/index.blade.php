@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="object-link pull-right">
                <strong>Перейти:</strong>
{{--                <a href="{{ route('site.programs') }}" target="_blank">{{ route('site.programs') }}</a>--}}
            </div>
            <h1 class="page-header">Программы</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('programs.create') }}" class="btn btn-primary pull-right">Добавить</a>
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
                <td style="text-align: right;">
                    <a href="{{ route('programs.show', $item->id) }}" class="btn btn-sm btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{ route('programs.edit', $item->id) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?php echo Form::open(['route' => ['programs.destroy',$item->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
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
