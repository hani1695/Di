
<div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text " id="basic-addon1">Profile </span>
        </div>
        <select class="form-control {{$errors->has('profile')? 'is-invalid' :''}}" id="listeprofile" name="profile" wire:model="listeprofile_id">
            <option value="">Selectionner le profile</option>
            @foreach ($listeprofiles as $listeprofile)                
                <option value="{{ $listeprofile->code }}" >{{ $listeprofile->limitation }} -{{ $listeprofile->code }} - {{ $listeprofile->libelle }}</option>
            @endforeach          
        </select>        
      
       @error('profile')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror    
    </div>