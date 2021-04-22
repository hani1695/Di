<div>

    <div class="form-row" id="wd">

    <div class="form-group col-6" id="w1">
        <label for="exampleFormControlSelect1">wilaya<span class="text-danger">*</span></label>
        <select class="form-control @error('fk_id_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_wilaya" wire:model='wilaya_id' >
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
    
    <div class="form-group col-6" id="d1">
        <label for="exampleFormControlSelect1">daira<span class="text-danger">*</span></label>
        <select class="form-control @error('fk_id_daira') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_daira" wire:model='daira_id' >
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
    
    
    
</div> 

<div class="form-row" id="cs">

<div class="form-group col-6" id="c1">
    <label for="exampleFormControlSelect1">commune<span class="text-danger">*</span></label>
    <select class="form-control @error('fk_id_comn') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_comn" wire:model='commune_id' >
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

    
        
  
    <div class="form-group col-6" id="s1">
        <label for="exampleFormControlSelect1">numero district<span class="text-danger">*</span></label>
        <select class="form-control @error('fk_district') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_district" wire:model='district_id' >
            <option value="" selected disabled>Séléctionner district</option>
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
</div> 
<div id="i">

    <div class="form-group " id="i1">
        <label for="exampleFormControlSelect1">ilot<span class="text-danger">*</span></label>
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





</div>
