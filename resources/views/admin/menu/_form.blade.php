<?php echo Form::open(['url' => isset($model->id)?route('menu.update', $model->id):route('menu.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <?php echo Form::label('title', 'Title'); ?>
    <?= Form::text('title', isset($model->title)?$model->title:old('title') ,['class' => 'form-control', 'autofocus' => true]) ?>
    @if ($errors->has('title'))
        <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <?php echo Form::label('name', 'Name'); ?>
    <?= Form::text('name', isset($model->name)?$model->name:old('name') ,['class' => 'form-control', 'autofocus' => true]) ?>
    @if ($errors->has('name'))
        <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
    @endif
</div>

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
