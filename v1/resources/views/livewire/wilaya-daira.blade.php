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
        
        <div class="form-group col-6" id="d1">
            <label for="exampleFormControlSelect1">daira<span class="text-danger">*</span></label>
            <select class="form-control @error('fk_diara') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_diara" wire:model='daira_id' >
                <option value="" selected disabled>Séléctionner daira</option>
                @foreach ($dairas as $daira)
                <option value="{{ $daira->code_d }}"> {{ $daira->nom_d }}</option>
              @endforeach
            </select>     
            @error('fk_diara')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>                                
            @enderror
                                 
        </div> 
        
        
        
    </div> 
</div>
