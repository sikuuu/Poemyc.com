@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center col-12">
            <br>
            <img class="logo-login" src={{env('APP_LOGO') }} alt="">
            <br>
            <br>
            <br>    
        </div>

        <div class="col-md-8 col-lg-6">

            <div class="row">
                <div class="col-12">
                    <h3 class="text-center font-weight-bold">Inicia sesión para continuar</h3>
                </div>
            </div>

            <div class="card bradius">
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="font-weight-bold mr-0 pr-0 col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario:') }}</label>

                            <div class="inputauth col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="border-warning bg-warning input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input id="login" type="text"
                                    class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                                </div>  
                                @if ($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="font-weight-bold mr-0 pr-0 col-md-4 col-form-label text-md-right">{{ __('Contraseña:') }}</label>

                            <div class="inputauth col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="bg-warning input-group-text border-warning" id="basic-addon1"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="text-center form-group mb-0">
                            <div class="">
                                <button type="submit" class="font-weight-bold btn btn-warning">
                                    {{ __('Iniciar sesión') }}
                                </button>
                                <a type="button" href="/login/ldap" class="font-weight-bold btn btn-dark">
                                Google / AD</a>
                                <br>
                                <br>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col col-6">
                                <a class="font-weight-bold btn btn-link" href="{{ route('register') }}">
                                    {{ __('Crear cuenta nueva') }}
                                </a>
                            </div>
                            <div class="col col-6">
                                <a class="font-weight-bold btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Restablecer contraseña') }}
                                </a>
                            </div>
                        </div>


                        <div class="text-center form-group mb-0">
                            <div class="">
                            

                                @if (Route::has('password.request'))
                                    
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
