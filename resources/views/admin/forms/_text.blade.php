<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
    <?php echo Form::label($field, $label); ?>
    <?= Form::text($field,
        isset($model->$field) ? $model->$field : old($field),
        isset($options) ? $options : ['class' => 'form-control'])
    ?>
    @if ($errors->has($field))
        <span class="help-block">
              <strong>{{ $errors->first($field) }}</strong>
          </span>
    @endif
</div>
