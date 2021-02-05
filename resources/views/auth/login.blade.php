@extends('layouts.login')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" class="form-control" placeholder="Login" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>

                            <button class="btn btn-lg btn-success btn-block">Login</button>
                            <div class="text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
