
<div class="table-responsive">
    <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
        <thead>
            <tr>
                <th>N°</th>
                
                {{-- <th>code</th> --}}
                <th>num route</th>
                <th>classification</th>
                <th>nb voie</th>
                <th>sens</th>
                {{-- <th>carossable</th>
                <th>debut_droite</th>
                <th>debut_gauche</th>
                <th>fin_droite</th>
                <th>fin_gauche</th>
                <th>code_com_dte</th>
                <th>code_com_ghe</th>
                <th>etat_route</th>
                <th>observation</th>
                <th>geom</th>
                <th>fk_commune</th>
                <th>fk_wilaya</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($routier as $routiers)
                <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                    <td>  {{ $loop->index +1}} </td>
                    
                    {{-- <td class="tdlibelle">  {{ $routiers->id_tr  }}  --}}
                    <td class="tdlibelle">  {{ $routiers->num_route  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->classification  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->nb_voie  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->sens  }}   </td>
                    {{-- <td >  {{ $routiers->carossable  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->debut_droite  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->debut_gauche  }}   </td>
                    <td>  {{ $routiers->fin_droite  }}   </td>
                    <td >  {{ $routiers->fin_gauche  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->code_com_dte  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->code_com_ghe  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->etat_route  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->observation  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->geom  }}   </td>
                    <td class="tdlibelle">  {{ $routiers->fk_commune  }}   </td>   
                    <td class="tdlibelle">  {{ $routiers->fk_wilaya  }}   </td> --}}
                    <td>
                        <a href="{{route('routier.detaille',$routiers->id_tr)}}" class="btn btn-sm btn-info " title="detaille" data-toggle="tooltip" data-placement="bottom"><i class="far fa-eye"></i></a>
                    @if ( $privilege->modification) <a href="{{route('routier.edit',$routiers->id_tr)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif
                    @if ($privilege->suppression) <a href="{{route('routier.destroy',$routiers->id_tr)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                    </td>
                </tr> 
                
                @endforeach
                {{-- {{route('routier.edit',$routiers->id)}} {{route('routier.destroy',$routiers->id)}}--}} 
        </tbody>
          
    </table>
    </div>
    
    {{-- <div class="d-flex justify-content-left pagination">
        {!! $routier->appends(['search'=>request('search')])->links() !!}
    </div> --}}
    