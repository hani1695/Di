
<table class="table table-bordered table-striped table-hover table-sm" id="table" width="100%">
        <tr>
            <th>N°</th>
            <th>Code</th>
            <th>Libellé</th>
            <th>Description</th>
            <th>Limitation</th>
            <th>Action</th>
        </tr>
        
        @foreach ($securite as $securites)
            <tr > 
                <td>  {{ $loop->index +1}} </td>
                <td >  {{ $securites->code  }}   </td>
                <td class="tdlibelle">  {{ $securites->libelle  }}   </td>
                <td class="tdlibelle">  {{ $securites->description  }}   </td>
                <td>  {{ $securites->limitation  }}   </td>
                <td>
                @if ( $privilege->modification) <a href="/securite/modif/{{$securites->code}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ( $privilege->consultation) <a href="/securite/privilege/{{$securites->code}}" class="btn btn-sm btn-warning " title="Attribuer les privilèges" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-key" ></i></a>@endif
                @if($privilege->suppression) <a href="/securite/delete/{{$securites->code}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                 </td>
         </tr> 
         @endforeach

</table>

<div class="d-flex justify-content-left pagination">
    {!! $securite->appends(['search'=>request('search')])->links() !!}
</div>

 <script>
  function myFunction() {
      if(!confirm("Est ce que vous êtes sûr de vouloir supprimer cet enregistrement ?"))
      event.preventDefault();
  } 
 </script>

         
      