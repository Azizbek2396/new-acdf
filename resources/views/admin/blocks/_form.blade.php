<?php echo Form::open(['url' => isset($model->id)?route('blocks.update', $model->id):route('blocks.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>

<?php $model = isset($model) ? $model : null ?>

@include('admin.forms._select', [
    'model'     => $model,
    'label'     => 'Тип',
    'field'     => 'type',
    'list'      => $types,
    'errors'    => $errors,
])

@include('admin.forms._text', [
    'model'     => $model,
    'label'     => 'Название',
    'field'     => 'title',
    'errors'    => $errors,
])


<?php /*
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <?php echo Form::label('image', 'Картинка'); ?>
        <?php if (isset($model->image) && $model->image != ''): ?>
            <div id="imageBox">
                <img src="<?= getThumbnail($model->image) ?>" alt="">
                <a class="btn btn-danger removeImg" data-url='<?= route('blocks.edit',$model->id) ?>'>
                    <i class='glyphicon glyphicon-trash'></i>
                </a>
            </div>
            <div id="fileInput" style='display:none;'>
                <?= Form::file('image', ['class' => 'form-control']) ?>
            </div>
        <?php else: ?>
            <?= Form::file('image', ['class' => 'form-control']) ?>
        <?php endif ?>
        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
*/ ?>

@include('admin.forms._textarea', [
    'model'     => $model,
    'label'     => 'Контент',
    'field'     => 'content',
    'options'   => ['class' => 'form-control textarea-simple', 'rows' => '5'],
    'errors'    => $errors,
])

@include('admin.forms._text', [
    'model'     => $model,
    'label'     => 'Порядковый номер',
    'field'     => 'order',
    'errors'    => $errors,
])


@include('admin.forms._select', [
    'model'     => $model,
    'label'     => 'Статус',
    'field'     => 'status',
    'list'      => $statuses,
    'errors'    => $errors,
])

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
