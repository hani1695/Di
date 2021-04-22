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
    
    
    


</div>
