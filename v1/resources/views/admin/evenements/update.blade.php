@extends('admin.master')
@section('ol-title')
    <h1>GESTIONS</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="{{route('evenements.index')}}">evenements</a></li>
        <li class="active">Modification </li>
    </ol>
@endsection

@section('content')

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>Liste des evenements - Modification</strong><small>Formulaire</small></div>
            <div class="card-header">
                @include('admin.messages')
                </div>
            <div class="card-body card-block">
                    

                <form method="POST" action="{{ route('evenements.update',$evenement_enr->id) }}"> @method('PATCH')
                    <div class="form-group">
                        <label for="description" class=" form-control-label">Description <span
                                class="text-danger">*</span></label>
                        <input type="text" id="description" placeholder="Description" class="form-control"
                            name="description" value="{{ $evenement_enr->description }}">
                    </div>
                    <div class="form-group">
                        <label for="date_creation" class=" form-control-label">Date <span
                                class="text-danger">*</span></label>
                        <input type="date" id="date_creation"  class="form-control"
                            name="date_creation" value="{{ $evenement_enr->date_creation }}">
                    </div>
                    <div class="form-group">
                        <label for="wilaya">Wilaya de l'évènement <span class="text-danger">*</span></label>
                        <select class="form-control" id="wilaya" name="wilaya_id" required>
                            <option disabled>Selectionner wilaya de l'évènement </option>
                            @foreach ($wilayas as $wilaya)
                                <option value="{{ $wilaya->code_w }}" selected="{{ $wilaya->code_w == $evenement_enr->wilaya_id }}">{{ $wilaya->nom_w }} ({{ $wilaya->code_w }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description" class=" form-control-label">Les wilayas sinistrées <span class="text-danger">*</span></label><br>
                        <select class="js-example-basic-multiple " name="wilayas[]" multiple="multiple" style="width: 100%;">
                            @foreach ($wilayas as $wilaya)
                                <option value="{{ $wilaya->code_w }}" 
                                @foreach ($wilayasSinistrees as $w)
                                    @if ($wilaya->code_w == $w->code_w)
                                        selected 
                                    @endif
                                @endforeach 
                                >{{ $wilaya->nom_w }} ({{ $wilaya->code_w }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="app3">
                        <seisme-update typeevenement={{ $evenement_enr->type_evenement}} id="{{ $evenement_enr->id }}" />
                    </div>
                    
                      
                    @csrf
                    <button id="payment-button" type="button" class="btn btn-lg btn-success btn-block" onclick="enr(this)">
                        <i class="fa fa-save fa-lg "></i>
                        <span id="payment-button-amount">Enregistrer</span>                            
                    </button>
                    
                    
                </form>


                <div class="card-body card-block">
                    @include('admin.evenements.tblaffichage') 
                    </div>
           </div>
        
            </div>
    </div>
</div>





@endsection

