<div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">fk_id_wilaya</span>
        </div>
        <select class="form-control @error('fk_id_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_wilaya" wire:model='wilaya_id'>
            <option value="" selected disabled>Séléctionner wilaya</option>
            @foreach ($wilayas as $wilaya)
            <option value="{{ $wilaya->code_w }}"> {{ $wilaya->nom_w }}</option>
          @endforeach
        </select>     
        @error('fk_id_wilaya')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror   
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">fk_id_daira</span>
        </div>
        <select class="form-control @error('fk_id_daira') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_daira" wire:model='daira_id'>
            <option value="" selected disabled>Séléctionner daira</option>
            @foreach ($dairas as $daira)
            <option value="{{ $daira->code_d }}"> {{ $daira->nom_d }}</option>
          @endforeach
        </select>     
        @error('fk_id_daira')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror 
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">commune</span>
        </div>
        <select class="form-control @error('fk_id_comn') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_comn" wire:model='commune_id'>
            <option value="" selected disabled>Séléctionner commune</option>
            @foreach ($communes as $commune)
            <option value="{{ $commune->code_c }}"> {{ $commune->nom_c }}</option>
          @endforeach
        </select>     
        @error('fk_id_comn')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror    
    </div>
    
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">fk_district</span>
        </div>
        <select class="form-control @error('fk_district') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_district" wire:model='district_id'>
            <option value="" selected disabled>Séléctionner ilot</option>
            @foreach ($districts as $district)
            <option value="{{ $district->id_district }}"> {{ $district->num_district }}</option>
          @endforeach
        </select>     
        @error('fk_district')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror 
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">fk_ilot</span>
        </div>
        <select class="form-control @error('fk_ilot') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_ilot" >
            <option value="" selected disabled>Séléctionner ilot</option>
            @foreach ($ilots as $ilot)
            <option value="{{ $ilot->id_ilot_ }}"> {{ $ilot->nom_ilot }}</option>
          @endforeach
        </select>     
        @error('fk_ilot')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>                                
        @enderror    
    </div>

</div>
