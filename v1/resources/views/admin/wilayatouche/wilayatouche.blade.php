@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Evaluation/Wilayas touché</a></li>
        {{-- <li class="active">Créer un évènement</li> --}}
    </ol>
@endsection
@section('content')
@if ( Session::has('event_id'))

<div class="row" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><strong>liste des wilaya touche</strong><small>Table</small></div>
            <div class="card-header">
            @include('admin.messages')


    
    <div class="table-responsive card card-body card-block">
        <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
            <thead>
                <tr>
                    <th>N°</th>
                    
                    <th>nom</th>
                    <th>code wilaya</th>
                    {{-- <th>orgn_insp</th>
                    <th>code_inp_a</th>
                    <th>cod_inp_b</th> --}}
                    {{-- <th>const_clc</th>
                    <th>const_cont</th> --}}
                    {{-- <th>usage </th> --}}
                   
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($wilayatouches as $wilayatouche)
                    <tr class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}"> 
                        <td>  {{ $loop->index +1}} </td>
                        
                        <td class="tdlibelle">  {{ $wilayatouche->nom_w  }}   </td>
                        <td class="tdlibelle">  {{ $wilayatouche->code_w }}   </td>
                        {{-- <td class="tdlibelle">  {{ $wilayatouche->orgn_insp  }}   </td>
                        <td class="tdlibelle">  {{ $wilayatouche->cod_inp_a  }}   </td>
                        <td >  {{ $wilayatouche->cod_inp_b  }}   </td> --}}

                        {{-- <td class="tdlibelle">  {{ $wilayatouche->const_clc  }}   </td>
                        <td class="tdlibelle">  {{ $wilayatouche->const_cont  }}   </td> --}}
                        {{-- <td >  {{ $wilayatouche->usage  }}   </td> --}}
                        {{-- <td>
                            <a href="{{route('wilayatouche.detaille',$wilayatouche->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail</i></a> 
                             <a href="{{route('wilayatouche.det',$wilayatouche->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille2" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail2</i></a>
                            <a href="{{route('wilayatouche.det3',$wilayatouche->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille2" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail3</i></a> 

                        </td> --}}
                        
                    </tr> 
                    
                    @endforeach
            </tbody>
            
        </table>
        </div>
    </div>

    @else
    <img src="{{ asset('images/event.png') }}" alt="">
    @endif
    
@endsection


