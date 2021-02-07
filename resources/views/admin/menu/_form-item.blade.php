<?php echo Form::open(['url' => isset($model->id) ? route('menu.update-item', ['menu' => $parent->id, 'item' => $model->id]):route('menu.store-item',['menu' => $parent->id]), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>

<div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
    <?php echo Form::label('parent_id', 'Родительски пункт'); ?>
    <?= Form::select('parent_id', ['' => $parent->title]+$parents , isset($model->parent_id)?$model->parent_id:old('parent_id') ,['class' => 'form-control']) ?>
    @if ($errors->has('parent_id'))
        <span class="help-block">
              <strong>{{ $errors->first('parent_id') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <?php echo Form::label('title', 'Title'); ?>
    <?= Form::text('title', isset($model->title)?$model->title:old('title') ,['class' => 'form-control', 'autofocus' => true]) ?>
    @if ($errors->has('title'))
        <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
    <?php echo Form::label('url', 'Url'); ?>
    <?= Form::text('url', isset($model->url)?$model->url:old('url') ,['class' => 'form-control', 'autofocus' => true]) ?>
    @if ($errors->has('url'))
        <span class="help-block">
              <strong>{{ $errors->first('url') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
    <?php echo Form::label('order', 'Порядковый номер'); ?>
    <?= Form::text('order', isset($model->order)?$model->order:old('order') ,['class' => 'form-control', 'autofocus' => true]) ?>
    @if ($errors->has('order'))
        <span class="help-block">
              <strong>{{ $errors->first('order') }}</strong>
          </span>
    @endif
</div>

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
