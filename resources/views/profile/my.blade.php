@extends('layouts.app')

@section('content')
<div class="pt-4 container-fluid h100 all-pad" >
    <div class="row">
        <div class="col-12">
            <h3><b>Gestionar perfil</b></h3>
            <hr>
            <div class="container-fluid">
                <div class="card bradius">
                    <div class="card-body">
                        <div class="mt-2 row">
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="fumadaperfil">
                                    <div class="row">
                                        <div class="col col-12 text-center">
                                            <img style="width:100%;border-radius:1.5em;" class="" src="{{$user->avatar}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center col col-12">
                                            <b class="username">{{$user->username}}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 col col-12 col-sm-6 text-left">
                                <p><b>Nombre: </b>{{$user->name ?? $user->username}}</p> 
                                <p><b>Correo electrónico: </b>{{$user->email}}</p>
                                <p><b>En Poemyc desde: </b><span class="text-nowrap">{{date("d-m-Y", strtotime(explode(" ",$user->created_at)[0]))}}</p></span>
                                <a class="btn btn-dark">
                                    Modificar Contraseña
                                </a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <br>
            <h3 class="text-danger"><b>Danger Zone</b></h3>
            <hr>
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                    <form action="/deletearts" method="post">
                    @csrf
                        <button type="submit" class="btn btn-danger font-weight-bold" href="">Eliminar artículos</a>
                    </form>
                    </div>
                    <div class="text-left col col-12 col-sm-7 col-md-7 col-lg-9 col-xl-9">
                    <p class="mt-2">Al hacer click aquí borrarás todos tus artículos de tu perfil</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                    <form action="/deleteall" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger font-weight-bold" href="">Eliminar cuenta</button>
                    </form>
                    </div>
                    <div class="text-left col col-12 col-sm-7 col-md-7 col-lg-9 col-xl-9">
                        <p class="mt-2">Al hacer click aquí borrarás todos tus artículos, planes, likes y comentarios de Poemyc</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection