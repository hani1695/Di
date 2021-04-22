
<div class="table-responsive">
<table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
    <thead>
        <tr>
            <th>N°</th>
            
            <th>code</th>
            <th>nom</th>
            <th>nom arabe</th>
            <th>numero</th>
            {{-- <th>cote</th>
            <th>type entree</th>
            <th>pretype</th>
            <th>nom rue</th>
            <th>nom rue arabe</th>
            <th>nature zone</th>
            <th>nom zone </th>
            <th>nom zone arabe</th>
            <th>nom adresse</th>
            <th>nom adresse arabe</th>
            <th>occupation </th>
            <th>etat</th>
            <th>daira</th>
            <th>wilaya</th>
            <th>geom</th> --}}
            {{-- <th>fk_id_const</th>
            <th>fk_id_com</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($constructionadresses as $data)
            <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                <td>  {{ $loop->index +1}} </td>
                
                <td class="tdlibelle">  {{ $data->id_constp  }} 
                <td class="tdlibelle">  {{ $data->nomp  }}   </td>
                <td class="tdlibelle">  {{ $data->nom_arabp }}   </td>
                <td class="tdlibelle">  {{ $data->numerop  }}   </td>
                {{-- <td class="tdlibelle">  {{ $data->cotep  }}   </td>
                <td >  {{ $data->type_entreep  }}   </td>
                <td class="tdlibelle">  {{ $data->pretypep  }}   </td>
                <td class="tdlibelle">  {{ $data->nom_ruep  }}   </td>
                <td>  {{ $data->nom_rue_arp  }}   </td>
                <td >  {{ $data->nature_zonep  }}   </td>
                <td class="tdlibelle">  {{ $data->nom_zonep  }}   </td>
                <td class="tdlibelle">  {{ $data->nom_zone_arp  }}   </td>
                <td class="tdlibelle">  {{ $data->nom_adressep  }}   </td>
                <td >  {{ $data->nom_adresse_arp  }}   </td>
                <td class="tdlibelle">  {{ $data->occupationp  }}   </td>
                <td class="tdlibelle">  {{ $data->etat_constp  }}   </td>
                <td>  {{ $data->daira  }}   </td>
                <td >  {{ $data->wilaya  }}   </td>
                <td class="tdlibelle">  {{ $data->geom  }}   </td> --}}
                {{-- <td class="tdlibelle">  {{ $data->fk_id_const  }}   </td> cle etrangere
                <td class="tdlibelle">  {{ $data->fk_id_com  }}   </td> cle etrangere--}} 
                <td> 
                    <a href="{{route('constructionadresse.detaille',$data->id_constp)}}" class="btn btn-sm btn-warning " title="detaille" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>
                @if ( $privilege->modification) <a href="{{route('constructionadresse.edit',$data->id_constp)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" constructionadresse-toggle="tooltip" constructionadresse-placement="bottom"><i class="far fa-edit"></i></a>@endif
                @if ($privilege->suppression) <a href="{{route('constructionadresse.destroy',$data->id_constp)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" constructionadresse-toggle="tooltip" constructionadresse-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
            </tr> 
            
            @endforeach
    </tbody>
      
</table>
</div>

<div class="d-flex justify-content-left pagination">
    {!! $constructionadresse->appends(['search'=>request('search')])->links() !!}
</div>
