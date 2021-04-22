
@extends('admin.master')
@section('ol-title')
    <h1>POST-CATASTROPHE</h1>
@endsection
@section('ol-menu')
    <ol class="breadcrumb text-right">
        <a href="#">Evaluation/Liste des fiche d'evalthisuation</a>
    </ol>
@endsection
@section('content')
<style>
        
    .ul .li {
        list-style-type: none;
        cursor: pointer;
    }
    .progressbar{
      counter-reset: step;
    }
    .progressbar .li{
      float: left;
      width: 16%;
      position: relative;
      text-align: center;
    }
    .progressbar .li:before{
      content:counter(step);
      counter-increment: step;
      width: 60px;
      height: 60px;
      border: 2px solid #bebebe;
      display: block;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      line-height: 57px;
      background: rgb(9, 170, 211);
      color: #ffffff;
      text-align: center;
      font-weight: bold;
    }
    .progressbar .li:after{
      content: '';
      position: absolute;
      width:100%;
      height: 3px;
      background: #979797;
      top: 15px;
      left: -50%;
      z-index: -1;
    }
    .progressbar .li.active:before{
     border-color: #3aac5d;
     background: #3aac5d;
     color: white
    }
    .progressbar .li.active:after{
     background: #3aac5d;
    }
    .progressbar .li.active - .li:after{
     background: #3aac5d;
    }
    .progressbar .li.active - .li:before{
    border-color: #3aac5d;
    background: #3aac5d;
    color: white
    }
    .progressbar .li:first-child:after{
     content: none;
    }
        </style>
<div class="row breadcrumb" style="margin-bottom: 100px;">
    
    <div class="col-lg">
        <div class="card" >
            @include('admin.messages')
            <div class="card-header">
                  <div class="card card-body">

                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">FICHE D’EVALUATION DES DOMMAGES</h5>
                 </div>
                 {{-- <div class="modal-body"> --}}
                         {{-- <div style="text-align:center"  >
                            <div class="row"  class="btn-group btn-group-toggle" data-toggle="buttons" style="text-align: center" width="100%">
                                class="col-2"
                                <div>
                                    <h6 id="b1" class="btn active form-control mb-2" onclick="afficherstep1(this)">1-IDENTIFICATION  CONSTRUCTION</h6> 
                                </div>
                                <div>
                                    <h6 id="b2" class="btn active form-control mb-2" onclick="afficherstep2(this)">2-DESCRIPTION SOMMAIRE</h6>
                                </div>
                                <div>
                                    <h6 id="b3" class="btn active form-control mb-2" onclick="afficherstep3(this)">3-FONDATIONS INFRASTRUCTURE</h6> 
                                </div>
                                <div>
                                    <h6 id="b4" class="btn active form-control" onclick="afficherstep4(this)">4-STRUCTURE RESISTANTE</h6>
                                </div>
                                <div>
                                    <h6 id="b5" class="btn active form-control" onclick="afficherstep5(this)">5-ELEMENTS SECONDAIRES</h6>
                                </div>
                                <div>
                                    <h6 id="b6" class="btn active form-control" onclick="afficherstep6(this)">6-AUTRE.</h6>
                                </div>
                                
                               
                                
                                
                                
                                
                            </div>
                        </div> --}}

                        <div class="root">
                            <div class="container">
                                 <ul class="progressbar ul">
                                   <li class="li active" id="b1" onclick="afficherstep1(this)">1-IDENTIFICATION  CONSTRUCTION</li>
                                   <li class="li" id="b2" onclick="afficherstep2(this)">2-DESCRIPTION SOMMAIRE</li>
                                   <li class="li" id="b3" onclick="afficherstep3(this)">3-FONDATIONS INFRASTRUCTURE</li>
                                   <li class="li" id="b4" onclick="afficherstep4(this)">4-STRUCTURE RESISTANTE</li>
                                   <li class="li" id="b5" onclick="afficherstep5(this)">5-ELEMENTS SECONDAIRES</li>
                                   <li class="li" id="b6" onclick="afficherstep6(this)">6-AUTRE</li>
                                 </ul>
                             </div>
                         </div>
						 <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"></h5>
						</div>

                       

                         <div>
                           
                             
                            
                             <div id="step-1" style="display: block">
                                <div style="text-align:center" ><a href="#step-1" ><br /><h4  class="btn active">IDENTIFICATION CONSTRUCTION</h4> <br><br></a>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-3">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">code inspecteur</span>
                                         </label>{{-- cod_inp_a ou cod_inp_b ????? --}}
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->cod_inp_a  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-3">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">date</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->date_creat  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     <div class="form-group col-3">
                                        <label class="form-control-label"> {{-- .orgn_insp viiiiiiiiiiiiiiiiiiiiiiide --}}
                                            {{-- .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont --}}
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
                                        </label>{{--cle etrangere avec la table zone pour affichier zonethis         table zone vide pour le moment--}}
                                        <input type="text"  name="elevation" value="{{ $ficheevaluatthision->fk_zone  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                                        <input type="text"  name="code_c" value="{{ $ficheevaluatthision->const_clc  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                            @error('code_c')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                
                                    <div class="form-group col-3">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">Construction controle</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluatthision->const_cont  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                                        <input type="text"  name="elevation" value="{{ $ficheevaluatthision->usage  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>
                               

                               
                                <div id="map">
                                    <div >
                                        <iframe style="border: none;" height="400" width="100%" src="http://192.168.112.2:8080/mapstore/embedded.html?forceDrawer=true#/2?center=4.853399166807979,36.564668077471445&zoom=10"></iframe>
                      
                                    </div>
                                </div>
                             </div>
                             <div id="step-2" style="display: none">
                                <div style="text-align:center" ><a href="#step-2"><br /><h4 class="btn active">DESCRIPTION SOMMAIRE</h4> <br><br></a>
                                </div>


                                <div class="form-row">

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Age approximatif :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->age_app  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Nombre de niveaux :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->nb_niv  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Nombre de joints de dilatation -en elevation:</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->nb_join_in  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
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
                                        <input type="text"  name="elevation" value="{{ $ficheevaluatthision->nb_join_el  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Vide sanitaire</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->v_san  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Sous-sol</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->sou_sol  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->elem_ext_e  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Element exterieurs Indepandants Auvent</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->elem_ext_a  }}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->elem_ext_e  }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>

                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Element exterieurs Indepandants Auvent</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->elem_ext_p}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->faille}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Probleme de sol autour de la construction -Liquefaction :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->liquefa}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->affaisse_s}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Probleme de sol autour de la construction -Glissement :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->gliss}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 </div>
                             </div>
                              
							 <div id="step-3" style="display: none" class="">
                                <div style="text-align:center" ><a href="#step-3"><br /><h4 class="btn active">FONDATIONS INFRASTRUCTURE</h4> <br><br></a>
                                </div>
                                <p class="font-weight-bold">Fondations </p>

                                    <div class="form-group ">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">Type de fondation</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->fond_type}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                  <h6 class="font-weight-bold">Type de dommages</h6>
                                  <div class="form-row">

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">tassement uniforme</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->fon_dom_ta}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">glissement</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->fon_dom_gl}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     <div class="form-group col-4">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">Basculement</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluatthision->fon_dom_bs}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>

                                <p class="font-weight-bold"> Infrastructure (dans le cas VS ou S/Sol) </p>
                                   
                                    <div class="form-row">

                                        <div class="form-group col-6">
                                             <label class="form-control-label">
                                                 <span class="form-control-label" id="basic-addon1">voile beton continu :</span>
                                             </label>
                                             <input type="text"  name="code_c" value="{{ $ficheevaluatthision->infr_voil}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                                 @error('code_c')
                                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                 @enderror    
                                         </div>
                                     
                                         <div class="form-group col-6">
                                             <label class="form-control-label">
                                                 <span class="form-control-label" id="basic-addon1">poteaux beton avec remplissage</span>
                                             </label>
                                             <input type="text"  name="elevation" value="{{ $ficheevaluatthision->infr_po_re}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                                 @error('elevation')
                                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                 @enderror    
                                         </div>
                                     </div>
                             </div>                           
							   <div id="step-4" style="display: none" class="">
                                <div style="text-align:center" ><a href="#step-4"><br /><h4 class="btn active">STRUCTURE RESISTANTE</h4> <br><br></a>
                                </div>
                                <p class="font-weight-bold"> Elément porteur (charges verticales) </p>
                                   
                                
                                <div class="form-row">

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">murs en marçonnerie :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->str_e_p_m}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">voile beton :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->str_e_p_vb}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">poteau beton :</span>
                                         </label>{{-- .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont viiiiiiiiiiiiiiiiiiiiiiide --}}
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->val_in_a }}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">poteau metaliques :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->str_e_p_mt}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">poteau bois :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->str_e_p_b}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">autre :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->str_e_p_au}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 </div>
                                
                                 <p class="font-weight-bold"> Elément de contreventement </p>
                                    
                                 <div class="form-row" >

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">murs en marçonnerie :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_ctv_m_m}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">voile beton :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_ctv_v_b}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">portique beton arme :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_ctv_p_b}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">poteau metaliques :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_ctv_p_m}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 

                                    <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">palees triangulees :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_ctv_pa_}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-2">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">autre :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_ctv_au}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 </div>
                                
                                 <p class="font-weight-bold"> Planchers-toiture terrasse </p>
                                 <div class="form-row" >

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">beton arme :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->plan_tr__1}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">silive metaliques :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->plan_tr_s_}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     <div class="form-group col-4">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">solive bois :</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluatthision->plan_tr_b}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>   
                                 
                                 <p class="font-weight-bold"> Toiture inclinée </p>

                                 <div class="form-row">

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">charpente metalique :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->t_in_c_m}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">charpente bois :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->t_in_c_b}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     
                                 

                                    <div class="form-group col-4">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">couverture tuile :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->t_in_cv_t}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
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
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->t_in_cv_am}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>

                                     <div class="form-group col-6">
                                        <label class="form-control-label">
                                            <span class="form-control-label" id="basic-addon1">couverture metalique :</span>
                                        </label>
                                        <input type="text"  name="elevation" value="{{ $ficheevaluatthision->t_in_cv_me}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                            @error('elevation')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                            @enderror    
                                    </div>
                                 </div>   

                             </div> 
                             <div id="step-5" style="display: none" class="">
                                <div style="text-align:center" ><a href="#step-5"><br /><h4 class="btn active">ELEMENTS SECONDAIRES</h4><br> <br></a>
                               </div>
                                <p class="font-weight-bold"> Escaliers <p>


                                    <div class="form-row">

                                        <div class="form-group col-4">
                                             <label class="form-control-label">
                                                 <span class="form-control-label" id="basic-addon1">beton :</span>
                                             </label>
                                             <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_s_es_be}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                                 @error('code_c')
                                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                 @enderror    
                                         </div>
                                     
                                         <div class="form-group col-4">
                                             <label class="form-control-label">
                                                 <span class="form-control-label" id="basic-addon1">metal :</span>
                                             </label>
                                             <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_es_m}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                                 @error('elevation')
                                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                 @enderror    
                                         </div>
                                         <div class="form-group col-4">
                                            <label class="form-control-label">
                                                <span class="form-control-label" id="basic-addon1">bois :</span>
                                            </label>
                                            <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_es_b}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                                @error('elevation')
                                                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                                @enderror    
                                        </div>
                                         
                                     </div>   

                                    
                             <p class="font-weight-bold"> Remplissage Extérieur </p>
                             
                             <div class="form-row">

                                <div class="form-group col-3">
                                     <label class="form-control-label">
                                         <span class="form-control-label" id="basic-addon1">marçonnerie :</span>
                                     </label>
                                     <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_s_r_m}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                         @error('code_c')
                                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                         @enderror    
                                 </div>
                             
                                 <div class="form-group col-3">
                                     <label class="form-control-label">
                                         <span class="form-control-label" id="basic-addon1">beton prefabrique :</span>
                                     </label>
                                     <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_r_bt}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                         @error('elevation')
                                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                         @enderror    
                                 </div>
                                
                                 
                            

                                <div class="form-group col-3">
                                     <label class="form-control-label">
                                         <span class="form-control-label" id="basic-addon1">bardages :</span>
                                     </label>
                                     <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_s_r_ba}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                         @error('code_c')
                                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                         @enderror    
                                 </div>
                             
                                 <div class="form-group col-3">
                                     <label class="form-control-label">
                                         <span class="form-control-label" id="basic-addon1">autre :</span>
                                     </label>
                                     <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_r_au}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                         @error('elevation')
                                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                         @enderror    
                                 </div>
                                
                                 
                             </div>   
                             
                     <p class="font-weight-bold"> Autres Eléments Intérieurs </p>
                     
                     <div class="form-row">

                        <div class="form-group col-4">
                             <label class="form-control-label">
                                 <span class="form-control-label" id="basic-addon1">plafonds :</span>
                             </label>
                             <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_s_in_p}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                 @error('code_c')
                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                 @enderror    
                         </div>
                     
                         <div class="form-group col-4">
                             <label class="form-control-label">
                                 <span class="form-control-label" id="basic-addon1">cloisons :</span>
                             </label>
                             <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_in_c}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                 @error('elevation')
                                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                 @enderror    
                         </div>
                         <div class="form-group col-4">
                            <label class="form-control-label">
                                <span class="form-control-label" id="basic-addon1">elements vitres :</span>
                            </label>
                            <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_in_v}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                @error('elevation')
                                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror    
                        </div>
                         
                     </div>   
                     
             <p class="font-weight-bold"> Eléments Extérieurs </p>
             <div class="form-row">

                <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">balcons :</span>
                     </label>
                     <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_s_ex_b}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                         @error('code_c')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
             
                 <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">garde- corps :</span>
                     </label>
                     <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_ex_ga}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                         @error('elevation')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
                 
                 
            

                <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">auvent :</span>
                     </label>
                     <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_s_ex_av}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                         @error('code_c')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
             
                 <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">Acrotères – Corniches :</span>
                     </label>
                     <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_ex_ac}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                         @error('elevation')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
                 
                 
            

                <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">Cheminées :</span>
                     </label>
                     <input type="text"  name="code_c" value="{{ $ficheevaluatthision->el_s_ex_ch}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                         @error('code_c')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
             
                 <div class="form-group col-2">
                     <label class="form-control-label">
                         <span class="form-control-label" id="basic-addon1">Autre :</span>
                     </label>
                     <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_ex_au}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                         @error('elevation')
                         <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                         @enderror    
                 </div>
                 
                 
             </div>   
             
             

                            </div>
                            <div id="step-6" style="display: none" class="">
                                <div style="text-align:center" ><a href="#step-6"><br /><h4 class="btn active">AUTRE</h4> <br><br></a>
                                </div>

                                    <p class="font-weight-bold"> INFLUENCE DES CONSTRUCTIONS ADJACENTES </p>
                                <div class="form-row">

                                    <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">La consturction menace une autre construction :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->if_c_a_m_c}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">la construction est menacee par une autre construction :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->if_c_a_emc}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     
									</div>
									<div class="form-row">


                                

                                    <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">la construction peut etre soutien par une autre construction :</span>
                                         </label>
                                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->if_c_a_spc}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                             @error('code_c')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                 
                                     <div class="form-group col-6">
                                         <label class="form-control-label">
                                             <span class="form-control-label" id="basic-addon1">la construction peut etre soutenue part une autre construction :</span>
                                         </label>
                                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->el_s_ex_av}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                             @error('elevation')
                                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                             @enderror    
                                     </div>
                                     
                                     
                                 </div>   
                            

<p class="font-weight-bold">VICTIMES</p>

<div class="form-row">

    <div class="form-group col-6">
         <label class="form-control-label">
             <span class="form-control-label" id="basic-addon1">victimes :</span>
         </label>
         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->victime}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
             @error('code_c')
             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
             @enderror    
     </div>
 
     <div class="form-group col-6">
         <label class="form-control-label">
             <span class="form-control-label" id="basic-addon1">nombre des victimes :</span>
         </label>
         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->nb_victime}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                                 <input type="text"  name="code_c" value="{{ $ficheevaluatthision->com_st_sp}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                     @error('code_c')
                                     <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                     @enderror    
                             </div>
                         
                             <div class="form-group col-4">
                                 <label class="form-control-label">
                                     <span class="form-control-label" id="basic-addon1">regularite en elevation :</span>
                                 </label>
                                 <input type="text"  name="elevation" value="{{ $ficheevaluatthision->com_st_re}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                     @error('elevation')
                                     <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                     @enderror    
                             </div>
                             <div class="form-group col-4">
                                <label class="form-control-label">
                                    <span class="form-control-label" id="basic-addon1">redondances des files :</span>
                                </label>
                                <input type="text"  name="elevation" value="{{ $ficheevaluatthision->com_st_rf}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                                    @error('elevation')
                                    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror    
                            </div>
                             
                             
                         </div>   
                           
                 <p class="font-weight-bold">
                           Sens Longitudinal
                 </p>
                 <div class="form-row">

                    <div class="form-group col-4">
                         <label class="form-control-label">
                             <span class="form-control-label" id="basic-addon1">symetrie en plan :</span>
                         </label>
                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->com_st_sp}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                             @error('code_c')
                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                             @enderror    
                     </div>
                 
                     <div class="form-group col-4">
                         <label class="form-control-label">
                             <span class="form-control-label" id="basic-addon1">regularite en elevation :</span>
                         </label>
                         <input type="text"  name="elevation" value="{{ $ficheevaluatthision->com_st_re}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
                             @error('elevation')
                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                             @enderror    
                     </div>
                     <div class="form-group col-4">
                        <label class="form-control-label">
                            <span class="form-control-label" id="basic-addon1">redondances des files :</span>
                        </label>
                        <input type="text"  name="elevation" value="{{ $ficheevaluatthision->com_st_rf}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                         <input type="text"  name="code_c" value="{{ $ficheevaluatthision->autre_com}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                             @error('code_c')
                             <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                             @enderror    
                     </div>  
                           
                        <p>EVALUATION FINAL</p>
                        <div class="form-row">

                            <div class="form-group col-6">
                                 <label class="form-control-label">
                                     <span class="form-control-label" id="basic-addon1">Niveau general des dommages :</span>
                                 </label>
                                 <input type="text"  name="code_c" value="{{ $ficheevaluatthision->evl_glb_as}}" id="code_c" class="form-control {{$errors->has('code_c')? 'is-invalid' :''}}"  aria-label="code_c" aria-describedby="basic-addon1" readonly>
                                     @error('code_c')
                                     <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                                     @enderror    
                             </div>
                         
                             <div class="form-group col-6">
                                 <label class="form-control-label">
                                     <span class="form-control-label" id="basic-addon1">couleur a utiliser :</span>
                                 </label>
                                 <input type="text"  name="elevation" value="{{ $ficheevaluatthision->evl_fin_gd}}" id="elevation" class="form-control {{$errors->has('elevation')? 'is-invalid' :''}}"  readonly aria-label="elevation" aria-describedby="basic-addon1">
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
                     </div>
                 </div>
             </div>



<script>
			 function afficherstep1(e) {
				var step1 = document.getElementById("step-1");
				var step2 = document.getElementById("step-2");	
				var step3 = document.getElementById("step-3");
				var step4 = document.getElementById("step-4");
				var step5 = document.getElementById("step-5");
				var step6 = document.getElementById("step-6");	

                var id1 = document.getElementById("b1");
				var id2 = document.getElementById("b2");	
				var id3 = document.getElementById("b3");
				var id4 = document.getElementById("b4");
				var id5 = document.getElementById("b5");
				var id6 = document.getElementById("b6");			
				
					step1.style.display = "block";
					step2.style.display = "none";
					step3.style.display = "none";
					step4.style.display = "none";
					step5.style.display = "none";
					step6.style.display = "none";

                    e.classList.remove("active");
                    id2.classList.remove("active");
                    id3.classList.remove("active");
                    id4.classList.remove("active");
                    id5.classList.remove("active");
                    id6.classList.remove("active");

                    e.classList.remove("active");
                    id2.classList.remove("active");
                    id3.classList.remove("active");
                    id4.classList.remove("active");
                    id5.classList.remove("active");
                    id6.classList.remove("active");


                    e.classList.add("active");
                    // id2.classList.add("active")
                    // id3.classList.add("active")
                    // id4.classList.add("active")
                    // id5.classList.add("active")
                    // id6.classList.add("active")


			  }
			  function afficherstep2(e) {
				var step1 = document.getElementById("step-1");
				var step2 = document.getElementById("step-2");	
				var step3 = document.getElementById("step-3");
				var step4 = document.getElementById("step-4");
				var step5 = document.getElementById("step-5");
				var step6 = document.getElementById("step-6");

                var id1 = document.getElementById("b1");
				var id2 = document.getElementById("b2");	
				var id3 = document.getElementById("b3");
				var id4 = document.getElementById("b4");
				var id5 = document.getElementById("b5");
				var id6 = document.getElementById("b6");				
				
				
					
					step1.style.display = "none";
					step2.style.display = "block";
					step3.style.display = "none";
					step4.style.display = "none";
					step5.style.display = "none";
					step6.style.display = "none";



                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id3.classList.remove("active");
                    id4.classList.remove("active");
                    id5.classList.remove("active");
                    id6.classList.remove("active");

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id3.classList.remove("active");
                    id4.classList.remove("active");
                    id5.classList.remove("active");
                    id6.classList.remove("active");


                    e.classList.add("active");
                    // id1.classList.add("active")
                    // id3.classList.add("active")
                    // id4.classList.add("active")
                    // id5.classList.add("active")
                    // id6.classList.add("active")



			  }
			  function afficherstep3(e) {
				var step1 = document.getElementById("step-1");
				var step2 = document.getElementById("step-2");	
				var step3 = document.getElementById("step-3");
				var step4 = document.getElementById("step-4");
				var step5 = document.getElementById("step-5");
				var step6 = document.getElementById("step-6");	

                var id1 = document.getElementById("b1");
				var id2 = document.getElementById("b2");	
				var id3 = document.getElementById("b3");
				var id4 = document.getElementById("b4");
				var id5 = document.getElementById("b5");
				var id6 = document.getElementById("b6");			
				
				
					
					step1.style.display = "none";
					step2.style.display = "none";
					step3.style.display = "block";
					step4.style.display = "none";
					step5.style.display = "none";
					step6.style.display = "none";

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id2.classList.remove("active");
                    id4.classList.remove("active");
                    id5.classList.remove("active");
                    id6.classList.remove("active");

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id2.classList.remove("active");
                    id4.classList.remove("active");
                    id5.classList.remove("active");
                    id6.classList.remove("active");


                    e.classList.add("active");
                    // id1.classList.add("active")
                    // id2.classList.add("active")
                    // id4.classList.add("active")
                    // id5.classList.add("active")
                    // id6.classList.add("active")

			  }
			  function afficherstep4(e) {
				var step1 = document.getElementById("step-1");
				var step2 = document.getElementById("step-2");	
				var step3 = document.getElementById("step-3");
				var step4 = document.getElementById("step-4");
				var step5 = document.getElementById("step-5");
				var step6 = document.getElementById("step-6");

                var id1 = document.getElementById("b1");
				var id2 = document.getElementById("b2");	
				var id3 = document.getElementById("b3");
				var id4 = document.getElementById("b4");
				var id5 = document.getElementById("b5");
				var id6 = document.getElementById("b6");				
				
				
					
					step1.style.display = "none";
					step2.style.display = "none";
					step3.style.display = "none";
					step4.style.display = "block";
					step5.style.display = "none";
					step6.style.display = "none";

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id3.classList.remove("active");
                    id2.classList.remove("active");
                    id5.classList.remove("active");
                    id6.classList.remove("active");

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id3.classList.remove("active");
                    id2.classList.remove("active");
                    id5.classList.remove("active");
                    id6.classList.remove("active");


                    e.classList.add("active");
                    // id1.classList.add("active")
                    // id3.classList.add("active")
                    // id2.classList.add("active")
                    // id5.classList.add("active")
                    // id6.classList.add("active")

			  }
			  function afficherstep5(e) {
				var step1 = document.getElementById("step-1");
				var step2 = document.getElementById("step-2");	
				var step3 = document.getElementById("step-3");
				var step4 = document.getElementById("step-4");
				var step5 = document.getElementById("step-5");
				var step6 = document.getElementById("step-6");			
				
                var id1 = document.getElementById("b1");
				var id2 = document.getElementById("b2");	
				var id3 = document.getElementById("b3");
				var id4 = document.getElementById("b4");
				var id5 = document.getElementById("b5");
				var id6 = document.getElementById("b6");	
				
					
					step1.style.display = "none";
					step2.style.display = "none";
					step3.style.display = "none";
					step4.style.display = "none";
					step5.style.display = "block";
					step6.style.display = "none";

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id3.classList.remove("active");
                    id4.classList.remove("active");
                    id2.classList.remove("active");
                    id6.classList.remove("active");

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id3.classList.remove("active");
                    id4.classList.remove("active");
                    id2.classList.remove("active");
                    id6.classList.remove("active");


                    e.classList.add("active");
                    // id1.classList.add("active")
                    // id3.classList.add("active")
                    // id4.classList.add("active")
                    // id2.classList.add("active")
                    // id6.classList.add("active")

			  }
			  function afficherstep6(e) {
				var step1 = document.getElementById("step-1");
				var step2 = document.getElementById("step-2");	
				var step3 = document.getElementById("step-3");
				var step4 = document.getElementById("step-4");
				var step5 = document.getElementById("step-5");
				var step6 = document.getElementById("step-6");			
				
                var id1 = document.getElementById("b1");
				var id2 = document.getElementById("b2");	
				var id3 = document.getElementById("b3");
				var id4 = document.getElementById("b4");
				var id5 = document.getElementById("b5");
				var id6 = document.getElementById("b6");	
				
					
					step1.style.display = "none";
					step2.style.display = "none";
					step3.style.display = "none";
					step4.style.display = "none";
					step5.style.display = "none";
					step6.style.display = "block";

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id3.classList.remove("active");
                    id4.classList.remove("active");
                    id5.classList.remove("active");
                    id2.classList.remove("active");

                    e.classList.remove("active");
                    id1.classList.remove("active");
                    id3.classList.remove("active");
                    id4.classList.remove("active");
                    id5.classList.remove("active");
                    id2.classList.remove("active");


                    e.classList.add("active");
                    // id1.classList.add("active")
                    // id3.classList.add("active")
                    // id4.classList.add("active")
                    // id5.classList.add("active")
                    // id2.classList.add("active")

			  }
				 
 </script>

@endsection


