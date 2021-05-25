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
                                <p class="text-justify text-art">{{$art->text}}</p>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            <br>
            

        </div>
    </div>
</div>

<script>
    function like() {
        
        $('.like').load('/like/'+{{$art->id}});

    }
</script>
@endsection

