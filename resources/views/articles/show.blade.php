@extends('layouts.app')

@section('content')
<div class="pt-4 container-fluid h100 all-pad" >
    <div class="row">
        <div class="col-12">
            <div id="artid" class="d-none"></div>
            <h3><b>Artículo: {{$art->name}}</b></h3>
            <hr>
            <div class="container-fluid">
                <div class="card bradius">
                    <div class="card-header text-center">
                        <div class="row">
                            <div onclick="like()" class="col-3 p-0 pl-2 text-left like text-danger">
                                <i class="{{$heart}} fa-2x fa-heart"></i><b>{{$art->likes}}</b>
                            </div>
                            <div class="col p-0"> <h4 class="m-0"><b>{{$art->name}}</b></h4></div>
                            <div class="col-3 p-0">

                            </div>
                        </div>

                       
                    </div>
                    <div class="card-body">
                       <div class="row">
                            <div class="col col-12">
                                <img src="{{$art->foto}}" onerror="this.src='/imgs/default-book.png';" class="w-img mr-3 mb-2 rounded float-left" alt="...">
                                <p class="text-justify text-art ">{{$art->text}}</p>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            <br>
            

        </div>
        
        <div class="mt-3 mb-4 col-12">
            <div class="row">
                <div class="col">
                    <h3 class="pt-2 mb-0"><b>Comentarios</b></h3>
                </div>
                <div class="col text-right">
                    <button data-toggle="modal" data-target="#exampleModal" style="font-size:16px" class="font-weight-bold btn btn-primary"><i class="fas fa-plus-square"></i>
                        Añadir comentario
                    </button>
                </div>
            </div>

            <hr>
            <div class="container-fluid">
                <div class="card bradius">
                    
                    <div class="card-body">
                        <div class="row">
                            @if (sizeof($art->comentaris) == 0)
                                <p class="font-weigth-bold m-0 w-100 text-center" style="font-size:16px" >No hay comentarios</p>

                            @endif
                            
                                @foreach($art->comentaris as $com)
                                <div class="font-weight-bold col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                    <div class="card bradius">
                                        <div onclick="window.location.href = '/user/{{$com->creador->username}}'" class="userlink card-header">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img class="rounded" src="{{$com->creador->avatar}}">
                                                </div>
                                                <div style="margin-top:1em" class="col text-center">
                                                    <h5><b>{{$com->creador->username}}</h5></b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div style="font-size:16px" class="text-justify">
                                                {{$com->text}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="font-size:16px" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="font-weight-bold modal-title" id="exampleModalLabel">Añadir comentario:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/desarcomentari" method="post">
      @csrf
        <div class="modal-body">
            <input hidden name="user" value="{{$art->creador->username}}">
            <input hidden name="art_id" value="{{$art->id}}">
            <textarea required class="w-100 p-2" placeholder="Escribe aquí tu comentario" name="comentari" id="" rows="10"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary font-weight-bold">Comentar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
    function like() {        
        $('.like').load('/like/'+{{$art->id}});
    }
</script>
@endsection

