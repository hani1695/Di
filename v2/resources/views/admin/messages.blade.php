@if (Session::has('errors'))

    {{-- <div class="card-header" id="rem">
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" onclick="rem()"><span aria-hidden="true">×</span><span
                    class="sr-only" >Close</span></button>
            <ul class="list-unstyled">
                @foreach (Session::get('errors')->all() as $error)
                    <li>{{ $error }}</li>
                    
                @endforeach
            </ul>
        </div>
    </div> --}}
    <div class="card-header" id="rem">
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" onclick="rem()"><span aria-hidden="true">×</span><span
                    class="sr-only">Close</span></button>
            <i class="fas fa-exclamation-circle"></i>   Attention certains champs ne sont pas valides !
        </div>
    </div>
@endif


@if (Session::has('warning'))
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
                class="sr-only">Close</span></button>
        {{ Session::get('warning') }}
    </div>
@endif


@if (Session::has('success'))
<div class="card-header" id="rem">
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" onclick="rem()"><span aria-hidden="true">×</span><span
                class="sr-only">Close</span></button>
                <i class="fas fa-check-circle "></i>  {{ Session::get('success') }}
    </div>
</div>
@endif
@if (Session::has('supp'))
<div class="card-header" id="rem">
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" onclick="rem()"><span aria-hidden="true">×</span><span
                class="sr-only">Close</span></button>
                <i class="fas fa-check-circle "></i>  {{ Session::get('supp') }}
    </div>
</div>
@endif
