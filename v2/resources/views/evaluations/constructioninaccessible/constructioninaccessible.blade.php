@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Evaluation</a></li>
        <li class="active">Construction inaccessibles</li>
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
                            
                            <th>Construction</th>
                            <th>Adresse</th>

                            <th>Zone </th>
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
                                <td class="tdlibelle">      </td>             
            
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