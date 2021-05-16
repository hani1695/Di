{{-- @extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Evaluation/Liste des fiche d'evaluation</a></li>
        {{-- <li class="active">Créer un évènement</li> 
    </ol>
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>    
<link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">

 <!-- FontAwesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
 <link rel="stylesheet" href="/assets/dist/ol-ext.css" />
 <script type="text/javascript" src="/assets/dist/ol-ext.js"></script>
 <!-- Pointer events polyfill for old browsers, see https://caniuse.com/#feat=pointer -->
 <script src="https://unpkg.com/elm-pep"></script>

 
    <script src="/assets/map/js/initindex.js"></script>

	
	
	
	
	
	
	<style>
      .ol-dragbox {
        background-color: rgba(255,255,255,0.4);
        border-color: rgba(100,150,0,1);
      }
      .ol-popup {
        position: relative;
        background-color: white;
        box-shadow: 0 1px 4px rgba(0,0,0,0.2);
        padding: 12px 20px;
        border-radius: 5px;
        border: 1px solid #cccccc;
        bottom: 12px;
        left: 20px;
        min-width: 280px;
        
   
      }
      .ol-popup:after, .ol-popup:before {
        top: 100%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: relative;
        pointer-events: none;
      }
      .ol-popup:after {
        border-top-color: white;
        border-width: 10px;
        left: 48px;
        margin-left: -10px;
      }
      .ol-popup:before {
        border-top-color: #cccccc;
        border-width: 11px;
        left: 48px;
        margin-left: -11px;
      }
      .ol-popup-closer {
        text-decoration: none;
        position: absolute;
        top: 2px;
        right: 8px;
      }
      .ol-popup-closer:after {
        content: "✖";
      }

      {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
} 
    </style>
	
	
	
	
	
	
	
	
	
    <div class="row " style="margin-bottom: 100px;">
    <div class="card-header">
        <a href="{{ route('exportXls') }}" class="btn btn-success float-right">Exporter les fiches en xls</a>
        <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample" id="btnmap" onclick="mapShow ()">Masquer la map</a>
    </div>
    <div class="card card-body card-block">
      <div class="collapse show" id="collapseExample">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              
      <div id="map"></div>
      </div>
      </div>
      
      <div class="row mb-5">
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
        
    <div class="table-responsive ">
        <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
            <thead>
                <tr>
                    <th>N°</th>
                    
                    <th>code fiche</th>
                    <th>date</th>
                    <th>wilaya</th>
                    <th>commmune</th>
                    <th>code inspecteur</th>
                    <th>adresse</th>

                    <th>cod_inp_b</th> --}}
                    {{-- <th>const_clc</th>
                    <th>const_cont</th> 
                    <th>usage </th>
                    <th>évaluation</th>
                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ficheevaluations as $ficheevaluation)
                    <tr 
                    {{-- {{ $ficheevaluatthision->evl_glb_as}} 
                    class="{{ (Session::has('success') && $loop->index==0) ? 'table-success' : '' }}" style="
                    {{--@if($ficheevaluation->evl_fin_gd == 'VERT 1')
                        background-color: #5cff78;                    
                    @elseif ($ficheevaluation->evl_fin_gd == 'VERT 2')
                        background-color: #02c021;                    
                    @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 3')
                        background-color:#ffc107;
                    @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 4')
                        background-color: #fd7e14;                        
                    @elseif ($ficheevaluation->evl_fin_gd == 'ROUGE 5')
                        background-color: #dc3545;
                    @endif 
                    "> 
                        <td>  {{ $loop->index +1}} </td>
                        
                        <td class="tdlibelle">  {{ $ficheevaluation->code_fiche  }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->date_fiche }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->wilaya  }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->nom_c  }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->cod_inp_a  }}   </td>
                        <td class="tdlibelle">    </td>

                        {{-- <td >  {{ $ficheevaluation->cod_inp_b  }}   </td> 

                        {{-- <td class="tdlibelle">  {{ $ficheevaluation->const_clc  }}   </td>
                        <td class="tdlibelle">  {{ $ficheevaluation->const_cont  }}   </td> 
                        <td >  {{ $ficheevaluation->usage  }}   </td>
                        <td style="text-align: center"><h5><span  class="badge rounded-pill text-white 
                        @if($ficheevaluation->evl_fin_gd == 'VERT 1')
                        vert1                    
                    @elseif ($ficheevaluation->evl_fin_gd == 'VERT 2')
                        vert2                    
                    @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 3')
                        orange3
                    @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 4')
                        orange4                        
                    @elseif ($ficheevaluation->evl_fin_gd == 'ROUGE 5')
                        rouge5
                    @endif 
                        ">
                        @if($ficheevaluation->evl_fin_gd == 'VERT 1')
                        VERT1                 
                    @elseif ($ficheevaluation->evl_fin_gd == 'VERT 2')
                    VERT2               
                    @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 3')
                    ORANGE3
                    @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 4')
                    ORANGE4                     
                    @elseif ($ficheevaluation->evl_fin_gd == 'ROUGE 5')
                        ROUGE5
                   @endif 
                    </span></h5></td>
                        <td>
                            <a href="{{route('ficheevaluation.detaille',$ficheevaluation->code_fiche)}}" class="btn btn btn-info " title="détail" data-toggle="tooltip" data-placement="bottom"><i class="far fa-eye"> </i></a>
                            {{-- <a href="{{route('ficheevaluation.det',$ficheevaluation->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille2" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail2</i></a>
                            <a href="{{route('ficheevaluation.det3',$ficheevaluation->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille2" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail3</i></a> 
                            <a href="{{ route('ficheevaluation.pdf',$ficheevaluation->code_fiche)}}" class="btn btn-danger" title="télécharger la fiche en pdf" target="blank"><i class="fas fa-file-pdf"></i> &nbsp;</a>
                        </td>
                        
                    </tr> 
                    
                    @endforeach
            </tbody>
            
        </table>
        <br>
        </div>
		
		        
   
	
    </div>
    </div>
    

    
@endsection --}}


@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Évaluations</a></li>
        <li class="active">Fiche d'évaluations</li>
    </ol>
@endsection
@section('content')
@if(Session::has('event_id'))
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>    
<link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">

 <!-- FontAwesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
 <link rel="stylesheet" href="/assets/dist/ol-ext.css" />
 <script type="text/javascript" src="/assets/dist/ol-ext.js"></script>
 <!-- Pointer events polyfill for old browsers, see https://caniuse.com/#feat=pointer -->
 <script src="https://unpkg.com/elm-pep"></script>

 
    <script src="/assets/map/js/initindex.js"></script>
<style>
  .ol-dragbox {
    background-color: rgba(255,255,255,0.4);
    border-color: rgba(100,150,0,1);
  }
  .ol-popup {
    position: relative;
    background-color: white;
    box-shadow: 0 1px 4px rgba(0,0,0,0.2);
    padding: 12px 20px;
    border-radius: 5px;
    border: 1px solid #cccccc;
    bottom: 12px;
    left: 20px;
    min-width: 280px;
    

  }
  .ol-popup:after, .ol-popup:before {
    top: 100%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: relative;
    pointer-events: none;
  }
  .ol-popup:after {
    border-top-color: white;
    border-width: 10px;
    left: 48px;
    margin-left: -10px;
  }
  .ol-popup:before {
    border-top-color: #cccccc;
    border-width: 11px;
    left: 48px;
    margin-left: -11px;
  }
  .ol-popup-closer {
    text-decoration: none;
    position: absolute;
    top: 2px;
    right: 8px;
  }
  .ol-popup-closer:after {
    content: "✖";
  }

  {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
background-color: #555;
color: white;
padding: 16px 20px;
border: none;
cursor: pointer;
opacity: 0.8;
position: fixed;
bottom: 23px;
right: 28px;
width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
display: none;
position: fixed;
bottom: 0;
right: 15px;
border: 3px solid #f1f1f1;
z-index: 9;
}

/* Add styles to the form container */
.form-container {
max-width: 300px;
padding: 10px;
background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
width: 100%;
padding: 15px;
margin: 5px 0 22px 0;
border: none;
background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
background-color: #ddd;
outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
background-color: #4CAF50;
color: white;
padding: 16px 20px;
border: none;
cursor: pointer;
width: 100%;
margin-bottom:10px;
opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
opacity: 1;
} 
</style>
    <div class="row" style="margin-bottom: 100px;">
          {{-- <div class="card-header">
            <a href="{{ route('exportXls') }}" class="btn btn-success float-right">Exporter les fiches en xls</a>
            <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample" id="btnmap" onclick="mapShow ()">Masquer la map</a>
        </div> --}}
        <div class="col-lg">
            <div class="card">
                <div class="card-header"><strong>Fiche d'évaluations</strong><small> Map / Table</small></div>
                <div class="card-header">
                  <a href="{{ route('exportXls') }}" class="btn btn-success float-right">Exporter les fiches en xls</a>
                  <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample" id="btnmap" onclick="mapShow ()">Masquer la map</a>
                  <div class="collapse show" id="collapseExample">
                    
                     <div id="map" class="mt-3"></div>
                      <div id="info">No countries selected</div>
                        <div id="popup" class="ol-popup">
                          <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                          <div id="popup-content"></div>
                        </div>                        
                    
                  </div>

                
                </div>
                <div class="card-body card-block">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" id="myTable" width="100%" style="white-space: nowrap ;">
                      <thead>
                          <tr>
                              <th>#</th>
                              
                              <th>N° fiche</th>
                              <th>Date</th>
                              <th>Wilaya</th>
                              <th>Commune</th>
                              <th>Inspecteur</th>
                              <th>Adresse</th>
          
                              {{-- <th>cod_inp_b</th> --}}
                              {{-- <th>const_clc</th> --}}
                              {{-- <th>const_cont</th>  --}}
                              <th>Usage </th>
                              <th>Évaluation</th>
                             
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($ficheevaluations as $ficheevaluation)
                              <tr> 
                                  <td>  {{ $loop->index +1}} </td>
                                  
                                  <td class="tdlibelle">  {{ $ficheevaluation->code_fiche  }}   </td>
                                  <td class="tdlibelle">  {{ date('d-m-Y', strtotime($ficheevaluation->date_fiche)) }}</td>
                                  <td class="tdlibelle">  {{ $ficheevaluation->wilaya  }}   </td>
                                  <td class="tdlibelle">  {{ $ficheevaluation->nom_c  }}   </td>
                                  <td class="tdlibelle">  {{ $ficheevaluation->cod_inp_a  }}   </td>
                                  <td class="tdlibelle">    </td>
          
                                  {{-- <td >  {{ $ficheevaluation->cod_inp_b  }}   </td>  --}}
          
                                  {{-- <td class="tdlibelle">  {{ $ficheevaluation->const_clc  }}   </td> --}}
                                  {{-- <td class="tdlibelle">  {{ $ficheevaluation->const_cont  }}   </td>  --}}
                                  <td >  {{ $ficheevaluation->usage  }}   </td>
                                  <td style="text-align: center"><h5><span  class="badge rounded-pill text-white 
                                  @if($ficheevaluation->evl_fin_gd == 'VERT 1')
                                  vert1                    
                              @elseif ($ficheevaluation->evl_fin_gd == 'VERT 2')
                                  vert2                    
                              @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 3')
                                  orange3
                              @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 4')
                                  orange4                        
                              @elseif ($ficheevaluation->evl_fin_gd == 'ROUGE 5')
                                  rouge5
                              @endif 
                                  ">
                                  @if($ficheevaluation->evl_fin_gd == 'VERT 1')
                                  VERT1                 
                              @elseif ($ficheevaluation->evl_fin_gd == 'VERT 2')
                              VERT2               
                              @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 3')
                              ORANGE3
                              @elseif ($ficheevaluation->evl_fin_gd == 'ORANGE 4')
                              ORANGE4                     
                              @elseif ($ficheevaluation->evl_fin_gd == 'ROUGE 5')
                                  ROUGE5
                             @endif 
                              </span></h5></td>
                                  <td>
                                      <a href="{{route('ficheevaluation.detaille',$ficheevaluation->code_fiche)}}" class="btn btn btn-info " title="détail" data-toggle="tooltip" data-placement="bottom"><i class="far fa-eye"> </i></a>
                                      {{-- <a href="{{route('ficheevaluation.det',$ficheevaluation->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille2" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail2</i></a>
                                      <a href="{{route('ficheevaluation.det3',$ficheevaluation->qgs_fid_0)}}" class="btn btn btn-warning " title="detaille2" data-toggle="tooltip" data-placement="bottom"><i class="far fa-edit">Detail3</i></a>  --}}
                                      <a href="{{ route('ficheevaluation.pdf',$ficheevaluation->code_fiche)}}" class="btn btn-danger" title="télécharger la fiche en pdf" target="blank"><i class="fas fa-file-pdf"></i> &nbsp;</a>
                                  </td>
                                  
                              </tr> 
                              
                              @endforeach
                      </tbody>
                      
                  </table>
                  </div>
                    
                </div>
               
            </div>
        </div>
    </div>  
@else
<img src="{{ asset('images/event.png') }}" alt="">

@endif
@endsection 


