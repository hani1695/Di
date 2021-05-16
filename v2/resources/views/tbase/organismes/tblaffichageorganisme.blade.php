<div class="card-body card-block">

    <div class="row ">
        @foreach ($organismes as $organisme)
       
        <div class="col-3">
            <div class="card" style="width: 18rem;">
              @if(empty($organisme->logo))
                     <img src="{{asset('/images/admin.jpg')}}" class="card-img-top" alt=""  height="250" width="200">
                @else
                <img src="{{  asset('storage/logoorganisme/'.$organisme->logo)}}" class="card-img-top" alt=""  height="250" width="200">
                @endif
                <div class="card-body">
                  <h5 class="card-title ml-3" style="text-align:center"><u>{{$organisme->nom}}</u></h5>                                  
                  <div class="row ">
                      <h2 class="mb-0 col-4">
                        <a class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#collapseTwo[{{ $loop->index }}]" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="far fa-edit"></i>
                        </a>
                      </h2>
                      <h2 class="mb-0 col-4">
                        <a href="{{route('tbase.edit_organisme',$organisme->id)}}"class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom">
                            <i class="far fa-edit"></i>
                            {{-- {{route('tbase.edit_organisme',1)}} --}}
                        </a>
                      </h2>
                      <h2 class="mb-0 col-4">
                        <a href="{{route('tbase.delete_organisme',$organisme->id)}}"onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom">
                            <i class="fa fa-trash"></i>
                            {{-- {{route('tbase.delete_organisme',1)}} --}}
                        </a>
                      </h2>
                      
                    </div>
                    <div id="collapseTwo[{{ $loop->index }}]" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">Email : {{$organisme->email}}</div>
                      <div class="card-body">TEL : {{$organisme->phone}}</div>
                      <div class="card-body">Région :{{$organisme->nom_reg}}</div>
                      {{-- @php
                      $wilayas=DB::table('b_wilaya')->join('b_organismes', 'b_organismes.fk_wilaya', '=', 'b_wilaya.code_w')
                      ->where()->first();
                      dd($wilayas);
                       $communes=DB::table('b_commune')->join('b_organismes', 'b_organismes.fk_commune', '=', 'b_commune.code_c')
                       ->where()->first();
                      @endphp --}}

                      <div class="card-body">Wilaya :{{$organisme->nom_w}}</div>
                      {{-- <div class="card-body">Wilaya :{{$organisme->wilaya->nom_w}}</div><!--cle etrangere-->
                      <div class="card-body">Wilaya :{{$organisme->commune->nom_c}}</div><!--cle etrangere--> --}}
                      <div class="card-body">Commune :{{$organisme->nom_c}}</div>
                      <div class="card-body">Déscription :{{$organisme->description}}</div>
                    </div>                                  
                  
                </div>
              </div>
        </div>              
        @endforeach

    </div>
</div>