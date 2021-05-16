




@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Évènements</a></li>
        <li class="active">Wilayas affectées </li>
    </ol>
@endsection
@section('content')
@if ( Session::has('event_id'))
    <div class="row" style="margin-bottom: 100px;">
    
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Wilayas affectées par l'évènement</strong><small> Map / Table</small></div>
                <div class="card-body card-block">
                
                    <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
                        <thead>
                            <tr>
                                <th>N°</th>
                                
                                <th>Wilaya</th>
                                <th>Code wilaya</th>
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
                    
                        
                              
                      <div id="map" class="mt-2"></div>
                      
                      <div class="row">
                        <div class="col-md-12">
                          
                          <div id="info">No countries selected</div>
                          <div id="popup" class="ol-popup">
                            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                            <div id="popup-content"></div>
                          </div>
                      </div>
                      </div>
                </div>
               
            </div>
        </div>
    </div>  
    @else
    <img src="{{ asset('images/event.png') }}" alt="">
    @endif
    
        <script>
            
            var test = "{{$wilayaA}}"; 
            
        </script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>  
        <link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css"> 
        
        
        
        <link rel="stylesheet" href="/assets/dist/ol-ext.css" />
        <script type="text/javascript" src="/assets/dist/ol-ext.js"></script>
        
        <script src="https://unpkg.com/elm-pep"></script>
        
        <script src="/assets/map/js/initUE.js"></script> 
@endsection
