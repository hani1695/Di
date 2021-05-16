
<div class="table-responsive">
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
    <thead>
        <tr>
            <th>N°</th>
            
            {{-- <th>id</th> --}}
            {{-- <th>Code agence</th> --}}
            <th> Agence</th>
            <th>Adresse</th>
            <th>Tel</th>
            <th>Fax</th>
            {{-- <th>Telegraphe</th> --}}
            <th>Email</th>
            {{-- <th>RC</th>
            <th>IA</th>
            <th>NIF</th>
            <th>Compte bancaire</th>
            <th>NSS</th>
            <th>abreger</th>
            <th>Sommeil</th>
            <th>Numero Ref</th>
            <th>Lieu Sortant</th>
            <th>Date Courrier</th>
            <th>Numero Sequentiel</th>
            <th>Visible GCPRO</th>
            <th>Guichet Unique</th>
            <th>Wilaya Agence</th>
            <th>Commune Agence</th>
            <th>Date Modif Consolid</th>
            <th>Date Modif</th> --}}
            <th> Direction Régionale</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        
        @foreach ($structures as $structure)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                {{-- <td class="tdlibelle">  {{ $structure->id  }}  --}}
                {{-- <td class="tdlibelle">  {{ $structure->code_ag  }}   </td> --}}
                <td class="tdlibelle">  {{ $structure->nom_ag  }}   </td>
                <td class="tdlibelle">  {{ $structure->Adresse  }}   </td>
                <td class="tdlibelle">  {{ $structure->Tel  }}   </td>
                <td >  {{ $structure->Fax  }}   </td>
                {{-- <td class="tdlibelle">  {{ $structure->Telegraphe  }}   </td> --}}
                <td class="tdlibelle">  {{ $structure->Email  }}   </td>
                {{-- <td >  {{ $structure->RC  }}   </td>
                <td class="tdlibelle">  {{ $structure->IA  }}   </td>
                <td class="tdlibelle">  {{ $structure->NIF  }}   </td>
                <td class="tdlibelle">  {{ $structure->Compte_bancaire  }}   </td>
                <td class="tdlibelle">  {{ $structure->NSS  }}   </td>
                <td class="tdlibelle">  {{ $structure->abreger  }}   </td>
                <td class="tdlibelle">  {{ $structure->Sommeil  }}   </td>
                <td class="tdlibelle">  {{ $structure->NumeroRef  }}   </td>
                <td class="tdlibelle">  {{ $structure->LieuSortant  }}   </td>
                <td class="tdlibelle">  {{ $structure->DateCourrier  }}   </td>
                <td class="tdlibelle">  {{ $structure->NumeroSequentiel  }}   </td>
                <td class="tdlibelle">  {{ $structure->VisibleGCPRO  }}   </td>
                <td class="tdlibelle">  {{ $structure->GuichetUnique  }}   </td>
                    <td >  {{ $structure->fk_wilaya  }}   </td>
                    <td class="tdlibelle">  {{ $structure->fk_commune  }}   </td>
                    <td >  {{ $structure->wilaya->nom_w  }}   </td>   cle etrangere
                    <td class="tdlibelle">  {{ $structure->commune->nom_c  }}   </td>

                    <td class="tdlibelle">  {{ $structure->DateModifConsolid  }}   </td>
                    <td class="tdlibelle">  {{ $structure->DateModif  }}   </td> --}}
                    <td >  {{ $structure->Nom_DR  }}   </td>
                <td>
                    {{-- <a href="{{route('tbase.detaille_structure',$structure->id)}}" class="btn btn-sm btn-info " title="detail" data-toggle="tooltip" data-placement="bottom"><i class="far fa-eye"></i></a> --}}
                @if ( $privilege->modification) <a href="{{route('tbase.edit_structure',$structure->id)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('tbase.delete_structure',$structure->id)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            {{-- {{route('tbase.edit_structure',$structure->id)}} {{route('tbase.delete_structure',$structure->id)}}--}} 
    </tbody>
      
</table>
</div>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $structure->appends(['search'=>request('search')])->links() !!}
</div> --}}
