@extends('layouts.app')

@section('content')
<div class="pt-4 container-fluid h100 all-pad" >
    <div class="row">
        <div class="col-12">
            <div class="container-fluid">
                <div class="card bradius">
                    <div class="card-body bradius">
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
                                            <b id="username-img" class="username">{{$user->username}}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 col col-12 col-sm-6 text-left">
                                <p><b>Nombre: </b>{{$user->name ?? $user->username}}</p> 
                                <p><b>Correo electrónico: </b>{{$user->email}}</p>
                                <p><b>En Poemyc desde: </b><span class="text-nowrap">{{date("d-m-Y", strtotime(explode(" ",$user->created_at)[0]))}}</p></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center ">
   <!-- <iframe src="http://poemyc.com:4200" id="iframe-ng" class="iframe-angular h100" frameborder="0" width="100%"></iframe>
       --> <iframe src="/angular-{{$pagina}}" id="iframe-ng" class="" frameborder="0" width="100%"></iframe>
        <div class="col-md-8">
            
        </div>
    </div>
</div>

<script>
angularframe = setInterval(() => {
    iframe = document.getElementById('iframe-ng');
    iframe.style.height = iframe.contentDocument.body.scrollHeight + 20+'px';
    console.log(iframe.contentDocument.body.scrollHeight);
}, 500);
</script>
@endsection