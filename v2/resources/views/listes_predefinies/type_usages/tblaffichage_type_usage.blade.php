
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%">
    <thead>
        <tr>
            <th>N°</th>
            
            {{-- <th>Code </th> --}}
            <th>Famille usage </th>
            {{-- <th>Type d'usage </th> --}}
            <th>Usage </th>


            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($usage as $usages)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                {{-- <td >  {{ $usages->Code_usage_const  }}   </td> --}}
                <td class="tdlibelle">  {{ $usages->Famille_usage_const  }}   </td>
                {{-- <td class="tdlibelle">  {{ $usages->Libelle_usage_const  }}   </td> --}}
                <td class="tdlibelle">  {{ $usages->Detail_usage_const }}   </td>

                

                <td>
                @if ( $privilege->modification) <a href="{{route('usage.edit',$usages->Code_usage_const)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('usage.destroy',$usages->Code_usage_const)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
            
    </tbody>
      
</table>
{{-- 
<div class="d-flex justify-content-left pagination">
    {!! $usage->appends(['search'=>request('search')])->links() !!}
</div> --}}
