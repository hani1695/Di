<div class="input-group mb-3">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">wilaya</span>
        </div>
        <select class="form-control @error('fk_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_wilaya" wire:model='wilaya_id'>
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
   
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">daira</span>
        </div>
        <select class="form-control @error('fk_daira') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_daira" wire:model='daira_id'>
            <option value="" selected disabled>Séléctionner daira</option>
            @foreach ($dairas as $daira)
            <option value="{{ $daira->code_d }}"> {{ $daira->nom_d }}</option>
          @endforeach
        </select>     
        @error('fk_daira')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror
    </div>
  
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text " id="basic-addon1">commune</span>
            </div>
            <select class="form-control @error('fk_id_com') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_com" wire:model='commune_id'>
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

 
    
    
    



