<div>
    

        <div class="form-row" id="wd">
            <div class="form-group col-6" id="w1">
                <label for="exampleFormControlSelect1">wilaya<span class="text-danger">*</span></label>
                <select class="form-control @error('fk_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_wilaya" wire:model='wilaya_id' >
                    <option value="" selected disabled>Séléctionner wilaya</option>
                    @foreach ($wilayas as $wilaya)
                    <option value="{{ $wilaya->code_w }}"> {{ $wilaya->nom_w }}</option>
                  @endforeach
                </select>     
                @error('fk_wilaya')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>                                
                @enderror
                
            </div> 
            
            <div class="form-group col-6" id="c1">
                <label for="exampleFormControlSelect1">commune<span class="text-danger">*</span></label>
                <select class="form-control @error('fk_commune') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_commune" wire:model='commune_id' >
                    <option value="" selected disabled>Séléctionner commune</option>
                    @foreach ($communes as $commune)
                    <option value="{{ $commune->code_c }}"> {{ $commune->nom_c }}</option>
                  @endforeach
                </select>     
                @error('fk_commune')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>                                
                @enderror
                                     
            </div> 
        </div> 

        {{-- <div class="form-group">
            <label for="description" class=" form-control-label">Les construction mobilisés par l'évènement <span class="text-danger">*</span></label><br>
            <select data-placeholder="  Selectionner toutes les construction a evaluer par l'évènement" multiple class="standardSelect" name="construction[]" required >
                <option value="" label="default"></option>
                @foreach ($constructions as $construction)
                    <option value="{{ $construction->id_const }}" >{{ $construction->nom }}({{ $construction->id_const }})</option>
                @endforeach
            </select>
        </div> --}}
        {{-- <div class="form-group">
            <label for="description" class=" form-control-label">Les wilayas affectées par l'évènement <span class="text-danger">*</span></label><br>
            <select class="js-example-basic-multiple " name="wilayas[]" multiple="multiple" style="width: 100%;">
                @foreach ($constructions as $construction)
                <option value="{{ $construction->id_const }}" >{{ $construction->nom }}({{ $construction->id_const }})</option>
            @endforeach
            </select>
        </div> --}}
        @if (! $constructions->isEmpty())
            
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Chercher une construction..." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        @endif
        <div class="row">
        @foreach ($constructions as $construction)
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <input type="checkbox" name="construction_id[]" value="{{ $construction->id_const }}" onclick="al()">
                      </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{ $construction->nom }}" disabled >
                </div>
            </div>
            @endforeach
            
        </div>
        
        
        
    
    
    
</div>
<script>
    function al() {
        if (this.checked)
        console.log("ok")
    }
</script>
