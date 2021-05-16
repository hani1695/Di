<div class="form-row">

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Direction </span>
        </div>
        <select class="form-control {{$errors->has('nom_dr')? 'is-invalid' :''}}" id="listenomdr" name="nom_dr" wire:model="listenomdr_id">
            <option value="">Selectionner la direction</option>
            @foreach ($listenomdrs as $listenomdr)                
                <option value="{{ $listenomdr->nom_dr }}" > {{ $listenomdr->nom_dr }}</option>
            @endforeach          
        </select>        
      
       @error('nom_dr')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror    
 
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Structure </span>
        </div>
        <select class="form-control {{$errors->has('structure')? 'is-invalid' :''}}" id="listeagence" name="structure">
            <option value="">Selectionner la structure</option>
            @foreach ($listeagences as $listeagence)                
                <option value="{{ $listeagence->code_ag }}" > {{ $listeagence->nom_ag }}</option>
            @endforeach          
        </select>        
      
       @error('structure')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
       @enderror    

    </div>    
</div>    