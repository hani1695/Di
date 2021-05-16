

    <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" >
        <thead>
            <tr>
                <th>N°</th>
                
                {{-- <th>id</th> --}}
                <th>Description</th>
                <th>Date de l'évènement </th>
                <th>Wilaya de l'évènement </th>
                <th>Wilayas affectées par l'évènement</th>
            
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($evenements as $evenement)
                <tr class=""> 
                    <td>  {{ $loop->index +1}} </td>
                    
                    {{-- <td class="tdlibelle">  {{ $evenement->id_const  }}  --}}
                    <td class="tdlibelle">  {{ $evenement->description  }}   </td>
                    <td class="tdlibelle">  {{ date('d-m-Y', strtotime($evenement->date_creation )) }}  </td>
                    <td class="tdlibelle">  {{ $evenement->nom_w }}   </td>
                    <td class="tdlibelle">     
                                        
                    @forelse (DB::table('t_wilaya_sinistree')->join('b_wilaya','b_wilaya.code_w','=','t_wilaya_sinistree.code_w')->where('evenement_id',$evenement->id)->get() as $wilaya)
                        {{ $wilaya->nom_w }},
                    @empty
                    {{ $evenement->id }}
                    @endforelse
                    </td>
                  
                    <td>
                  @if($privilege->modification) <a href="{{route('evenements.edit',$evenement->id)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a> @endif
                  @if($privilege->suppression)  <a href="{{route('evenements.destroy',$evenement->id)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                    </td>
                </tr> 
                
            @endforeach
        </tbody>
          
    </table>
    
{{--     
    <div class="d-flex justify-content-left pagination">
        {!! $evenements->appends(['search'=>request('search')])->links() !!}
    </div>
     --}}