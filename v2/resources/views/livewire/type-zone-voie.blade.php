<div>

    <div class="form-row" id="wd">

        <div class="form-group col-6" id="w1">
            <label for="exampleFormControlSelect1">Nature zone<span class="text-danger">*</span></label>
            <select class="form-control @error('nature_zonep') is-invalid @enderror" id="exampleFormControlSelect1" name="nature_zonep" wire:model='nature_id' >
                {{-- <option value="" selected disabled>Séléctionner nature zone</option> --}}
                <option  selected @if (empty($naturee->id_type_adr))
                    value=""
                @else
                    value="{{$naturee->id_type_adr}}"
                @endif>
                @if (empty($naturee->id_type_adr))
                    Séléctionner nature zone
                @else
                    {{$naturee->descreption_t_adr}}
                @endif
        </option> 
                @foreach ($adresses as $adresse)
                <option value="{{ $adresse->id_type_adr }}"> {{ $adresse->descreption_t_adr }}</option>
              @endforeach
            </select>     
            @error('nature_zonep')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>                                
            @enderror
            
        </div> 
        
        <div class="form-group col-6" id="d1">
            <label for="exampleFormControlSelect1">Zone<span class="text-danger">*</span></label>
            <select class="form-control @error('nom_zonep') is-invalid @enderror" id="exampleFormControlSelect1" name="nom_zonep" wire:model='type_id' >
                {{-- <option value="" selected disabled>Séléctionner zone construction</option> --}}
                <option  selected @if (empty($typee->descreption_z_v))
                    value=""
                @else
                    value="{{$typee->descreption_z_v}}"
                @endif>
                @if (empty($typee->descreption_z_v))
                Séléctionner zone construction
                @else
                    {{$typee->descreption_z_v}}
                @endif
        </option> 
                @foreach ($types as $type)
                <option value="{{ $type->descreption_z_v }}"> {{ $type->descreption_z_v }}</option>
              @endforeach
            </select>     
            @error('nom_zonep')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>                                
            @enderror
                                 
        </div> 
        
    </div> 



</div>
