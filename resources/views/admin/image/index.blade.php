@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="object-link pull-right">
                <strong>Перейти:</strong>
                <a href="{{ route('site.news') }}" target="_blank">{{ route('site.news') }}</a>
            </div>
            <h1 class="page-header">Галерея</h1>
        </div>
    </div>
    <div class="clearfix">
        <a href="{{ route('albums.create') }}" class="btn btn-primary pull-right">Добавить</a>
    </div>
    <!-- /.row -->
    <div class="container-fluid">
        {{ tableLength($model)['lengthPage'] }}

        <?php $i = tableLength($model)['startPage']; ?>

        <div class="starter-template" style="padding: 40px 15px;text-align: center;">
            <div class="row">
                <?php foreach($model as $item): ?>
                <div class="col-lg-3">
                    <div class="thumbnail" style="min-height: 514px;">
                        <img alt="{{$item->image}}" src="<?=getLittleSquare($item->image)?>">
                        <div class="caption">
                            <h2>#{{$i++}}</h2>
                            <h3>{{$item->title}}</h3>
                            <p>{{$item->description}}</p>
                            {{--<p>Количество: {{count($items->Photos)}}.</p>--}}
                            <p>Created date: {{ date("d F Y",strtotime($item->created_at)) }}
                                at {{date("g:ha",strtotime($item->created_at)) }}</p>

                            <a href="{{ route('albums.show', $item->id) }}" class="btn btn-sm btn-info">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('albums.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <?= Form::open(['route' => ['albums.destroy', $item->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
                            <?= Form::hidden('id', $item->id) ?>
                            <button class="btn btn-sm btn-danger btnConfirm">
                                <i class='glyphicon glyphicon-trash'></i>
                            </button>
                            <?= Form::close() ?>


                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="text-right">
            <?= $model->links(); ?>
        </div>
    </div>
@endsection
