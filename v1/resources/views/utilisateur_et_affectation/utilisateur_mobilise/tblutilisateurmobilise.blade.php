<table class="table table-bordered table-hover table-sm" id="myTable" width="100%" >
    <thead>
        <tr>
            <th>N°</th>
            
            <th>matricule</th>
            <th>nom</th>
            <th>prenom </th>
                   
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($usersM as $userM)
            <tr class=""> 
                <td>  {{ $loop->index +1}} </td>
                
                 <td class="tdlibelle">  {{ $userM->matricule  }}  
                <td class="tdlibelle">  {{ $userM->nom  }}   </td>
                <td class="tdlibelle">  {{ $userM->prenom }}   </td>
                {{-- <td class="tdlibelle">  {{ $userM->nom_w }}   </td>
                <td class="tdlibelle">     
                                    
                @forelse (DB::table('t_wilaya_sinistree')->join('b_wilaya','b_wilaya.code_w','=','t_wilaya_sinistree.code_w')->where('userM_id',$userM->id)->get() as $wilaya)
                    {{ $wilaya->nom_w }},
                @empty
                {{ $userM->id }}
                @endforelse
                </td> --}}
              
                <td>
              {{-- @if($privilege->modification) <a href="" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a> @endif --}}
              @if($privilege->suppression)  <a href="{{route('utilisateur_mobilise.destroy',$userM->id_user_event)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif
                </td>
                {{-- {{route('userMs.edit',$userM->id)}}
                {{route('userMs.destroy',$userM->id)}} --}}
            </tr> 
            
        @endforeach
    </tbody>
      
</table>