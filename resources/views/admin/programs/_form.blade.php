<?php echo Form::open(['url' => isset($model->id)?route('programs.update', $model->id):route('programs.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <?php echo Form::label('title', 'Название'); ?>
    <?= Form::text('title', isset($model->title)?$model->title:old('title') ,['class' => 'form-control']) ?>
    @if ($errors->has('title'))
        <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <?php echo Form::label('image', 'Картинка'); ?>
    <?php if (isset($model->image) && $model->image != ''): ?>
    <div id="imageBox">
        <img src="<?= getThumbnail($model->image) ?>" alt="">
        <a class="btn btn-danger removeImg" data-url='<?= route('programs.edit',$model->id) ?>'>
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
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <?php echo Form::label('description', 'Описание'); ?>
    <?= Form::textarea('description', isset($model->description)?$model->description:old('description') ,['class' => 'form-control', 'rows' => '5']) ?>
    @if ($errors->has('description'))
        <span class="help-block">
              <strong>{{ $errors->first('description') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    <?php echo Form::label('content', 'Контент'); ?>
    <?= Form::textarea('content', isset($model->content)?$model->content:old('content') ,['class' => 'form-control textarea', 'rows' => '5']) ?>
    @if ($errors->has('content'))
        <span class="help-block">
              <strong>{{ $errors->first('content') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <?php echo Form::label('status', 'Статус'); ?>
    <?= Form::select('status', $statuses , isset($model->status)?$model->status:old('status') ,['class' => 'form-control']) ?>
    @if ($errors->has('status'))
        <span class="help-block">
              <strong>{{ $errors->first('status') }}</strong>
          </span>
    @endif
</div>
<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
