@extends('admin.master')
@section('ol-title')
    <h1>PARAMÉTRAGES</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">listes prédéfinies</a></li>
        <li class="active">Type d'usage</li>
    </ol>
@endsection

@section('content')
<div class="row " style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            <div class="card-header"><strong>Type d'usage</strong><small></small></div>
            @include('admin.messages')
            <div class="card-header">


                {{-- <p>
                    <a class="btn btn-info" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Ajouter un type d'usage
                    </a>
                    
                  </p>
                  <div class="collapse" id="collapseExample3">
                    <div class="card card-body">
                      Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                  </div>
                  
                <p>
                    <a class="btn btn-info" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Ajouter un type d'usage
                    </a>
                    
                  </p>
                  <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                      Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                  </div>
                  
                <p>
                    <a class="btn btn-info" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Ajouter un type d'usage
                    </a>
                    
                  </p>
                  <div class="collapse" id="collapseExample2">
                    <div class="card card-body">
                      Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                  </div> --}}





                @if ( $privilege->insertion)
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter un usage
                </a>
                   <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample" data-parent="#accordionExample">
                  <div class="card card-body">
                        <form action="{{ route('usage.store') }}" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label for="Code_usage_const" class=" form-control-label">Code  <span class="text-danger">*</span></label>
                                <input type="text" id="Code_usage_const" placeholder="" class="form-control @error('Code_usage_const') is-invalid @enderror" name="Code_usage_const" value="{{ old('Code_usage_const') }}"autofocus>
                                @error('Code_usage_const')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>                                
                                @enderror
                            </div> 
                        
                                {{-- <livewire:type-usage> --}}

                            <div class="row">   
                                    <div class="form-group col-6" >
                                        <label for="usage">famille usage<span class="text-danger">*</span></label>
                                        <select class="form-control @error('Famille_usage_const') is-invalid @enderror" id="Famille_usage_const" name="Famille_usage_const" wire:model='famille_id' >
                                            <option value="" selected disabled>Séléctionner famille usage</option>
                                            @foreach ($usage_famille as $Famille_usage_const)
                                            <option value="{{ $Famille_usage_const->Famille_usage_const }}"> {{ $Famille_usage_const->Famille_usage_const }}</option>
                                          @endforeach
                                        </select>     
                                        @error('Famille_usage_const')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                                            
                                    </div> 
                                <div class="form-group col-6 "> 
                                    <label for="usage">usage <span class="text-danger">*</span></label>
                                    <input type="text" id="Detail_usage_const" placeholder="" class="form-control @error('Detail_usage_const') is-invalid @enderror" name="Detail_usage_const" value="{{ old('Detail_usage_const') }}"autofocus>
                                                                @error('Detail_usage_const')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        {{ $message }}
                                                                    </span>                                
                                                                @enderror                       
                                </div>
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
                  {{-- ---------------------------ajouter une famille d'usage --}}
                  @if ( $privilege->insertion)
                  <a class="btn btn-info mb-2"  href="{{ route('usage.index2') }}" role="button" >
                      Ajouter une famille d'usage
                  </a>
  
                    @endif
                    {{-- ---------------------------ajouter une famille d'usage --}}


            </div>
            <div class="card-body card-block">


 @include('listes_predefinies.type_usages.tblaffichage_type_usage') 


</div>
               
</div>
</div>
</div> 


@endsection