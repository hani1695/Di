@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Reporting</a></li>
        <li class="active">Références et publications scientifiques</li>
    </ol>
@endsection
@section('content')
@if (Session::has("event_id"))
    

    <div class="row" style="margin-bottom: 100px;">
    
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Créer une publication scientifique</strong><small> Formulaire</small></div>
                <div class="card-header">
                @include('admin.messages')
                @if ( true )
                <a class="btn btn-info mb-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="{{ Session::has('errors') ? true : false}}" aria-controls="collapseExample">
                    Ajouter une publication scientifique
                </a>
                <div class="collapse {{ Session::has('errors') ? 'show' : ''}}" id="collapseExample">
                <div class="card-body card-block">
                    <form method="POST" action="{{ route('RefPub.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="description" class=" form-control-label">Intitulé de la publication scientifique <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="description" value="{{ old('description') }}" placeholder="Intitulé de la publication scientifique" class="form-control  @error('description') is-invalid @enderror"
                                name="description" autofocus required>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date_creation" class=" form-control-label">Date de la publication scientifique <span
                                    class="text-danger">*</span></label>
                            <input type="date" id="date_creation" value="{{ old('date_creation') }}" class="form-control @error('description') is-invalid @enderror"
                                name="date_creation" value="{{ date('Y-m-d') }}" required>
                                @error('date_creation')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Pièce jointe de la publication scientifique </label> <span
                            class="text-danger">*</span>
                            <input type="file" class="form-control-file @error('description') is-invalid @enderror" value="{{ old('lien_rapp') }}" id="exampleFormControlFile1" name="lien_rapp">
                            @error('lien_rapp')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>                                
                            @enderror
                        </div>

                        
                          
                        @csrf
                        <button id="payment-button" type="button" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                            <i class="fa fa-save fa-lg "></i>
                            <span id="payment-button-amount">Enregistrer</span>                            
                        </button>
                        
                        
                    </form>
                </div>
            </div>
          @endif
                  
        </div>
        <div class="card-body card-block">
            <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" >
                <thead>
                    <tr>
                        <th>N°</th>
                        
                        
                        <th>Intitulé de la publication scientifique</th>
                        <th>Date de la publication scientifique </th>
                        <th>Pièce jointe de la publication scientifique</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($rapports as $rapport)
                        <tr class=""> 
                            <td>  {{ $loop->index +1}} </td>
                            
                            {{-- <td class="tdlibelle">  {{ $rapport->id_const  }}  --}}
                            <td class="tdlibelle">  {{ $rapport->description  }}   </td>
                            <td class="tdlibelle">  {{ $rapport->date_creation }}   </td>
                            <td>
                                <a href="{{asset('storage/'.$rapport->lien_rapp)}}" class="btn btn-sm btn-primary" title="télécharger la pièce jointe du rapport" target="blank"><i class="fas fa-link"></i></a>
                            </td>
                            <td>
                                {{-- @if(true) <a href="{{route('rapports.edit',$rapport->id)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a> @endif --}}
                                @if(true)  <a href="{{route('rapportEval.destroy',$rapport->id)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif 
                            </td>
                        </tr> 
                        
                    @endforeach
                </tbody>
                  
            </table>
        </div>
               
            </div>
        </div>
    </div>  
    @else
<img src="{{ asset('images/event.png') }}" alt="">
    
@endif
@endsection


