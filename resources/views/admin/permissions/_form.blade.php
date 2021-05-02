<?php echo Form::open(['url' => isset($permission->id) ? route('permissions.update', ['permission' => $permission->id]) : route('permissions.store'),
    'method' => isset($permission->id) ? 'put' : 'post', 'files' => true]) ?>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <?php echo Form::label('name', 'Name'); ?>
    <?= Form::text('name', isset($permission->name) ? $permission->name:old('name') ,['class' => 'form-control']) ?>
    @if ($errors->has('name'))
        <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
    @endif
</div>

{{--<div class="form-group{{ $errors->has('guard_name') ? ' has-error' : '' }}">--}}
{{--    <?php echo Form::label('guard_name', 'Guard name'); ?>--}}
{{--    <?= Form::text('guard_name', isset($permission->guard_name) ? $permission->guard_name:old('guard_name') ,['class' => 'form-control']) ?>--}}
{{--    @if ($errors->has('guard_name'))--}}
{{--        <span class="help-block">--}}
{{--              <strong>{{ $errors->first('guard_name') }}</strong>--}}
{{--          </span>--}}
{{--    @endif--}}
{{--</div>--}}

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
