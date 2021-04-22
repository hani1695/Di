@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Evaluation/Liste des fiche d'evaluation</a></li>
        {{-- <li class="active">Créer un évènement</li> --}}
    </ol>
@endsection
@section('content')
    <div class="row card" style="margin-bottom: 100px;">
    
    <div class="table-responsive card card-body card-block">
        <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
            <thead>
                <tr>
                    <th>N°</th>
                    
                    <th>code_fiche</th>
                    <th>date_fiche</th>
                    <th>orgn_insp</th>
                    <th>code_inp_a</th>
                    <th>cod_inp_b</th>
                    {{-- <th>const_clc</th>
                    <th>const_cont</th> --}}
                    <th>usage </th>
                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ficheevaluations as $ficheevaluation)
                    <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                        <td>  {{ $loop->index +1}} </td>
                        
                        <td class="tdlibelle">  {{ $ficheevaluation->code_fiche  }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->date_fiche }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->orgn_insp  }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->cod_inp_a  }}   </td>
                        <td >  {{ $ficheevaluation->cod_inp_b  }}   </td>

                        {{-- <td class="tdlibelle">  {{ $ficheevaluation->const_clc  }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->const_cont  }}   </td> --}}
                        <td >  {{ $ficheevaluation->usage  }}   </td>
                        <td>
                            <a href="{{route('ficheevaluation.detaille',$ficheevaluation->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail</i></a>
                            {{-- <a href="{{route('ficheevaluation.det',$ficheevaluation->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille2" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail2</i></a>
                            <a href="{{route('ficheevaluation.det3',$ficheevaluation->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille2" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail3</i></a> --}}

                        </td>
                        
                    </tr> 
                    
                    @endforeach
            </tbody>
            
        </table>
        </div>
    </div>


    
@endsection


