@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Evaluation</a></li>
        <li class="active">Construction évaluées</li>
    </ol>
@endsection
@section('content')
<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-body card-block">

                <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" >
                    <thead>
                        <tr>
                            <th>N°</th>
                            
                            <th> Construction</th>
                            <th> Adresse</th>
                            <th> Zone </th>
                            <th>Wilaya </th>
                            <th>Commune </th>
                            <th>Actions</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($consZones as $consZone)
                            <tr class=""> 
                                <td>  {{ $loop->index +1}} </td>
                                
                                <td class="tdlibelle">  {{ $consZone->nom  }}     </td>         
                                <td class="tdlibelle">       </td>                 
                                <td class="tdlibelle">  {{ $consZone->nom_zone }}   </td>
                                <td class="tdlibelle">  {{ $consZone->nom_w }}   </td>
                                <td class="tdlibelle">  {{ $consZone->nom_c }}   </td>
                                <td> 
                                    {{-- @if ( $privilege->modification) <a href="{{route('commune.edit',$communes->code_c)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>@endif --}}
                                    {{-- @if ($privilege->suppression) <a href="{{route('constructionAevaluer.destroy',$consZone->id_const_ev)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>@endif --}}
                                </td>
                            </tr> 
                            
                        @endforeach
                    </tbody>
                      
                </table>

           
        </div>
    </div>
</div>  
    
@endsection
 


    {{-- <div class="row card" style="margin-bottom: 100px;">
    
    
    <div class="table-responsive card-body card-block">
        <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
            <thead>
                <tr>
                    <th>N°</th>
                    
                    {{-- <th>id</th> 
                    <th>nom_ev</th>
                    <th>nom_arab_ev</th>
                    <th>usage</th>
                    <th>etat uniteevaluers</th>
                    <th>daira</th>
                    <th>wilaya</th>
                    <th>geom</th>
                    <th>date creation</th>
                    <th>modification user</th>
                    <th>date modification user</th>
                    {{-- <th>id commune</th>
                    <th>fk_id_wilaya</th>
                    <th>fk_id_daira</th>
                    <th>fk_district</th>
                    <th>fk_ilot</th> --}}
                    {{-- <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                
                @foreach ($uniteevaluers as $uniteevaluers)
                    <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                        <td>  {{ $loop->index +1}} </td>
                        
                        {{-- <td class="tdlibelle">  {{ $uniteevaluers->id_const  }}  -
                        <td class="tdlibelle">  {{ $uniteevaluers->nom_ev  }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->nom_arab_ev }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->usage_ev  }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->etat_const_ev  }}   </td>
                        <td >  {{ $uniteevaluers->daira  }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->wilaya  }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->geom_ev  }}   </td>
                        <td >  {{ $uniteevaluers->date_creation }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->modification_user  }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->date_modification_user  }}   </td>
                        {{-- <td>  {{ $uniteevaluers->fk_id_comn  }}   </td>
                        <td >  {{ $uniteevaluers->fk_id_wilaya  }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->fk_id_daira  }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->fk_district  }}   </td>
                        <td class="tdlibelle">  {{ $uniteevaluers->fk_ilot  }}   </td> --}}
                        {{-- <td>
                    <a href="{{route('uniteevaluers.edit',$uniteevaluers->id_const_ev)}}" class="btn btn-sm btn-success " title="Editer les champs de cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit"></i></a>
                        <a href="{{route('uniteevaluers.destroy',$uniteevaluers->id_const_ev)}}" onclick="return myFunction();"  class="btn btn-sm btn-danger " title="Supprimer cet enregistrement" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a>
                        </td> 
                    </tr> 
                    
                    @endforeach
            </tbody>
            
        </table>
        </div>
        
        {{-- <div class="d-flex justify-content-left pagination">
            {!! $uniteevaluers->appends(['search'=>request('search')])->links() !!}
        </div> 
        
        </div>   --}}