<?php echo Form::open(['url' => isset($role->id)?route('roles.update', ['role' => $role->id]):route('roles.store'), 'method' => isset($role->id)?'put':'post', 'files' => true]) ?>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <?php echo Form::label('name', 'Name'); ?>
    <?= Form::text('name', isset($role->name)?$role->name:old('name') ,['class' => 'form-control']) ?>
    @if ($errors->has('name'))
        <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
    @endif
</div>

{{--<div class="form-group{{ $errors->has('guard_name') ? ' has-error' : '' }}">--}}
{{--    <?php echo Form::label('guard_name', 'Guard name'); ?>--}}
{{--    <?= Form::text('guard_name', isset($role->guard_name)?$role->guard_name:old('guard_name') ,['class' => 'form-control']) ?>--}}
{{--    @if ($errors->has('guard_name'))--}}
{{--        <span class="help-block">--}}
{{--              <strong>{{ $errors->first('guard_name') }}</strong>--}}
{{--          </span>--}}
{{--    @endif--}}
{{--</div>--}}

<div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
    <label for="permission">Permissions *
        <span class="btn btn-info btn-xs select-all">Select all</span>
        <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
    <select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
        @foreach($permissions as $id => $permissions)
            <option value="{{ $id }}" {{ (in_array($id, old('permission', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
        @endforeach
    </select>
    @if($errors->has('permission'))
        <em class="invalid-feedback">
            {{ $errors->first('permission') }}
        </em>
    @endif
    <p class="helper-block">
{{--        {{ trans('cruds.role.fields.permissions_helper') }}--}}
    </p>

</div>

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
