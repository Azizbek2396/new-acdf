<?php echo Form::open(['url' => isset($model->id)?route('options.update', $model->id):route('options.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>

<?php if (!isset($model)): ?>
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <?php echo Form::label('title', 'Название'); ?>
    <?= Form::text('title', isset($model->title)?$model->title:old('title') ,['class' => 'form-control']) ?>
    @if ($errors->has('title'))
        <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
    @endif
</div>
<?php endif ?>

<?php
$name = isset($model)?$model->name:'';
$json_field = false;
if ($name == 'address') {
    $json_field = true;
}
?>

<?php if ($json_field): ?>
<div class="form-group{{ $errors->has('json_field') ? ' has-error' : '' }}">
    <?php echo Form::label('json_field', 'Значение'); ?>
    <?= Form::textarea('json_field', isset($model->json_field)?$model->json_field:old('json_field') ,['class' => 'form-control', 'rows' => '5']) ?>
    @if ($errors->has('json_field'))
        <span class="help-block">
              <strong>{{ $errors->first('json_field') }}</strong>
          </span>
    @endif
</div>
<?php else: ?>
<div class="form-group{{ $errors->has('text_field') ? ' has-error' : '' }}">
    <?php echo Form::label('text_field', 'Значение'); ?>
    <?= Form::textarea('text_field', isset($model->text_field)?$model->text_field:old('text_field') ,['class' => 'form-control', 'rows' => '5']) ?>
    @if ($errors->has('text_field'))
        <span class="help-block">
              <strong>{{ $errors->first('text_field') }}</strong>
          </span>
    @endif
</div>
<?php endif ?>

<?php if (!isset($model)): ?>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <?php echo Form::label('name', 'Name'); ?>
    <?= Form::text('name', isset($model->name)?$model->name:old('name') ,['class' => 'form-control']) ?>
    @if ($errors->has('name'))
        <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
    @endif
</div>
<?php endif ?>

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
