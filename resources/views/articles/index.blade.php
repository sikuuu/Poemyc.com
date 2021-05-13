@extends('layouts.app')

@section('content')
<div class="pt-4 container-fluid h100 all-pad" >
    <div class="row">
        <div class="col-12">
            <h3><b>Mis Artículos</b></h3>
            <hr>
            <div class="container-fluid">
                <div class="card bradius">
                    <div class="card-body">
                       <div class="row">
                            @foreach ($user->articles as $art)
                                <div class="col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <img class="w-100" src="{{$art->foto}}" alt="">
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                       </div>
                    </div>
                </div>
            </div>
            <br>
            

        </div>
    </div>
</div>
@endsection