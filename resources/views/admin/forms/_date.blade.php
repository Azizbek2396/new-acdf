<?php $old = isset($model->$field) ? $model->$field : old($field); ?>

<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
    <?php echo Form::label($field, $label); ?>
    <?= Form::text($field, $old ? $old : date('Y-m-d'), isset($options) ? $options : ['class' => 'datepicker form-control']) ?>
    @if ($errors->has($field))
        <span class="help-block">
              <strong>{{ $errors->first($field) }}</strong>
          </span>
    @endif
</div>
