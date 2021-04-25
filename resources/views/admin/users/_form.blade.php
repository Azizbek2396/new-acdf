<?php echo Form::open(['url' => isset($user->id)?route('users.update', ['user' => $user->id]):route('users.store'), 'method' => isset($user->id)?'put':'post', 'files' => true]) ?>

<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
    <?php echo Form::label('role', 'Role'); ?>
    <?= Form::select('role', ['' => 'Выберите'] + $roles , isset($user->role_id)?$user->role_id:old('role') ,['class' => 'form-control']) ?>
    @if ($errors->has('role'))
        <span class="help-block">
              <strong>{{ $errors->first('role') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <?php echo Form::label('name', 'Login'); ?>
    <?= Form::text('name', isset($user->name)?$user->name:old('name') ,['class' => 'form-control']) ?>
    @if ($errors->has('name'))
        <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <?php echo Form::label('username', 'Username'); ?>
    <?= Form::text('username', isset($user->username)?$user->username:old('username') ,['class' => 'form-control']) ?>
    @if ($errors->has('username'))
        <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <?php echo Form::label('email', 'E-mail'); ?>
    <?= Form::email('email', isset($user->email)?$user->email:old('email') ,['class' => 'form-control']) ?>
    @if ($errors->has('email'))
        <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
    @endif
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <?php echo Form::label('password', 'Password'); ?>
    <?= Form::password('password',['class' => 'form-control']) ?>
    @if ($errors->has('password'))
        <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
    @endif
</div>

<div class="form-group">
    <?php echo Form::label('password_confirmation', 'Confirm Password'); ?>
    <?= Form::password('password_confirmation',['class' => 'form-control']) ?>
</div>

<?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
