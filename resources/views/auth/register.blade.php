<head>
  <link rel="stylesheet" href="{{ URL::asset('css/registro.css') }}">
</head>
@extends('layouts.app')

@section('principal')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default fade-in">
                <div class="panel-heading">¡Crea tu cuenta!</div>

                <div class="panel-body">
                    <form id="formRegister" class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <div class="col-md-12">

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="control-label">Nombre</label>

                            <input id="first_name"type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="control-label">Apellido</label>

                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="c control-label">Correo electrónico</label>

                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="control-label">Confirmar Constraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="control-label">Foto de perfil</label>

                              <input id="avatar" type="file" name="avatar">

                              @if ($errors->has('avatar'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('avatar') }}</strong>
                                  </span>
                              @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                        <p class="text-right">¿Ya estás registrado? <a href="{{ route('login') }}">Inicia sesión</a></p>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('js/validatorRegister.js') }}"></script>
