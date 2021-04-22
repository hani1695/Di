
<table class="table table-bordered table-striped table-hover table-sm" width="100%">
        <tr>
            <th>N°</th>
            <th>Id</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Nom DR</th>
            <th>Structure</th>
            <th>Fonction</th>
            <th>Profile</th>
            <th>Action</th>
        </tr>
        
        @foreach ($organisme as $organismes)
            <tr > 
                <td>  {{ $loop->index +1}} </td>
                <td>  {{ $organismes->id }} </td>
                <td >  {{ $organismes->matricule  }} </td>
                <td class="tdlibelle">  {{ $organismes->nom  }}   </td>
                <td class="tdlibelle">  {{ $organismes->prenom  }}   </td>
                <td >  {{ $organismes->nom_dr  }}   </td>
                <td class="tdlibelle">  {{ $organismes->structure  }}   </td>
                <td class="tdlibelle">  {{ $organismes->fonction  }}   </td>
                <td>  {{ $organismes->profile  }}   </td>
                <td>
                @if ( $modification==1) <a href="{{route('organisme.create', $organismes->id)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if($suppression=='1') <a href="{{route('organisme.create', $organismes->id)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>

 <script>
  function myFunction() {
      if(!confirm("Est ce que vous êtes sûr de vouloir supprimer cet enregistrement ?"))
      event.preventDefault();
  } 
 </script>

            </tr> 
         @endforeach
      
</table>

<div class="d-flex justify-content-left pagination">
    {!! $organisme->appends(['search'=>request('search')])->links() !!}
</div>
