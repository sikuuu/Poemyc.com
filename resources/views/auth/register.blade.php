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
                    <h3 class="text-center font-weight-bold">Crear cuenta nueva</h3>
                </div>
            </div>

            <div class="card bradius">
               <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="font-weight-bold mr-0 pr-0 col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario:') }}</label>

                            <div class="inputauth col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="border-warning bg-warning input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="font-weight-bold mr-0 pr-0 col-md-4 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>

                            <div class="inputauth col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="border-warning bg-warning input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="font-weight-bold mr-0 pr-0 col-md-4 col-form-label text-md-right">{{ __('Contraseña:') }}</label>

                            <div class="inputauth col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="border-warning bg-warning input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="font-weight-bold mr-0 pr-0 col-md-4 col-form-label text-md-right">{{ __('Repetir contraseña:') }}</label>

                            <div class="inputauth col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="border-warning bg-warning input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                    </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="text-center form-group mb-0">
                            <div class="">
                                <button type="submit" class="font-weight-bold btn btn-warning">
                                    {{ __('Crear cuenta') }}
                                </button>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
