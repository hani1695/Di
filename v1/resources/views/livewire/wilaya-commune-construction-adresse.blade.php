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
        <div class="form-group col-6" >
            <label for="exampleFormControlSelect1">daire<span class="text-danger">*</span></label>
            <select class="form-control @error('fk_daira') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_daira" wire:model='daira_id' >
                <option value="" selected disabled>Séléctionner daira</option>
                @foreach ($dairas as $daira)
                <option value="{{ $daira->code_d}}"> {{ $daira->nom_d }}</option>
              @endforeach
            </select>     
            @error('fk_daira')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>                                
            @enderror
                                 
        </div> 
        
        
        
        
        
        
    </div> 
    <div class="form-group " id="c1">
        <label for="exampleFormControlSelect1">commune<span class="text-danger">*</span></label>
        <select class="form-control @error('fk_id_com') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_com" wire:model='commune_id' >
            <option value="" selected disabled>Séléctionner commune</option>
            @foreach ($communes as $commune)
            <option value="{{ $commune->code_c }}"> {{ $commune->nom_c }}</option>
          @endforeach
        </select>     
        @error('fk_id_com')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror
                             
    </div> 
    
    
    


</div>
