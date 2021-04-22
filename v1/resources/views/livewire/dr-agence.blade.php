<div class="form-row">
    <div class="form-group col-md-6">
        <label for="dr">DR <span class="text-danger">*</span></label>
        <select class="form-control" id="dr" name="nom_dr" wire:model="Nom_DR">
            <option value="" >Sélectionner la DR </option>
             
            <option selected value="DG" >DG</option>
            <option value="DRC" >DRC</option>
            

        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="agence">Structure <span class="text-danger">*</span></label>
        <select class="form-control" name="structure" id="agence">
            <option selected value=""> Séléctionner la Structure</option>
            @foreach ($st as $data)
                <option value="{{ $data->nom_ag }}">{{ $data->nom_ag }}</option>
            @endforeach
        </select>
    </div>
</div>