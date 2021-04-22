
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Organisme</th>
            <th>Direction</th>
            <th>Structure</th>
            <th>Fonction</th>
            <th>Profile</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($utilisateur as $utilisateurs)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td >  {{ $utilisateurs->matricule  }}   </td>
                <td class="tdlibelle">  {{ $utilisateurs->nom  }}   </td>
                <td class="tdlibelle">  {{ $utilisateurs->prenom  }}   </td>
                <td class="tdlibelle">  {{ $utilisateurs->organisme  }}   </td>
                <td >  {{ $utilisateurs->nom_dr  }}   </td>
                <td class="tdlibelle">  {{ $utilisateurs->structure  }}   </td>
                <td class="tdlibelle">  {{ $utilisateurs->fonction  }}   </td>
                <td>  {{ $utilisateurs->profile  }}   </td>
                <td>
                @if ( $privilege->modification) <a href="{{route('utilisateur.edit',$utilisateurs->id)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('utilisateur.destroy',$utilisateurs->id)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>

<div class="d-flex justify-content-left pagination">
    {!! $utilisateur->appends(['search'=>request('search')])->links() !!}
</div>
