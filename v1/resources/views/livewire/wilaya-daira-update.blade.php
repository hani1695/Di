<div class="input-group mb-3">

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text " id="basic-addon1">fk_wilaya</span>
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
        <span class="input-group-text " id="basic-addon1">fk_daira</span>
    </div>
    <select class="form-control @error('fk_diara') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_diara" wire:model='daira_id'>
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

