<head>
  <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
</head>
@extends('layouts.app')

@section('principal')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default fade-in">
                <div class="panel-heading">¡Bienvenido!</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="formLogin" method="POST" action="{{ route('login') }}" novalidate>
                        {{ csrf_field() }}
                      <div class="col-md-12">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Correo electrónico</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Contraseña</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">
                              Login
                          </button>

                          <a class="btn btn-link" href="{{ route('password.request') }}">
                              ¿Olvidaste la contraseña?
                          </a> <br><br>
                          <p class="text-right">¿No estás registrado? <a href="{{ route('register') }}">Crea tu cuenta</a></p>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="{{ asset('js/validatorLogin.js') }}"></script>
