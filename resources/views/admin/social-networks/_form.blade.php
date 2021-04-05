<?php echo Form::open(['url' => isset($model->id)?route('social-networks.update', $model->id):route('social-networks.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <?php echo Form::label('title', 'Название'); ?>
    <?= Form::text('title', isset($model->title)?$model->title:old('title') ,['class' => 'form-control']) ?>
    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
    <?php echo Form::label('icon', 'Иконка'); ?>
    <?php if (isset($model->icon) && $model->icon != ''): ?>
    <div id="imageBox">
        <div class="ico-Box">
            <img src="<?= getStorageFile($model->icon) ?>" alt="" width='20' height='20'>
        </div>
        <a class="btn btn-danger removeImg" data-url='<?= route('social-networks.edit',$model->id) ?>'>
            <i class='glyphicon glyphicon-trash'></i>
        </a>
    </div>
    <div id="fileInput" style='display:none;'>
        <?= Form::file('icon', ['class' => 'form-control']) ?>
    </div>
    <?php else: ?>
          <?= Form::file('icon', ['class' => 'form-control']) ?>
      <?php endif ?>
    @if ($errors->has('icon'))
        <span class="help-block">
              <strong>{{ $errors->first('icon') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
    <?php echo Form::label('url', 'Ссылка'); ?>
    <?= Form::text('url', isset($model->url)?$model->url:old('url') ,['class' => 'form-control']) ?>
    @if ($errors->has('url'))
        <span class="help-block">
            <strong>{{ $errors->first('url') }}</strong>
        </span>
    @endif
</div>

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
