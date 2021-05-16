<div>
    <div class="form-row" id="wd">
        <div class="form-group col-6" id="w1">
            <label for="exampleFormControlSelect1">wilaya<span class="text-danger">*</span></label>
            <select class="form-control @error('fk_id_wilaya') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_wilaya" wire:model='wilaya_id' >
                {{-- <option value="" selected disabled>Séléctionner wilaya</option> --}}
                <option selected @if (empty($wilayaa->code_w))
                    value=""
                @else
                    value="{{$wilayaa->code_w}}"
                @endif>
                @if (empty($wilayaa->code_w))
                    Séléctionner la wilaya
                @else
                    {{ $wilayaa->code_w }}-{{ $wilayaa->nom_w }}
                @endif
                </option>
                @foreach ($wilayas as $wilaya)
                <option value="{{ $wilaya->code_w }}">{{ $wilaya->code_w }}-{{ $wilaya->nom_w }}</option>
              @endforeach
            </select>     
            @error('fk_id_wilaya')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>                                
            @enderror
            
        </div> 
        
        <div class="form-group col-6" id="c1">
            <label for="exampleFormControlSelect1">commune<span class="text-danger">*</span></label>
            <select class="form-control @error('fk_id_comn') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_id_comn" wire:model='commune_id' >
                {{-- <option value="" selected disabled>Séléctionner commune</option> --}}
                <option  selected @if (empty($communee->code_c))
                    value=""
                @else
                    value="{{$communee->code_c}}"
                @endif>
                @if (empty($communee->code_c))
                    Séléctionner la commune
                @else
                    {{$communee->nom_c}}
                @endif
</option> 
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
    </div> 
 
</div>
