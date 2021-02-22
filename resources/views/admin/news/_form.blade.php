<?= Form::open([
    'url'    => isset($model->id) ? route('news.update', $model->id) : route('news.store'),
    'method' => isset($model->id) ? 'put' : 'post', 'files' => true])
?>

<?php /*
    <div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
      <?php echo Form::label('subject_id', 'Тема'); ?>
      <?= Form::select('subject_id', ['' => 'Выберите']+$subjects , isset($model->subject_id)?$model->subject_id:old('subject_id') ,['class' => 'form-control']) ?>
      @if ($errors->has('subject_id'))
          <span class="help-block">
              <strong>{{ $errors->first('subject_id') }}</strong>
          </span>
      @endif
    </div>
    */ ?>

<?php $model = isset($model) ? $model : null; ?>

@include('admin.forms._text', [
    'field'     => 'title',
    'label'     => 'Название',
    'model'     => $model,
    'errors'    => $errors,
])

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <?php echo Form::label('image', 'Картинка'); ?>
    <?php if (isset($model->image) && $model->image != ''): ?>
    <div id="imageBox">
        <img src="<?= getThumbnail($model->image) ?>" alt="">
        <a class="btn btn-danger removeImg" data-url='<?= route('news.edit',$model->id) ?>'>
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



@include('admin.forms._date', [
    'field'     => 'date',
    'label'     => 'Дата',
    'model'     => $model,
    'errors'    => $errors,
])

@include('admin.forms._select', [
    'field'     => 'status',
    'label'     => 'Статус',
    'list'      => $statuses,
    'model'     => $model,
    'errors'    => $errors,
])

@include('admin.forms._select', [
    'field'     => 'albums_id',
    'label'     => 'Альбом',
    'list'      => collect($albums)->prepend('Выберите', ''),
    'model'     => $model,
    'errors'    => $errors,
])


<?= Form::submit('Сохранить', ['class' => 'btn btn-success']) ?>
<?= Form::close() ?>
