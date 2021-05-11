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
                    <h3 class="text-center font-weight-bold">Recuperar contraseña</h3>
                </div>
            </div>
        

            <div class="card bradius">
               <br>
                <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="font-weight-bold mr-0 pr-0 col-md-4 col-form-label text-md-right">{{ __('Correo electrónico:') }}</label>

                            <div class="inputauth col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="border-warning bg-warning input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center form-group mb-0">
                            <div class="">
                                <button type="submit" class="font-weight-bold btn btn-warning">
                                    {{ __('Enviar correo') }}
                                </button>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col col-12">
                                <a class="font-weight-bold btn btn-link" href="{{ route('login') }}">
                                    {{ __('Ya tienes una cuenta? Inicia sesión') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
