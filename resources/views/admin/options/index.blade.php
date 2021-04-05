@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="object-link pull-right">
                <strong>Перейти:</strong>
{{--                <a href="{{ route('site.contacts') }}" target="_blank">{{ route('site.contacts') }}</a>--}}
            </div>
            <h1 class="page-header">Контакты</h1>
        </div>
    </div>
{{--    isset($_GET['dev'])--}}
    <?php if (true): ?>
    <div class="clearfix">
        <a href="{{ route('options.create') }}" class="btn btn-primary pull-right">Добавить</a>
    </div>
    <?php endif ?>
    <!-- /.row -->
    <div class="table-responsive">
        <table class="table">
            <?php if ($model): ?>
            <tbody>
            <?php foreach ($model as $item): ?>
            <tr>
                <td>{{ $item->title }}</td>
                <td><?= $item->text_field?$item->text_field:$item->json_field ?></td>
                <td style="text-align: right;">
                    <a href="{{ route('options.show', $item->id) }}" class="btn btn-sm btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{ route('options.edit', $item->id) }}" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <?php echo Form::open(['route' => ['options.destroy',$item->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
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
