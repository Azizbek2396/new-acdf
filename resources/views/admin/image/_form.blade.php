<?php echo Form::open(['url' => isset($model->id)?route('image.update', $model->id):route('image.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>
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

<div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
    <?php
    $old = isset($model->order)?$model->order:old('order');
    ?>
    <?php echo Form::label('order', 'Порядковый номер'); ?>
    <?= Form::text('order', $old?$old:null, ['class' => 'form-control']) ?>
    @if ($errors->has('order'))
        <span class="help-block">
              <strong>{{ $errors->first('order') }}</strong>
          </span>
    @endif
</div>

<input type="hidden" value="{{ $id }}" name="albums_id">

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>

@if(isset($errors) && $errors->has('albums_id'))
    <div class="alert alert-block alert-error fade in"id="error-block">
        <?php
        $messages = $errors->all('<li>:message</li>');
        ?>
        <button type="button" class="close"data-dismiss="alert">×</button>

        <h4>Warning!</h4>
        <ul>
            @foreach($messages as $message)
                {{$message}}
            @endforeach

        </ul>
    </div>
@endif
