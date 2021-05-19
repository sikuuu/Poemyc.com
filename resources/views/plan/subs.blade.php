@extends('layouts.app')

@section('content')
<div class="pt-4 container-fluid h100 all-pad" >
    <div class="row">
        <div class="col-12">
            <div class="container-fluid">
                @foreach ($plans as $pla)
                    {{$pla->name}}
                @endforeach
            </div>
        </div>
    </div>  
</div>
@endsection