<div>
 <div class="row">   
    <div class="form-group col-6" >
        <label for="usage">famille usage<span class="text-danger">*</span></label>
        <select class="form-control @error('Famille_usage_const') is-invalid @enderror" id="Famille_usage_const" name="Famille_usage_const" wire:model='famille_id' >
            {{-- <option value="" selected disabled>Séléctionner famille usage</option> --}}
            <option  selected @if (empty($famillea->Famille_usage_const) and empty($libellee->Detail_usage_const))
                value=""
            @else
                value="{{$famillea->Famille_usage_const}}"
            @endif>
            @if (empty($famillea->Famille_usage_const))
                Séléctionner famille usage
            @else
                {{$famillea->Famille_usage_const}}
            @endif
</option> 
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
    {{-- <div class="form-group col-6" >
        <label for="usage">type d'usage<span class="text-danger">*</span></label>
        <select class="form-control @error('Libelle_usage_const') is-invalid @enderror" id="Libelle_usage_const" name="Libelle_usage_const" wire:model='libelle_id' >
            <option value="" selected disabled>Séléctionner type usage</option>
            @foreach ($usage_libelle as $Libelle_usage_const)
            <option value="{{ $Libelle_usage_const->Libelle_usage_const }}"> {{ $Libelle_usage_const->Libelle_usage_const }}</option>
          @endforeach
        </select>     
        @error('Libelle_usage_const')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror
                            
    </div>  --}}
<div class="form-group col-6 " >
   
    <label for="usage">usage <span class="text-danger">*</span></label>
    <select class="form-control @error('usage') is-invalid @enderror" id="usage" name="usage"  >
        {{-- <option value="" selected disabled>Séléctionner détail d'usage</option> --}}
        <option  selected @if (empty($libellee->Detail_usage_const) and empty($famillea->Famille_usage_const))
            value=""
        @else
            value="{{$libellee->Detail_usage_const}}"
        @endif>
        @if (empty($libellee->Detail_usage_const))
            Séléctionner Séléctionner détail d'usage
        @else
            {{$libellee->Detail_usage_const}}
        @endif
</option> 
        @foreach ($usage_detail as $usage_detail)
        <option value="{{ $usage_detail->Detail_usage_const }}"> {{ $usage_detail->Detail_usage_const }}</option>
      @endforeach
    </select>     
    @error('usage')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>                                
    @enderror
                        
</div>
 </div>

</div>
