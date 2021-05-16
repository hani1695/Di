
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
    <div class="row card" style="margin-bottom: 100px;">
{{----------------------------------------------------------------------------}}
        <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0" style="text-align:center">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    ELEMENT DE GROUPE ..... #1
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" >
                <div class="card-body">
                  <table class="table table-bordered" >
                    <thead>
                      <tr>                          
                        <th colspan="2" style="text-align:center">element de groupe ....</th>
                       
                    </tr>
                  </thead>
                    <tbody>
                        {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                            <tr> 
                              {{-- cod_inp_a ou cod_inp_b ????? --}}
                                <td style="text-align:center; width: 50%;">code inspecteur</td><td style="text-align:center">{{ $ficheevaluation->cod_inp_a  }} </td> 
                              </tr> 
                              <tr> 
                                <td style="text-align:center">date</td><td style="text-align:center">{{ $ficheevaluation->date_creat  }}</td>
                              </tr> 
                              <tr> 
                                {{-- .code_cont viiiiiiiiiiiiiiiiiiiiiiide--}}
                                <td style="text-align:center">Identification de la construction</td><td style="text-align:center"> </td>
                            </tr> 
                            <tr> 
                              {{-- .orgn_insp viiiiiiiiiiiiiiiiiiiiiiide --}}
                              <td style="text-align:center">Secteur</td> <td style="text-align:center"> </td>
                            </tr> 
                            <tr> 
                              <td style="text-align:center">zone</td><td style="text-align:center">{{ $ficheevaluation->fk_zone  }}</td>{{--cle etrangere avec la table zone pour affichier zone--}}
                            </tr> 
                            <tr>                       
                                 {{-- .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont viiiiiiiiiiiiiiiiiiiiiiide --}}
                              <td style="text-align:center">Adresse ou elements d'identification</td><td style="text-align:center"> </td>
                            </tr> 
                            <tr> 
                              <td style="text-align:center">Construction calculee au seisme</td><td style="text-align:center">{{ $ficheevaluation->const_clc  }}</td>
                            </tr> 
                        <tr> 
                          <td style="text-align:center">Construction controle</td><td style="text-align:center">{{ $ficheevaluation->const_cont  }} </td>
                      </tr> 
                        {{-- @endforeach --}}
                    </tbody>
                </table>
                <div >
                  <iframe style="border: none;" height="500" width="100%" src="http://192.168.112.2:8080/mapstore/embedded.html?forceDrawer=true#/2?center=4.853399166807979,36.564668077471445&zoom=10"></iframe>

              </div>
                </div>
              </div>
            </div>

{{----------------------------------------------------------------------------}}
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0" style="text-align:center">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    USAGE DE LA CONSTRUCTION #2
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" >
                <div class="card-body">
                 

                  <table class="table table-bordered">
                    <thead>
                      <tr>                          
                          <th colspan="2" style="text-align:center">usage de la construction</th>
                         
                      </tr>
                  </thead>
                    <tbody>
                        {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                            <tr> 
                                <td style="text-align:center ; width: 50%;">usage</td> <td style="text-align:center">{{ $ficheevaluation->usage  }}</td> 
                              </tr> 
                        {{-- @endforeach --}}
                    </tbody>
                </table>




                </div>
              </div>
            </div>
{{----------------------------------------------------------------------------}}
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0" style="text-align:center">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    DISCRIPTION SOMMAIRE #3
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" >
                <div class="card-body">
                 


                  <table class="table table-bordered">
                    <thead>
                      <tr>                          
                        <th colspan="2" style="text-align:center">descroption sommaire</th>
                    </tr>
                  </thead>
                    <tbody>
                        {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                            <tr> 
                                <td style="text-align:center; width: 50%;">Age approximatif :</td> <td style="text-align:center">{{ $ficheevaluation->age_app  }}</td>
                                
                              </tr> 
                              <tr> 
                                <td style="text-align:center">Nombre de niveaux :</td> <td style="text-align:center">{{ $ficheevaluation->nb_niv  }}</td>
                                
                              </tr> 
                              <tr> 
                                <td style="text-align:center">Nombre de joints de dilatation -en elevation:</td><td style="text-align:center">{{ $ficheevaluation->nb_join_el  }}</td>
                              </tr> 
                              <tr> 
                                <td style="text-align:center">Nombre de joints de dilatation - Infrastructure</td><td style="text-align:center">{{ $ficheevaluation->nb_join_in  }}</td>
                              </tr> 
                              <tr> 
                                <td style="text-align:center ; width: 50%;">Vide sanitaire</td> <td style="text-align:center">{{ $ficheevaluation->v_san  }}</td>
                            </tr> 
                            <tr> 
                              <td style="text-align:center">Sous-sol</td><td style="text-align:center">{{ $ficheevaluation->sou_sol  }}</td>
                          </tr> 
                            <tr> 
                              <td style="text-align:center">Element exterieurs Indepandants Escaliers</td> <td style="text-align:center">{{ $ficheevaluation->elem_ext_e  }}</td>
                          </tr> 
                          <tr> 
                            <td style="text-align:center">Element exterieurs Indepandants Auvent</td> <td style="text-align:center">{{ $ficheevaluation->elem_ext_a  }}</td>
                          </tr> 
                          <tr> 
                            <td style="text-align:center">Element exterieurs Indepandants Passage Couvert</td> <td style="text-align:center">{{ $ficheevaluation->elem_ext_p}}</td>
                        </tr> 
                        {{-- @endforeach --}}
                    </tbody>
                </table>
                <table class="table table-bordered">
                  <thead>
                    <tr>                          
                      <th colspan="2" style="text-align:center">Probleme de sol autour de la construction</th>
                  </tr>
                    
                </thead>
                  <tbody>
                      {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                          <tr> 
                            {{-- Probleme de sol autour de la construction            titre peut etre --}}
                              <td style="text-align:center; width: 50%;">Faille :</td> <td style="text-align:center">{{ $ficheevaluation->faille}}</td>
                              
                            </tr> 
                            <tr> 
                                <td style="text-align:center">Liquefaction :</td> <td style="text-align:center">{{ $ficheevaluation->liquefa}}</td>
                                
                              </tr> 
                            <tr> 
                              <td style="text-align:center">Affaissement</td><td style="text-align:center">{{ $ficheevaluation->affaisse_s}}</td>
                            </tr> 
                            <tr> 
                              <td style="text-align:center">Glissement</td> <td style="text-align:center">{{ $ficheevaluation->gliss}}</td>
                            </tr> 
                            <tr> 
                              {{-- .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont viiiiiiiiiiiiiiiiiiiiiiide --}}
                              <td style="text-align:center">soulevement</td><td style="text-align:center"></td>
                          </tr> 
                      {{-- @endforeach --}}
                  </tbody>
              </table>











                </div>
              </div>
            </div>
          </div>
{{----------------------------------------------------------------------------}}


{{----------------------------------------------------------------------------}}
<div id="accordion">
  <div class="card">
    <div class="card-header" id="heading4">
      <h5 class="mb-0" style="text-align:center">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
          FONDATIONS- INFRASTRUCTURE #4
        </button>
      </h5>
    </div>
    <div id="collapse4" class="collapse" aria-labelledby="heading4" >
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>                          
              <th colspan="4" style="text-align:center">Fondations</th>
          </tr>
            
        </thead>
          <tbody>
              {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                  <tr> 
                      <td style="text-align:center; width: 50%;">Type de fondation</td><td style="text-align:center">{{ $ficheevaluation->fond_type}}</td> 
                    </tr> 
                    <tr>      
                             {{-- .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont viiiiiiiiiiiiiiiiiiiiiiide --}}
                      <td style="text-align:center">Type de dommages</td><td style="text-align:center"></td>
                    </tr> 
                    <tr> 
                      <td style="text-align:center">tassement uniforme</td><td style="text-align:center">{{ $ficheevaluation->fon_dom_ta}}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">glissement</td> <td style="text-align:center">{{ $ficheevaluation->fon_dom_gl}}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">Basculement</td><td style="text-align:center">{{ $ficheevaluation->fon_dom_bs}}</td>
                  </tr> 
              {{-- @endforeach --}}
          </tbody>
      </table>

      <table class="table table-bordered">
        <thead>
          <tr>                          
            <th colspan="2" style="text-align:center">Infrastructure</th>
        </tr>
          
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                <tr> 
                    <td style="text-align:center ; width: 50%;">voile beton continu :</td><td style="text-align:center">{{ $ficheevaluation->infr_voil}}</td> 
                  </tr> 
                  <tr> 
                    <td style="text-align:center">poteaux beton avec remplissage</td> <td style="text-align:center">{{ $ficheevaluation->infr_po_re}}</td>
                  </tr> 
                  
            {{-- @endforeach --}}
        </tbody>
    </table>


      </div>
    </div>
  </div>

{{----------------------------------------------------------------------------}}
  <div class="card">
    <div class="card-header" id="heading5">
      <h5 class="mb-0" style="text-align:center">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
          STRUCTURE RESISTANTE #5
        </button>
      </h5>
    </div>
    <div id="collapse5" class="collapse" aria-labelledby="heading5" >
      <div class="card-body">
       

        <table class="table table-bordered">
          <thead>
            <tr>                          
              <th colspan="2" style="text-align:center">Element porteurs</th>
          </tr>
           
        </thead>
          <tbody>
              {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                  <tr> 
                      <td style="text-align:center; width: 50%;">murs en marçonnerie</td> <td style="text-align:center">{{ $ficheevaluation->str_e_p_m}}</td>
                      
                    </tr> 
                    <tr> 
                      <td style="text-align:center">voile beton</td><td style="text-align:center">{{ $ficheevaluation->str_e_p_vb}}</td>
                    </tr> 
                    <tr>         
                      {{-- .val_in_a   .val_in_b   .code_val .valid  .modif_us .qgs_fid  .orgn_insp  .code_cont viiiiiiiiiiiiiiiiiiiiiiide --}}
                      <td style="text-align:center">poteau beton</td><td style="text-align:center">{{ $ficheevaluation->val_in_a }}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">poteau metaliques</td> <td style="text-align:center">{{ $ficheevaluation->str_e_p_mt}}</td>
                    
                  </tr> 
                  <tr> 
                    <td style="text-align:center">poteau bois</td> <td style="text-align:center">{{ $ficheevaluation->str_e_p_b}}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">autre</td> <td style="text-align:center">{{ $ficheevaluation->str_e_p_au}}</td>
                </tr> 
              {{-- @endforeach --}}
          </tbody>
      </table>

      <table class="table table-bordered">
        <thead>
          <tr>                          
            <th colspan="2" style="text-align:center">Element de contreventement</th>
        </tr>
          
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
            <tr> 
              <td style="text-align:center; width: 50%;">murs en marçonnerie</td> <td style="text-align:center">{{ $ficheevaluation->el_ctv_m_m}}</td>
              
            </tr> 
            <tr> 
              <td style="text-align:center">voile beton</td><td style="text-align:center">{{ $ficheevaluation->el_ctv_v_b}}</td>
            </tr> 
            <tr> 
              <td style="text-align:center">portique beton arme </td><td style="text-align:center">{{ $ficheevaluation->el_ctv_p_b}}</td>
          </tr> 
          <tr> 
            <td style="text-align:center">portique metaliques</td> <td style="text-align:center">{{ $ficheevaluation->el_ctv_p_m}}</td>
            
          </tr> 
          <tr> 
            <td style="text-align:center">palees triangulees</td> <td style="text-align:center">{{ $ficheevaluation->el_ctv_pa_}}</td>
          </tr> 
          <tr> 
            <td style="text-align:center">autre</td> <td style="text-align:center">{{ $ficheevaluation->el_ctv_au}}</td>
        </tr> 
            {{-- @endforeach --}}
        </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>                          
          <th colspan="2" style="text-align:center">plachers -toiture terrasse</th>
      </tr>
        
    </thead>
      <tbody>
          {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
              <tr> 
                  <td style="text-align:center ; width: 50%;">beton arme</td> <td style="text-align:center">{{ $ficheevaluation->plan_tr__1}}</td>{{------ attribut non --}}
                </tr> 
                <tr> 
                  <td style="text-align:center">silive metaliques</td><td style="text-align:center">{{ $ficheevaluation->plan_tr_s_}}</td>
                </tr> 
                <tr> 
                  <td style="text-align:center">solive bois</td><td style="text-align:center">{{ $ficheevaluation->plan_tr_b}}</td>
                  
              </tr> 
          {{-- @endforeach --}}
      </tbody>
  </table>


  <table class="table table-bordered">
    <thead>
      <tr>                          
        <th colspan="2" style="text-align:center">Toiture inclinee</th>
    </tr>
  </thead>
    <tbody>
        {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
            <tr> 
                <td style="text-align:center; width: 50%;">charpente metalique</td> <td style="text-align:center">{{ $ficheevaluation->t_in_c_m}}</td> 
              </tr> 
              <tr> 
                <td style="text-align:center">charpente bois</td><td style="text-align:center">{{ $ficheevaluation->t_in_c_b}}</td>
              </tr> 
              <tr> 
                <td style="text-align:center">couverture tuile</td><td style="text-align:center">{{ $ficheevaluation->t_in_cv_t}}</td>
            </tr> 
            <tr> 
              <td style="text-align:center">couverture aminate ciment</td> <td style="text-align:center">{{ $ficheevaluation->t_in_cv_am}}</td>
              
            </tr> 
            <tr> 
              <td style="text-align:center">couverture metalique</td> <td style="text-align:center">{{ $ficheevaluation->t_in_cv_me}}</td>
            </tr> 
        {{-- @endforeach --}}
    </tbody>
</table>



      </div>
    </div>
  </div>
{{----------------------------------------------------------------------------}}
  <div class="card">
    <div class="card-header" id="heading6">
      <h5 class="mb-0" style="text-align:center">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
          ELEMENTS SECONDAIRES #6
        </button>
      </h5>
    </div>
    <div id="collapse6" class="collapse" aria-labelledby="heading6" >
      <div class="card-body">
       


        <table class="table table-bordered">
          <thead>
            <tr>                          
              <th colspan="2" style="text-align:center">Escaliers</th>
          </tr>

        </thead>
          <tbody>
              {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                  <tr> 
                      <td style="text-align:center; width: 50%;">beton :</td> <td style="text-align:center">{{ $ficheevaluation->el_s_es_be}}</td>                      
                    </tr> 
                    <tr> 
                      <td style="text-align:center">metal</td><td style="text-align:center">{{ $ficheevaluation->el_s_es_m}}</td>       
                   </tr> 
                    <tr> 
                      <td style="text-align:center">bois</td><td style="text-align:center">{{ $ficheevaluation->el_s_es_b}}</td>
                    </tr> 
              {{-- @endforeach --}}
          </tbody>
      </table>

      <table class="table table-bordered">
        <thead>
          <tr>                          
            <th colspan="2" style="text-align:center">Remplissages extereurs</th>
        </tr>
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                <tr> 
                    <td style="text-align:center; width: 50%;">marçonnerie</td> <td style="text-align:center">{{ $ficheevaluation->el_s_r_m}}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">beton prefabrique</td><td style="text-align:center">{{ $ficheevaluation->el_s_r_bt}}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">bardages</td> <td style="text-align:center">{{ $ficheevaluation->el_s_r_ba}}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">autre</td> <td style="text-align:center">{{ $ficheevaluation->el_s_r_au}}</td>
                  </tr> 
            {{-- @endforeach --}}
        </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>                          
          <th colspan="2" style="text-align:center">autre elements intereurs</th>
      </tr>
    </thead>
      <tbody>
          {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
              <tr> 
                  <td style="text-align:center; width: 50%;">plafonds :</td> <td style="text-align:center">{{ $ficheevaluation->el_s_in_p}}</td>                      
                </tr> 
                <tr> 
                  <td style="text-align:center">cloisons</td><td style="text-align:center">{{ $ficheevaluation->el_s_in_c}}</td>       
               </tr> 
                <tr> 
                  <td style="text-align:center">elements vitres</td><td style="text-align:center">{{ $ficheevaluation->el_s_in_v}}</td>
                </tr> 
          {{-- @endforeach --}}
      </tbody>
  </table>

  <table class="table table-bordered">
    <thead>
      <tr>                          
        <th colspan="2" style="text-align:center">Elements extereurs</th>
    </tr>
  </thead>
    <tbody>
        {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
            <tr> 
                <td style="text-align:center; width: 50%;">balcons</td> <td style="text-align:center">{{ $ficheevaluation->el_s_ex_b}}</td>
              </tr> 
              <tr> 
                <td style="text-align:center">garde- corps</td><td style="text-align:center">{{ $ficheevaluation->el_s_ex_ga}}</td>
              </tr> 
              <tr> 
                <td style="text-align:center">auvent</td><td style="text-align:center">{{ $ficheevaluation->el_s_ex_av}}</td>
              </tr> 
              <tr> 
                <td style="text-align:center">Acrotères – Corniches :</td> <td style="text-align:center">{{ $ficheevaluation->el_s_ex_ac}}</td>
              </tr> 
              <tr> 
                <td style="text-align:center">Cheminées</td> <td style="text-align:center">{{ $ficheevaluation->el_s_ex_ch}}</td>
              </tr> 
              <tr> 
                <td style="text-align:center">Autre</td> <td style="text-align:center">{{ $ficheevaluation->el_s_ex_au}}</td>
              </tr> 
        {{-- @endforeach --}}
    </tbody>
</table>








      </div>
    </div>
  </div>
</div>
{{----------------------------------------------------------------------------}}
<div class="card">
  <div class="card-header" id="heading7">
    <h5 class="mb-0" style="text-align:center">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
        INFLUENCE DES CONSTRUCTIONS ADJACENTES #7
      </button>
    </h5>
  </div>
  <div id="collapse7" class="collapse" aria-labelledby="heading7" >
    <div class="card-body">
     


      <table class="table table-bordered">
        <thead>
          <tr>                          
              <th style="text-align:center" colspan="2">influence des constructions adjacentes</th>
          </tr>
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                <tr> 
                    <td style="text-align:center; width: 50%;">La consturction menace une autre construction</td> <td style="text-align:center">{{ $ficheevaluation->if_c_a_m_c}}</td>                    
                  </tr> 
                  <tr> 
                    <td style="text-align:center">la construction est menacee par une autre construction</td><td style="text-align:center">{{ $ficheevaluation->if_c_a_emc}}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">la construction peut etre soutien par une autre construction</td><td style="text-align:center">{{ $ficheevaluation->if_c_a_spc}}</td>
                </tr> 
                <tr> 
                  <td style="text-align:center">la construction peut etre soutenue part une autre construction</td><td style="text-align:center">{{ $ficheevaluation->el_s_ex_av}}</td>
              </tr> 
            {{-- @endforeach --}}
        </tbody>
    </table>











    </div>
  </div>
</div>

{{----------------------------------------------------------------------------}}

<div class="card">
  <div class="card-header" id="heading8">
    <h5 class="mb-0" style="text-align:center">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
        VICTIMES#8
      </button>
    </h5>
  </div>
  <div id="collapse8" class="collapse" aria-labelledby="heading8" >
    <div class="card-body">
     


      <table class="table table-bordered">
        <thead>
          <tr>                          
              <th style="text-align:center" colspan="2">victimes</th>
          </tr>
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                <tr> 
                    <td style="text-align:center; width: 50%;">victimes</td> <td style="text-align:center">{{ $ficheevaluation->victime}}</td>                    
                  </tr> 
                  <tr> 
                    <td style="text-align:center">nombre des victimes</td><td style="text-align:center">{{ $ficheevaluation->nb_victime}}</td>
                  </tr> 
                  
            {{-- @endforeach --}}
        </tbody>
    </table>











    </div>
  </div>
</div>

{{----------------------------------------------------------------------------}}
<div class="card">
  <div class="card-header" id="heading9">
    <h5 class="mb-0" style="text-align:center">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
        COMMENTAIRES SUR LA NATURE ET LA CAUSE PROBABLE DES DOMMAGES #9
      </button>
    </h5>
  </div>
  <div id="collapse9" class="collapse" aria-labelledby="heading9" >
    <div class="card-body">
     


      <table class="table table-bordered">
        <thead>
          <tr>                          
            <th style="text-align:center"></th>
            <th style="text-align:center">Sens transversal</th>
            <th style="text-align:center">Sens longitudinal</th>

        </tr>        
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                <tr> 
                    <td style="text-align:center; width: 50%;">symetrie en plan</td> <td style="text-align:center">{{ $ficheevaluation->com_st_sp}}</td>    <td style="text-align:center">{{ $ficheevaluation->com_sl_sp}}</td>                 
                  </tr> 
                  <tr> 
                    <td style="text-align:center">regularite en elevation</td><td style="text-align:center">{{ $ficheevaluation->com_st_re}}</td> <td style="text-align:center">{{ $ficheevaluation->com_sl_re}}</td>
                  </tr> 
                  <tr> 
                    <td style="text-align:center">redondances des files</td><td style="text-align:center">{{ $ficheevaluation->com_st_rf}}</td> <td style="text-align:center">{{ $ficheevaluation->com_sl_rf}}</td>
                  </tr> 
                  
            {{-- @endforeach --}}
        </tbody>
    </table>











    </div>
  </div>
</div>


{{----------------------------------------------------------------------------}}
<div class="card">
  <div class="card-header" id="heading10">
    <h5 class="mb-0" style="text-align:center">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
        UATRES COMMENTAIRES #10
      </button>
    </h5>
  </div>
  <div id="collapse10" class="collapse" aria-labelledby="heading10" >
    <div class="card-body">
     

      
      <table class="table table-bordered">
        <thead>
          <tr>                          
            <th style="text-align:center">autre commentaire</th>
        </tr>        
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                <tr> 
               <td style="text-align:center">{{ $ficheevaluation->autre_com}}</td>     
                </tr>     
            {{-- @endforeach --}}
        </tbody>
    </table>
    











    </div>
  </div>
</div>



{{----------------------------------------------------------------------------}}
<div class="card">
  <div class="card-header" id="heading11">
    <h5 class="mb-0" style="text-align:center">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
        EVALUATION FINAL #11
      </button>
    </h5>
  </div>
  <div id="collapse11" class="collapse" aria-labelledby="heading11" >
    <div class="card-body">
     

      <table class="table table-bordered">
        <thead>
          <tr>                          
            <th style="text-align:center"></th>
            <th style="text-align:center">valeur</th>
        </tr>        
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                <tr> 
                    <td style="text-align:center; width: 50%;">Niveau general des dommages</td> <td style="text-align:center">{{ $ficheevaluation->evl_glb_as}}</td>                     
                  </tr> 
                  <tr> 
                    <td style="text-align:center">couleur a utiliser</td> <td style="text-align:center">{{ $ficheevaluation->evl_fin_gd}}</td>
                  </tr>    
            {{-- @endforeach --}}
        </tbody>
    </table>
     
    











    </div>
  </div>
</div>

{{----------------------------------------------------------------------------}}

<div class="card">
  <div class="card-header" id="heading12">
    <h5 class="mb-0" style="text-align:center">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
        MESURE IMMEDIATES A PRENDRE #12
      </button>
    </h5>
  </div>
  <div id="collapse12" class="collapse" aria-labelledby="heading12" >
    <div class="card-body">
     


      <table class="table table-bordered">
        <thead>
          <tr>                          
            <th style="text-align:center">mesure immediates a prendre</th>
        </tr>        
      </thead>
        <tbody>
            {{-- @foreach ($ficheevaluations as $ficheevaluation) --}}
                <tr> 
               <td style="text-align:center; width: 50%;">{{ $ficheevaluation->mesure_imm}}</td>     
                </tr>     
            {{-- @endforeach --}}
        </tbody>
    </table>
    











    </div>
  </div>
</div>

{{----------------------------------------------------------------------------}}


















    </div>




    
@endsection


