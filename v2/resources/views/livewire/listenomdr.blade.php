<div class="form-row">

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Direction </span>
        </div>
        <select class="form-control {{$errors->has('nom_dr')? 'is-invalid' :''}}" id="listenomdr" name="nom_dr" >
            <option value="">Selectionner la direction</option>
            @foreach ($listenomdrs as $listenomdr)                
                <option value="{{ $listenomdr->nom_dr }}"  {{old('nom_dr') ? "selected" :""}}" > {{ $listenomdr->nom_dr }}</option>
            @endforeach          
        </select>        
      
       @error('nom_dr')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror    
    </div>

</div>    