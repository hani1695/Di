<div class="card-body card-block">

    <div class="row ">
        
        @foreach ($directions as $direction)
       
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="
                {{  asset('storage/logoDirection/'.$direction->logo)}}"" class="card-img-top" alt="" height="250" width="200">
                <div class="card-body">
                  <h5 class="card-title ml-3" style="text-align:center"><u>{{$direction->nom}}</u></h5>                                  
                  <div class="row ">
                      <h2 class="mb-0 col-4">
                        <a class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#collapseTwo[{{ $loop->index }}]" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="far fa-edit"></i>
                        </a>
                      </h2>
                      <h2 class="mb-0 col-4">
                        <a href="{{route('tbase.edit_direction',$direction->id)}}"class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom">
                            <i class="far fa-edit"></i>
                        </a>
                      </h2>
                      <h2 class="mb-0 col-4">
                        <a href="{{route('tbase.delete_direction',$direction->id)}}"onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom">
                            <i class="fa fa-trash"></i>
                        </a>
                      </h2>
                      
                    </div>
                    <div id="collapseTwo[{{ $loop->index }}]" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">Email : {{$direction->email}}</div>
                      <div class="card-body">TEL : {{$direction->phone}}</div>
                      <div class="card-body">Region :{{$direction->nom_reg}}</div>
                      <div class="card-body">Organisme :{{$direction->Nom_Org}}</div>
                      <div class="card-body">Wilaya :{{$direction->nom_w}}</div><!--cle etrangere-->
                      <div class="card-body">commune :{{$direction->nom_c}}</div><!--cle etrangere-->
                       {{-- <div class="card-body">Wilaya :{{$direction->wilaya->nom_w}}</div><!--cle etrangere-->
                      <div class="card-body">Wilaya :{{$direction->commune->nom_c}}</div><!--cle etrangere--> --}}
                    </div>                                  
                  
                </div>
              </div>
        </div>              
             
        
        @endforeach

    </div>
</div>