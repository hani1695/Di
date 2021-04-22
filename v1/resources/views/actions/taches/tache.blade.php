@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#"e>actions</a></li>
        <li class="active">tache</li>
    </ol>
@endsection

@section('content')
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>les taches</strong><small> table</small></div>
            @include('admin.messages')
            <div class="card-header">
                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une tache
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                  <div class="card card-body">
                        <form action="{{ route('tache.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="tache" class=" form-control-label">tache <span class="text-danger">*</span></label>
                                <input type="text" id="tache" placeholder="tache" class="form-control @error('tache') is-invalid @enderror" name="tache" value="{{ old('tache') }}"autofocus>
                                @error('tache')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                        
                                <div class="form-group ">
                                    <label for="description" class=" form-control-label">description<span class="text-danger">*</span></label>
                                    <input type="text" id="description" placeholder="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>                                
                                    @enderror
                                </div>
                            @csrf                    
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                                    <i class="fa fa-save fa-lg "></i>
                                    <span id="payment-button-amount">Enregistrer</span>                            
                                </button>
                            </div>
                        </form>
                   </div>
                  </div>
                @endif
            </div>
            <div class="card-body card-block">


 @include('actions.taches.tblaffichagetache') 


</div>
               
</div>
</div>
</div> 


@endsection