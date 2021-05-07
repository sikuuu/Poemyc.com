@extends('layouts.app')

@section('content')
<div class="p-0 container-fluid iframe-angular">

    <div class="row justify-content-center iframe-angular">
        <iframe src="/angular" id="iframe-ng" class="iframe-angular" frameborder="0" width="100%"></iframe>

        <div class="col-md-8">
            
        </div>
    </div>
</div>
@endsection

<!--ng serve --host 0.0.0.0 --disable-host-check-->

<!--ng build; cp dist/frontend/*.js ../../public/; cp dist/frontend/*.css ../../public/; cp dist/frontend/*.ico ../../public/;cp dist/frontend/index.html ../views/index.html-->