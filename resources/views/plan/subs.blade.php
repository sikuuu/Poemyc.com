@extends('layouts.app')

@section('content')
<div class="pt-4 container-fluid h100 all-pad" >
    <div class="row">
        <div class="col-12">
            <h3><b>Gestionar suscripciones</b></h3>
            <hr>
            <div class="container-fluid">
            <div class="card bradius">
                <div class="card-body">
                        <div class="row">
                            @if (sizeof($plans) < 1)
                                <div class="fs-16 col-12">
                                    <center>No estás suscrito a ningún plan</center>
                                </div>
                            @endif
                            @foreach ($plans as $pla)
                                <div class="col col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <img class="w-100" src="{{$pla->foto}}" onerror="this.src='/imgs/default-plan.png';" alt="">

                                        </div>
                                        <div class="card-body p-2">
                                            <div class="w-100 text-center">
                                                <div class="row m-2" >
                                                    <div class="m-0 text-center" style="width: fit-content;">
                                                        <img src="{{$pla->creador->avatar}}" onerror="this.src='/imgs/default.png';" class="rounded user-img">
                                                    </div>
                                                    
                                                    <div class="col" style="margin-top:0.24em;">
                                                        <div class="row">
                                                        <div class="col-12 p-0">
                                                            <b>{{$pla->creador->username}}</b>
                                                        </div>
                                                        </div>
                                                        <div  class="row">
                                                            <div class="name-search col-12">
                                                                {{$pla->creador->name}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h6><b>{{$pla->name}} - {{$pla->preu}}€</b></h6>
                                                <hr>
                                                <div class="col-12">
                                                    {{$pla->text}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="/unsub/{{$pla->id}}" class="btn btn-danger"><i class="fas fa-minus-square"></i> Quitar suscripcion</a>
                                        </div>
                                    </div>
                                    
                                    <br>
                                </div>

                            @endforeach
                            
                        </div>
                
            </div>
        </div>
    </div>  
</div>
@endsection