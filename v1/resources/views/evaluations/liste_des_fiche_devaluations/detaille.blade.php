
@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <li><a href="#">Evaluation/Liste des fiche d'evaluation</a></li>
    </ol>
@endsection
@section('content')
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>FICHE D’EVALUATION DES DOMMAGES</title>
                                
                                <link href="{{ asset('css/ol.css') }}" rel="stylesheet">
                                <script  src="{{ asset('js/ol.js') }}"></script>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <style> body {
     /* background-color: #eee */
 }

 .form-control:focus {
     /* color: #495057;
     background-color: #fff;
     border-color: #80bdff; */
     /* outline: 0; */
     /* box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25) */
 }

 .btn-secondary:focus {
     /* box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5) */
 }

 .close:focus {
     /* box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5) */
 }

 .mt-200 {
     /* margin-top: 200px */
 }</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                {{-- <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script> --}}
                                <script type='text/javascript'>$(document).ready(function(){

$('#smartwizard').smartWizard({
selected: 0,
theme: 'dots',
autoAdjustHeight:true,
transitionEffect:'fade',
showStepURLhash: false,

});

});</script>


 
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                             {{-- <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard.min.css" rel="stylesheet" type="text/css" /> --}}
 <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152092/smartwizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1581152197/smartwizard/jquery.smartWizard.min.js"></script>
 
            {{-- <div class="card-header">
              
                        <div class="card card-body"> --}}
         <div class="container">
           <div  role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">FICHE D’EVALUATION DES DOMMAGES</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                 </div>
                 <div class="modal-body">
                     <div id="smartwizard">
                         <ul>
                             <li><a href="#step-1"><br /><small>IDENTIFICATION CONSTRUCTION</small></a></li>
                             <li><a href="#step-2"><br /><small>DESCRIPTION SOMMAIRE</small></a></li>
                             <li><a href="#step-3"><br /><small>FONDATIONS INFRASTRUCTURE</small></a></li>
                             <li><a href="#step-4"><br /><small>STRUCTURE RESISTANTE</small></a></li>
                             <li><a href="#step-5"><br /><small>ELEMENTS SECONDAIRES</small></a></li>
                             <li><a href="#step-6"><br /><small>AUTRE</small></a></li>
                         </ul>
                         <div>
                           
                             
                            
                             <div id="step-1">
                                <a href="#step-1"><br /><h5>IDENTIFICATION CONSTRUCTION</h5> <br></a>
                                
                                <div class="form-row">

                                    <div class="form-group col-3">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">code inspecteur</span>
                                         </label>{{-- cod_inp_a ou cod_inp_b ????? --}}
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->cod_inp_a  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-3">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">date</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->date_creat  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     <div class="form-group col-3">
                                        <label class="form-control-label"> {{-- .orgn_insp viiiiiiiiiiiiiiiiiiiiiiide --}}
                                            .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont
                                            <span class="form-control-label" id="basic-addon1">Secteur</span>
                                        </label>
                                        <input type="text"  name="code_c" value="vide" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                            @error('code_c')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">zone</span>
                                        </label>{{--cle etrangere avec la table zone pour affichier zone         table zone vide pour le moment--}}
                                        <input type="text"  name="elevation" value="{{ $ficheevaluation->fk_zone  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>
                                 <div class="form-row">
                                     <div class="form-group col-3">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">Construction calculee au seisme</span>
                                        </label>
                                        <input type="text"  name="code_c" value="{{ $ficheevaluation->const_clc  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                            @error('code_c')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                
                                    <div class="form-group col-3">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">Construction controle</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluation->const_cont  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="form-control-label">{{-- .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont viiiiiiiiiiiiiiiiiiiiiiide --}}
                                            <span class="form-control-label" id="basic-addon1">Adresse :</span>
                                        </label>
                                        <input type="text"  name="code_c" value="vide" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                            @error('code_c')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">usage de la construction</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluation->usage  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>
                               

                                 {{-- <div class="row">
                                    <div class="col-md-2">
                                        <label >Zone :</label> <br>
                                        <label >Secteur :</label> </div>
                                     <div class="col-md-2"> 
                                        
                                        
                                         <input type="text" class="form-control" name="code_fiche" placeholder="Secteur" required><br>
                                         <input type="text" class="form-control" placeholder="Zone" required>
                                        
                                        </div>
                                    
                                        
                                     <div class="col-md-2">
                                     </div>
                                     <div class="col-md-6">  <p>Construction Calculée au Séisme?
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> 
                                      <p>Construction Contrôlée?
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p>
                                    </div>
                                    
                                 </div>
                                 <div class="row mt-3">
                                     <div class="col-md-6"> 
                                        <label >Adresse :</label>
                                         <input type="text" class="form-control" placeholder="Adresse" required> </div>
                                     <div class="col-md-6">
                                        <label >Usage de la Construction :</label>
                                        <select class="form-control">
                                            <option value="Logement">Logement</option>
                                            <option value="Administratif">Administratif</option>		
                                        </select>
                                         </div>
                                 </div>
                                 <div class="row mt-3">
                                   
                                   
                                </div> --}}
                                <div id="map">
                                    <div >
                                        <iframe style="border: none;" height="500" width="100%" src="http://192.168.112.2:8080/mapstore/embedded.html?forceDrawer=true#/2?center=4.853399166807979,36.564668077471445&zoom=10"></iframe>
                      
                                    </div>
                                </div>
                             </div>
                             <div id="step-2">
                                <a href="#step-2"><br /><h5>DESCRIPTION SOMMAIRE</h5> <br></a>
                                


                                <div class="form-row">

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Age approximatif :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->age_app  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Nombre de niveaux :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->nb_niv  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Nombre de joints de dilatation -en elevation:</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->nb_join_in  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     
                                    </div>

                                 <div class="form-row">

                                    <div class="form-group col-4">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">Nombre de joints de dilatation - Infrastructure</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluation->nb_join_el  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Vide sanitaire</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->v_san  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Sous-sol</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->sou_sol  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                    </div>
                                    <div class="form-row">


                                    <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Element exterieurs Indepandants Escaliers</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->elem_ext_e  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Element exterieurs Indepandants Auvent</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->elem_ext_a  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                    </div>
                                    <div class="form-row">


                                    <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Element exterieurs Indepandants Passage Couvert</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->elem_ext_e  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>

                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Element exterieurs Indepandants Auvent</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->elem_ext_p}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                    </div>

                                    <div class="form-row">

                                    <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Probleme de sol autour de la construction -Faille :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->faille}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Probleme de sol autour de la construction -Liquefaction :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->liquefa}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 </div>
                                 <div class="form-row">

                                    <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Probleme de sol autour de la construction -Affaissement/soulevement :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->affaisse_s}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Probleme de sol autour de la construction -Glissement :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->gliss}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 </div>










                                 {{-- <div class="row">
                                    <div class=" col-md-8">
                                     <div class=" form-group col form-inline"> 
                                        <label  >Age Approximatif :</label>
                                         <input type="text"   class="form-control" placeholder="Age Approximatif" required> 
                                        </div>
                                     <div class="  form-group col form-inline"> 
                                        <label  >nonmbre de Niveaux :</label>
                                         <input type="text" class="form-control" placeholder="nonmbre de Niveaux" required> 
                                        </div>
                                 
                                         <div class=" form-group col form-inline">
                                            <label  >nonmbre de Joints de Dilatation En élévation :</label>
                                          <input type="text" class="form-control" placeholder="En élévation" required>
                                        </div>
                                       <div class="form-group col form-inline"> <label class="sm-8">nonmbre de Joints de Dilatation en Infrastructure :</label>
                                          <input type="text" class="form-control" placeholder="Infrastructure" required> 
                                        </div>
                                    </div>
                                 


                                    
                                        </div>
                                 
                                 <div class="row mt-3">
                                   
                                      
                                    <div class="col-md-6">  <p>Vide Sanitaire :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                    <div class="col-md-6"> <p>Sous-sol :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                </div> <p class="font-weight-bold">Eléments extérieurs indépendants</p> 
                                <div class="row mt-3">  
                                 
                                      
                                    <div class="col-md-6">  <p>Escaliers :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                    <div class="col-md-6"> <p>Auvent :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                </div>
                                <div class="row mt-3">
                                   
                                      
                                    <div class="col-md-6">  <p>Passage Couvert :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                    
                                </div>
                                <p class="font-weight-bold"> Problème de Sol autour de la Construction </p>
                                <div class="row mt-3">  
                                 
                                      
                                    <div class="col-md-6">  <p>Faille :<br>
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                    <div class="col-md-6"> <p>Liquéfaction :<br>
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                </div>
                                <div class="row mt-3">  
                                 
                                      
                                    <div class="col-md-6">  <p>Affaissement / Soulèvement :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                    <div class="col-md-6"> <p>Glissement :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                </div>--}}
                             </div>
                              
                             <div id="step-3" class="">
                                <a href="#step-3"><br /><h5>FONDATIONS INFRASTRUCTURE</h5> <br></a>
                                
                                <p class="font-weight-bold">Fondations </p>

                                {{-- <div class="form-row"> --}}

                                    <div class="form-group ">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Type de fondation</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->fond_type}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     {{-- <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Type de dommages</span>
                                         </label>.val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont viiiiiiiiiiiiiiiiiiiiiiide
                                         <input type="text"  name="elevation" value="vide" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div> --}}
                                  <h7>Type de dommages</h7>
                                  <div class="form-row">

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">tassement uniforme</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->fon_dom_ta}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                    {{-- </div>                             --}}
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">glissement</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->fon_dom_gl}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     <div class="form-group col-4">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">Basculement</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluation->fon_dom_bs}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>

                                 {{-- <div class="row">

                                     <div class="col-md-6"> 
                                        <label >Type de Fondations :</label>
                                         <input type="text" class="form-control" placeholder="Type de Fondations" required>
                                        </div>
                                     <div class="col-md-6"> <label >Type de Dommages :</label>
                                        <input type="text" class="form-control" placeholder="Type de Dommages" required>
                                    </div>
                                 </div>
                                 <div class="row mt-3">  
                                 
                                      
                                    <div class="col-md-6">  <p>Tassement Uniforme :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                    <div class="col-md-6"> <p>Glissement :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                </div>
                                <div class="row mt-3">
                                   
                                      
                                    <div class="col-md-6">  <p>Basculement :
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                    
                                </div> --}}
                                <p class="font-weight-bold"> Infrastructure (dans le cas VS ou S/Sol) </p>
                                   
                                    <div class="form-row">

                                        <div class="form-group col-6">
                                             <label class="form-control-label">
                                                 <span class="form-control-label" id="basic-addon1">voile beton continu :</span>
                                             </label>
                                             <input type="text"  name="code_c" value="{{ $ficheevaluation->infr_voil}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                                 @error('code_c')
                                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                 @enderror    
                                         </div>
                                     
                                         <div class="form-group col-6">
                                             <label class="form-control-label">
                                                 <span class="form-control-label" id="basic-addon1">poteaux beton avec remplissage</span>
                                             </label>
                                             <input type="text"  name="elevation" value="{{ $ficheevaluation->infr_po_re}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                                 @error('elevation')
                                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                 @enderror    
                                         </div>
                                     </div>
                                      
                                    {{--                                <div class="row mt-3">
                                        <div class="col-md-6">
                                        <label >Voile Béton Continu :</label>
                                        <input type="radio" name="newsletter" value="1"><label for="newsletter">1</label>
                                        <input type="radio" name="newsletter" value="2"><label for="newsletter">2</label>
                                        <input type="radio" name="newsletter" value="3"><label for="newsletter">3</label>
                                        <input type="radio" name="newsletter" value="6"><label for="newsletter">4</label>
                                        <input type="radio" name="newsletter" value="5"><label for="newsletter">5</label>
                                        
                                        <label >Poteaux Béton avec Remplissage :</small></label>
                                            <input type="radio" name="newsletter" value="1"><label for="newsletter"><small>1</small></label>
                                            <input type="radio" name="newsletter" value="2"><label for="newsletter"><small>2</small></label>
                                            <input type="radio" name="newsletter" value="3"><label for="newsletter"><small>3</small></label>
                                            <input type="radio" name="newsletter" value="4"><label for="newsletter"><small>4</small></label>
                                            <input type="radio" name="newsletter" value="5"><label for="newsletter"><small>5</small></label>
                                            
                                         </div>
                                         
                                    
                                </div> --}}
                             </div>
                             <div id="step-4" class="">
                                <a href="#step-4"><br /><h5>STRUCTURE RESISTANTE</h5> <br></a>
                                
                                <p class="font-weight-bold"> Elément porteur (charges verticales) </p>
                                   
                                
                                <div class="form-row">

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">murs en marçonnerie :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->str_e_p_m}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">voile beton :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->str_e_p_vb}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">poteau beton :</span>
                                         </label>{{-- .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont viiiiiiiiiiiiiiiiiiiiiiide --}}
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->val_in_a }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">poteau metaliques :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->str_e_p_mt}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">poteau bois :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->str_e_p_b}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">autre :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->str_e_p_au}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 </div>
                                
                                
                                {{-- <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Murs en maçonnerie :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Voile Béton :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div>
                                
                                    <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Poteaux Béton :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Poteaux Métalliques :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div>
                                 
                                    <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Poteaux Bois :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Autres :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div> --}}
                                 <p class="font-weight-bold"> Elément de contreventement </p>
                                    
                                 <div class="form-row" >

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">murs en marçonnerie :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->el_ctv_m_m}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">voile beton :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->el_ctv_v_b}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">portique beton arme :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->el_ctv_p_b}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">poteau metaliques :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->el_ctv_p_m}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">palees triangulees :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->el_ctv_pa_}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">autre :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->el_ctv_au}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 </div>
                                 
                                 
                                 {{-- <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Murs en maçonnerie :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Voile Béton :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div>
                                 
                                    <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Portiques Béton Armé :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Portiques Métalliques :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div>
                                 
                                    <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Palées Triangulées :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Autres :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div> --}}
                                 <p class="font-weight-bold"> Planchers-toiture terrasse </p>
                                 <div class="form-row" >

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">beton arme :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->plan_tr__1}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">silive metaliques :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->plan_tr_s_}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     <div class="form-group col-4">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">solive bois :</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluation->plan_tr_b}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>   
                                 
                                 
                                 {{-- <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Béton Armé :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Solives Métalliques :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div>
                                 
                                    <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Solives Bois :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                            
                                    
                                                 
                                 </div>--}}
                                 <p class="font-weight-bold"> Toiture inclinée </p>

                                 <div class="form-row">

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">charpente metalique :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->t_in_c_m}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">charpente bois :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->t_in_c_b}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     
                                 

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">couverture tuile :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->t_in_cv_t}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                    </div>
                                    <div class="form-row">

                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">couverture aminate ciment :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->t_in_cv_am}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>

                                     <div class="form-group col-6">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">couverture metalique :</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluation->t_in_cv_me}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>   


                                    {{--<div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Charpente Métallique :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Charpente Bois :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div>
                                
                                    <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Couverture Tuile :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             <div class="col-md-6">
                                                <label >Couverture Amiante Ciment :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                                 
                                 </div>
                                 
                                    <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Couverture Métallique :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div>
                                             
                                    
                                                 
                                 </div>--}}
                             </div> 
                             <div id="step-5" class="">
                                <a href="#step-5"><br /><h5>ELEMENTS SECONDAIRES</h5> <br></a>
                               
                                <p> Escaliers <p>


                                    <div class="form-row">

                                        <div class="form-group col-4">
                                             <label class="form-control-label">
                                                 <span class="form-control-label" id="basic-addon1">beton :</span>
                                             </label>
                                             <input type="text"  name="code_c" value="{{ $ficheevaluation->el_s_es_be}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                                 @error('code_c')
                                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                 @enderror    
                                         </div>
                                     
                                         <div class="form-group col-4">
                                             <label class="form-control-label">
                                                 <span class="form-control-label" id="basic-addon1">metal :</span>
                                             </label>
                                             <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_es_m}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                                 @error('elevation')
                                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                 @enderror    
                                         </div>
                                         <div class="form-group col-4">
                                            <label class="form-control-label">
                                                <span class="form-control-label" id="basic-addon1">bois :</span>
                                            </label>
                                            <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_es_b}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                                @error('elevation')
                                                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                @enderror    
                                        </div>
                                         
                                     </div>   

                                    {{-- <div class="row mt-4">  
                                 
                                      
                                        <div class="col-md-6">
                                            <label >Béton :</label>
                                            <select class="form-control">
                                                <option value="Logement">1</option>
                                                <option value="Administratif">2</option>
                                                <option value="Logement">3</option>
                                                <option value="Administratif">4</option>
                                                <option value="Logement">5</option>
                                                       
                                            </select>
                                             </div> 
                                             <div class="col-md-6">
                                                <label >Métal :</label>
                                                <select class="form-control">
                                                    <option value="Logement">1</option>
                                                    <option value="Administratif">2</option>
                                                    <option value="Logement">3</option>
                                                    <option value="Administratif">4</option>
                                                    <option value="Logement">5</option>
                                                           
                                                </select>
                                                 </div>
                                    
                                 </div>
                                 <div class="row mt-3">  
                                 
                                      
                                    <div class="col-md-6">
                                        <label >Bois :</label>
                                        <select class="form-control">
                                            <option value="Logement">1</option>
                                            <option value="Administratif">2</option>
                                            <option value="Logement">3</option>
                                            <option value="Administratif">4</option>
                                            <option value="Logement">5</option>
                                                   
                                        </select>
                                         </div> 
                                         
                                
                             </div> --}}
                             <p class="font-weight-bold"> Remplissage Extérieur </p>
                             
                             <div class="form-row">

                                <div class="form-group col-3">
                                     <label class="form-control-label">
                                         <span class="form-control-label" id="basic-addon1">marçonnerie :</span>
                                     </label>
                                     <input type="text"  name="code_c" value="{{ $ficheevaluation->el_s_r_m}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                         @error('code_c')
                                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                         @enderror    
                                 </div>
                             
                                 <div class="form-group col-3">
                                     <label class="form-control-label">
                                         <span class="form-control-label" id="basic-addon1">beton prefabrique :</span>
                                     </label>
                                     <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_r_bt}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                         @error('elevation')
                                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                         @enderror    
                                 </div>
                                
                                 
                            

                                <div class="form-group col-3">
                                     <label class="form-control-label">
                                         <span class="form-control-label" id="basic-addon1">bardages :</span>
                                     </label>
                                     <input type="text"  name="code_c" value="{{ $ficheevaluation->el_s_r_ba}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                         @error('code_c')
                                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                         @enderror    
                                 </div>
                             
                                 <div class="form-group col-3">
                                     <label class="form-control-label">
                                         <span class="form-control-label" id="basic-addon1">autre :</span>
                                     </label>
                                     <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_r_au}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                         @error('elevation')
                                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                         @enderror    
                                 </div>
                                
                                 
                             </div>   
                             
                             
                             {{-- <div class="row mt-3">  
                                 
                                      
                                <div class="col-md-6">
                                    <label >Maçonnerie :</label>
                                    <select class="form-control">
                                        <option value="Logement">1</option>
                                        <option value="Administratif">2</option>
                                        <option value="Logement">3</option>
                                        <option value="Administratif">4</option>
                                        <option value="Logement">5</option>
                                               
                                    </select>
                                     </div> 
                                     <div class="col-md-6">
                                        <label >Béton préfabriqué :</label>
                                        <select class="form-control">
                                            <option value="Logement">1</option>
                                            <option value="Administratif">2</option>
                                            <option value="Logement">3</option>
                                            <option value="Administratif">4</option>
                                            <option value="Logement">5</option>
                                                   
                                        </select>
                                         </div>
                            
                         </div>
                         <div class="row mt-3">  
                                 
                                      
                            <div class="col-md-6">
                                <label >Bardages :</label>
                                <select class="form-control">
                                    <option value="Logement">1</option>
                                    <option value="Administratif">2</option>
                                    <option value="Logement">3</option>
                                    <option value="Administratif">4</option>
                                    <option value="Logement">5</option>
                                           
                                </select>
                                 </div> 
                                 <div class="col-md-6">
                                    <label >Autres :</label>
                                    <select class="form-control">
                                        <option value="Logement">1</option>
                                        <option value="Administratif">2</option>
                                        <option value="Logement">3</option>
                                        <option value="Administratif">4</option>
                                        <option value="Logement">5</option>
                                               
                                    </select>
                                     </div>
                        
                     </div> --}}
                     <p class="font-weight-bold"> Autres Eléments Intérieurs </p>
                     
                     <div class="form-row">

                        <div class="form-group col-4">
                             <label class="form-control-label">
                                 <span class="form-control-label" id="basic-addon1">plafonds :</span>
                             </label>
                             <input type="text"  name="code_c" value="{{ $ficheevaluation->el_s_in_p}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                 @error('code_c')
                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                 @enderror    
                         </div>
                     
                         <div class="form-group col-4">
                             <label class="form-control-label">
                                 <span class="form-control-label" id="basic-addon1">cloisons :</span>
                             </label>
                             <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_in_c}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                 @error('elevation')
                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                 @enderror    
                         </div>
                         <div class="form-group col-4">
                            <label class="form-control-label">
                                <span class="form-control-label" id="basic-addon1">elements vitres :</span>
                            </label>
                            <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_in_v}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                @error('elevation')
                                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror    
                        </div>
                         
                     </div>   
                     
                     {{-- <div class="row mt-3">  
                                 
                                      
                        <div class="col-md-6">
                            <label >Plafonds :</label>
                            <select class="form-control">
                                <option value="Logement">1</option>
                                <option value="Administratif">2</option>
                                <option value="Logement">3</option>
                                <option value="Administratif">4</option>
                                <option value="Logement">5</option>
                                       
                            </select>
                             </div> 
                             <div class="col-md-6">
                                <label >Cloisons :</label>
                                <select class="form-control">
                                    <option value="Logement">1</option>
                                    <option value="Administratif">2</option>
                                    <option value="Logement">3</option>
                                    <option value="Administratif">4</option>
                                    <option value="Logement">5</option>
                                           
                                </select>
                                 </div>
                    
                 </div>
                 <div class="row mt-3">  
                                 
                                      
                    <div class="col-md-6">
                        <label >Eléments Vitrés :</label>
                        <select class="form-control">
                            <option value="Logement">1</option>
                            <option value="Administratif">2</option>
                            <option value="Logement">3</option>
                            <option value="Administratif">4</option>
                            <option value="Logement">5</option>
                                   
                        </select>
                         </div> 
                         
                
             </div> --}}
             <p class="font-weight-bold"> Eléments Extérieurs </p>
             <div class="form-row">

                <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">balcons :</span>
                     </label>
                     <input type="text"  name="code_c" value="{{ $ficheevaluation->el_s_ex_b}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                         @error('code_c')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
             
                 <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">garde- corps :</span>
                     </label>
                     <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_ex_ga}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                         @error('elevation')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
                 
                 
            

                <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">auvent :</span>
                     </label>
                     <input type="text"  name="code_c" value="{{ $ficheevaluation->el_s_ex_av}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                         @error('code_c')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
             
                 <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">Acrotères – Corniches :</span>
                     </label>
                     <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_ex_ac}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                         @error('elevation')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
                 
                 
            

                <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">Cheminées :</span>
                     </label>
                     <input type="text"  name="code_c" value="{{ $ficheevaluation->el_s_ex_ch}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                         @error('code_c')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
             
                 <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">Autre :</span>
                     </label>
                     <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_ex_au}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                         @error('elevation')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
                 
                 
             </div>   
             
             {{-- <div class="row mt-3">  
                                 
                                      
                <div class="col-md-6">
                    <label >Balcons :</label>
                    <select class="form-control">
                        <option value="Logement">1</option>
                        <option value="Administratif">2</option>
                        <option value="Logement">3</option>
                        <option value="Administratif">4</option>
                        <option value="Logement">5</option>
                               
                    </select>
                     </div> 
                     <div class="col-md-6">
                        <label >Garde-corps :</label>
                        <select class="form-control">
                            <option value="Logement">1</option>
                            <option value="Administratif">2</option>
                            <option value="Logement">3</option>
                            <option value="Administratif">4</option>
                            <option value="Logement">5</option>
                                   
                        </select>
                         </div>
            
         </div>
         <div class="row mt-3">  
                                 
                                      
            <div class="col-md-6">
                <label >Auvent :</label>
                <select class="form-control">
                    <option value="Logement">1</option>
                    <option value="Administratif">2</option>
                    <option value="Logement">3</option>
                    <option value="Administratif">4</option>
                    <option value="Logement">5</option>
                           
                </select>
                 </div> 
                 <div class="col-md-6">
                    <label >Acrotères – Corniches :</label>
                    <select class="form-control">
                        <option value="Logement">1</option>
                        <option value="Administratif">2</option>
                        <option value="Logement">3</option>
                        <option value="Administratif">4</option>
                        <option value="Logement">5</option>
                               
                    </select>
                     </div>
        
     </div>
     <div class="row mt-3">  
                                 
                                      
        <div class="col-md-6">
            <label >Cheminées :</label>
            <select class="form-control">
                <option value="Logement">1</option>
                <option value="Administratif">2</option>
                <option value="Logement">3</option>
                <option value="Administratif">4</option>
                <option value="Logement">5</option>
                       
            </select>
             </div> 
             <div class="col-md-6">
                <label >Autres :</label>
                <select class="form-control">
                    <option value="Logement">1</option>
                    <option value="Administratif">2</option>
                    <option value="Logement">3</option>
                    <option value="Administratif">4</option>
                    <option value="Logement">5</option>
                           
                </select>
                 </div>
    
 </div> --}}

                            </div>
                            <div id="step-6" class="">
                                <a href="#step-6"><br /><h5>AUTRE</h5> <br></a>
                                <p class="font-weight-bold"> INFLUENCE DES CONSTRUCTIONS ADJACENTES </p>
                                
                                <div class="form-row">

                                    <div class="form-group col-3">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">La consturction menace une autre construction :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->if_c_a_m_c}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-3">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">la construction est menacee par une autre construction :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->if_c_a_emc}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     
                                     
                                

                                    <div class="form-group col-3">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">la construction peut etre soutien par une autre construction :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluation->if_c_a_spc}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-3">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">la construction peut etre soutenue part une autre construction :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluation->el_s_ex_av}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     
                                     
                                 </div>   
                                
                                
                                {{-- <div class="row mt-3">  
                                 
                                      
                                        <div class="col-md-6">  <p>La construction menace une autre construction :<br>
                                            <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                            <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                          </p> </div>
                                        <div class="col-md-6"> <p>La construction est menacée par une autre construction :<br>
                                            <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                            <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                          </p> </div>
                                    
                                    
                                 </div>
                                 <div class="row mt-3">  
                                 
                                      
                                    <div class="col-md-6">  <p>La construction peut être un soutien à une autre construction :<br>
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                    <div class="col-md-6"> <p>La construction peut être soutenue par une autre construction :<br>
                                        <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                        <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                      </p> </div>
                                
                                
                             </div>

                             <div class="row mt-3">  
                                 
                                      
                                <div class="col-md-6">  <p>VICTIMES :<br>
                                    <input type="radio" name="newsletter" value="oui"><label for="newsletter">oui</label>
                                    <input type="radio" name="newsletter" value="non"><label for="newsletter">non</label>
                                  </p> </div>
                                <div class="col-md-6"> 
                                    <label >si oui combien :</label>
                                    <input type="text" class="form-control" placeholder="nonmbre victimes" required>
                                     </div>
                            
                            
                         </div> --}}

<p>VICTIMES</p>

<div class="form-row">

    <div class="form-group col-6">
         <label class="form-control-label">
             <span class="form-control-label" id="basic-addon1">victimes :</span>
         </label>
         <input type="text"  name="code_c" value="{{ $ficheevaluation->victime}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
             @error('code_c')
             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
             @enderror    
     </div>
 
     <div class="form-group col-6">
         <label class="form-control-label">
             <span class="form-control-label" id="basic-addon1">nombre des victimes :</span>
         </label>
         <input type="text"  name="elevation" value="{{ $ficheevaluation->nb_victime}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
             @error('elevation')
             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
             @enderror    
     </div>
     
     
 </div>   




                         <p class="font-weight-bold">
                         COMMENTAIRES SUR LA NATURE ET LA CAUSE PROBABLE DES DOMMAEGES
                         </p>

                         <p class="font-weight-bold">
                           Sens Transversal 
                         </p>

                         <div class="form-row">

                            <div class="form-group col-4">
                                 <label class="form-control-label">
                                     <span class="form-control-label" id="basic-addon1">symetrie en plan :</span>
                                 </label>
                                 <input type="text"  name="code_c" value="{{ $ficheevaluation->com_st_sp}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                     @error('code_c')
                                     <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                     @enderror    
                             </div>
                         
                             <div class="form-group col-4">
                                 <label class="form-control-label">
                                     <span class="form-control-label" id="basic-addon1">regularite en elevation :</span>
                                 </label>
                                 <input type="text"  name="elevation" value="{{ $ficheevaluation->com_st_re}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                     @error('elevation')
                                     <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                     @enderror    
                             </div>
                             <div class="form-group col-4">
                                <label class="form-control-label">
                                    <span class="form-control-label" id="basic-addon1">redondances des files :</span>
                                </label>
                                <input type="text"  name="elevation" value="{{ $ficheevaluation->com_st_rf}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                    @error('elevation')
                                    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror    
                            </div>
                             
                             
                         </div>   
                           {{-- <div class="row mt-4">  
                                 
                                      
                            <div class="col-md-6">  <p>Symétrie en plan :<br>
                                <input type="radio" name="newsletter" value="Bon"><label for="newsletter">Bon</label>
                                <input type="radio" name="newsletter" value="Moyen"><label for="newsletter">Moyen</label>
                                <input type="radio" name="newsletter" value="Mauvais"><label for="newsletter">Mauvais</label>
                            </p> </div>
                            <div class="col-md-6"> <p>Régularité en élévation :<br>
                                <input type="radio" name="newsletter" value="Bon"><label for="newsletter">Bon</label>
                                <input type="radio" name="newsletter" value="Moyen"><label for="newsletter">Moyen</label>
                                <input type="radio" name="newsletter" value="Mauvais"><label for="newsletter">Mauvais</label>
                             </p> </div>
                        
                        
                     </div>
                     <div class="row mt-4">  
                                 
                                      
                        <div class="col-md-6">  <p>Redondance des files :<br>
                            <input type="radio" name="newsletter" value="Bon"><label for="newsletter">Bon</label>
                            <input type="radio" name="newsletter" value="Moyen"><label for="newsletter">Moyen</label>
                            <input type="radio" name="newsletter" value="Mauvais"><label for="newsletter">Mauvais</label></p> </div>
                              
                 </div> --}}

                 <p class="font-weight-bold">
                           Sens Longitudinal
                 </p>
                 <div class="form-row">

                    <div class="form-group col-4">
                         <label class="form-control-label">
                             <span class="form-control-label" id="basic-addon1">symetrie en plan :</span>
                         </label>
                         <input type="text"  name="code_c" value="{{ $ficheevaluation->com_st_sp}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                             @error('code_c')
                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                             @enderror    
                     </div>
                 
                     <div class="form-group col-4">
                         <label class="form-control-label">
                             <span class="form-control-label" id="basic-addon1">regularite en elevation :</span>
                         </label>
                         <input type="text"  name="elevation" value="{{ $ficheevaluation->com_st_re}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                             @error('elevation')
                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                             @enderror    
                     </div>
                     <div class="form-group col-4">
                        <label class="form-control-label">
                            <span class="form-control-label" id="basic-addon1">redondances des files :</span>
                        </label>
                        <input type="text"  name="elevation" value="{{ $ficheevaluation->com_st_rf}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                            @error('elevation')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror    
                    </div>
                     
                     
                 </div>   
                 <p>UATRES COMMENTAIRES</p>

                    <div class="form-group">
                         <label class="form-control-label">
                             <span class="form-control-label" id="basic-addon1">autre commentaire :</span>
                         </label>
                         <input type="text"  name="code_c" value="{{ $ficheevaluation->autre_com}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                             @error('code_c')
                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                             @enderror    
                     </div>  
                           {{-- <div class="row mt-3">  
                                 
                                      
                            <div class="col-md-6">  <p>Symétrie en plan :<br>
                                <input type="radio" name="newsletter" value="Bon"><label for="newsletter">Bon</label>
                                <input type="radio" name="newsletter" value="Moyen"><label for="newsletter">Moyen</label>
                                <input type="radio" name="newsletter" value="Mauvais"><label for="newsletter">Mauvais</label>
                              </p> </div>
                            <div class="col-md-6"> <p>Régularité en élévation :<br>
                                <input type="radio" name="newsletter" value="Bon"><label for="newsletter">Bon</label>
                                <input type="radio" name="newsletter" value="Moyen"><label for="newsletter">Moyen</label>
                                <input type="radio" name="newsletter" value="Mauvais"><label for="newsletter">Mauvais</label>
                              </p> </div>
                        
                        
                     </div>
                     <div class="row mt-3">  
                                 
                                      
                        <div class="col-md-6">  <p>Redondance des files :<br>
                            <input type="radio" name="newsletter" value="Bon"><label for="newsletter">Bon</label>
                                <input type="radio" name="newsletter" value="Moyen"><label for="newsletter">Moyen</label>
                                <input type="radio" name="newsletter" value="Mauvais"><label for="newsletter">Mauvais</label>
                          </p> </div> --}}
                        <p>EVALUATION FINAL</p>
                        <div class="form-row">

                            <div class="form-group col-6">
                                 <label class="form-control-label">
                                     <span class="form-control-label" id="basic-addon1">Niveau general des dommages :</span>
                                 </label>
                                 <input type="text"  name="code_c" value="{{ $ficheevaluation->evl_glb_as}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                     @error('code_c')
                                     <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                     @enderror    
                             </div>
                         
                             <div class="form-group col-6">
                                 <label class="form-control-label">
                                     <span class="form-control-label" id="basic-addon1">couleur a utiliser :</span>
                                 </label>
                                 <input type="text"  name="elevation" value="{{ $ficheevaluation->evl_fin_gd}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                     @error('elevation')
                                     <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                     @enderror    
                             </div>
                 </div>

                            </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 {{-- </div>


</div> --}}


</body>
                        </html> 
@endsection


