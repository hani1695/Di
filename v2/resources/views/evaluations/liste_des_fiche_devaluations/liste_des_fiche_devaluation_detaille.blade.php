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
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>    
<link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">

 <!-- FontAwesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
 <link rel="stylesheet" href="/assets/dist/ol-ext.css" />
 <script type="text/javascript" src="/assets/dist/ol-ext.js"></script>
 <!-- Pointer events polyfill for old browsers, see https://caniuse.com/#feat=pointer -->
 <script src="https://unpkg.com/elm-pep"></script>
 <script src="/assets/map/js/init.js"></script>
 <script>
       
        var test = "{{$ficheevaluatthision->code_fiche}}"; 
       
        
        </script>
<style>
    .ul .li {
        list-style-type: none;
        cursor: pointer;
    }

    .progressbar {
        counter-reset: step;
    }

    .progressbar .li {
        float: left;
        width: 14%;
        position: relative;
        text-align: center;
    }

    .progressbar .li:before {
        content: counter(step);
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

    .progressbar .li:after {
        content: '';
        position: absolute;
        width: 100%;
        height: 3px;
        background: #979797;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressbar .li.active:before {
        border-color: #3aac5d;
        background: #3aac5d;
        color: white
    }

    .progressbar .li.active:after {
        background: #3aac5d;
    }

    .progressbar .li.active - .li:after {
        background: #3aac5d;
    }

    .progressbar .li.active - .li:before {
        border-color: #3aac5d;
        background: #3aac5d;
        color: white
    }

    .progressbar .li:first-child:after {
        content: none;
    }

</style>
<div class="row " style="margin-bottom: 100px;">

    <div class="col-lg">
        <div class="card">
            @include('admin.messages')
            <div class="card-header">

                <div style="text-align: center">
                    <h5><strong>FICHE D’EVALUATION DES DOMMAGES</strong></h5>
                </div>


            </div>

            <div class="root">
                <div class="container">
                    <ul class="progressbar ul">
                        <li class="li active" id="b1" onclick="afficherstep1(this)">1-IDENTIFICATION CONSTRUCTION</li>
                        <li class="li" id="b2" onclick="afficherstep2(this)">2-DESCRIPTION SOMMAIRE</li>
                        <li class="li" id="b3" onclick="afficherstep3(this)">3-FONDATIONS INFRASTRUCTURE</li>
                        <li class="li" id="b4" onclick="afficherstep4(this)">4-STRUCTURE RESISTANTE</li>
                        <li class="li" id="b5" onclick="afficherstep5(this)">5-ELEMENTS SECONDAIRES</li>
                        <li class="li" id="b6" onclick="afficherstep6(this)">6-INFORMATION GENERALE</li>
                        <li class="li" id="b7" onclick="afficherstep7(this)">7-EVALUATION</li>
                    </ul>
                </div>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div>

            <div>

                <div id="step-1" style="display: block">
                    <div style="text-align:center"><a href="#step-1"><br />
                            <h4 class="btn active"><strong>IDENTIFICATION CONSTRUCTION</strong></h4> <br><br>
                        </a>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Code innspecteur:</label>
                                            <div class="col-sm-9">
                                                <input type="text"  name="wilaya"
                                                    value="{{$ficheevaluatthision->cod_inp_a}}"
                                                    placeholder="Enter code_fiche" required
                                                    class="form-control-plaintext">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Wilaya:</label>
                                            <div class="col-sm-9">
                                                <input type="text"  name="wilaya"
                                                    value="{{$ficheevaluatthision->wilaya}}"
                                                    placeholder="Enter code_fiche" required
                                                    class="form-control-plaintext">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Daira :</label>
                                            <div class="col-sm-7">
                                                <input type="text"  name="ilot"
                                                    value="{{$ficheevaluatthision->daira}}"
                                                    class="form-control-plaintext" placeholder="">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Commune :</label>
                                            <div class="col-sm-7">
                                                <input type="text"  name="ilot"
                                                    value="{{$commune->nom_c}}"
                                                    class="form-control-plaintext" placeholder="">


                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">District :</label>
                                            <div class="col-sm-9">
                                                <input type="text"  name="district"
                                                    value="{{$ficheevaluatthision->district}}"
                                                    class="form-control-plaintext" placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Ilot :</label>
                                            <div class="col-sm-9">
                                                <input type="text"  name="ilot"
                                                    value="{{$ficheevaluatthision->ilot}}"
                                                    class="form-control-plaintext" placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label for="inputPassword" class="col-sm-3 col-form-label">Adresse
                                                :</label>
                                            <div class="col-sm-9">
                                                <input type="text"  class="form-control-plaintext"
                                                    placeholder="" required>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-5 col-form-label">Construction Calculée au Séisme : </label>

                                            <div class="col-sm-7">
                                                {{-- <input class="form-check-input" type="checkbox"  name="const_clc"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->const_clc == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="const_clc"
                                                    value="non"
                                                    {{ $ficheevaluatthision->const_clc == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}

                                                
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->const_clc == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->const_clc == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-5 col-form-label">Construction Contrôlée :
                                            </label>

                                            <div class="col-sm-7">
                                                {{-- <input class="form-check-input" type="checkbox"  name="const_cont"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->const_cont == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="inlineRadio1"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="const_cont"
                                                    value="non"
                                                    {{ $ficheevaluatthision->const_cont == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="inlineRadio2"> Non </label> --}}


                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->const_cont == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->const_cont == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">


                                            <label class="col-sm-5 col-form-label">Usage de la Construction :
                                            </label>

                                            <div class="col-sm-7">

                                                <input type="text"  name="ilot"
                                                    value="{{$ficheevaluatthision->usage}}"
                                                    class="form-control-plaintext" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                


                            </div>
                        </div>

                    </div>




                    <div id="map" class="mx-2">
                        
                    </div>
                </div>
                <div id="step-2" style="display: none">
                    <div style="text-align:center"><a href="#step-2"><br />
                            <h2 class="btn active"> <strong> DESCRIPTION SOMMAIRE</strong></h2> <br><br>
                        </a>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Age Approximatif :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  name="age_app"
                                                    value="{{$ficheevaluatthision->age_app}}"
                                                    class="form-control-plaintext">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nombre de Niveaux :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  name="nb_niv"
                                                    value="{{$ficheevaluatthision->nb_niv}}"
                                                    class="form-control-plaintext" placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Vide Sanitaire : </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="v_san"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->v_san == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="v_san"
                                                    value="non"
                                                    {{ $ficheevaluatthision->v_san == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}
                                                

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->v_san == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->v_san == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>

                                                


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Sous-sol : </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="sou_sol"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->sou_sol == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="sou_sol"
                                                    value="non"
                                                    {{ $ficheevaluatthision->sou_sol == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->sou_sol == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->sou_sol == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>
                                    <strong>
                                        Nombre de Joints de Dilatation
                                    </strong>
                                </h5><br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Enélévation
                                                :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  name="nb_join_el"
                                                    value="{{$ficheevaluatthision->nb_join_el}}"
                                                    class="form-control-plaintext">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">En Infrastructure  :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  name="nb_join_in"
                                                    value="{{$ficheevaluatthision->nb_join_in}}"
                                                    class="form-control-plaintext" placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <h5>
                                    <strong>
                                        Eléments extérieurs indépendants
                                    </strong>
                                </h5><br>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Escaliers : </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="elem_ext_e"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->elem_ext_e == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="elem_ext_e"
                                                    value="non"
                                                    {{ $ficheevaluatthision->elem_ext_e == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->elem_ext_e == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->elem_ext_e == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Auvent : </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="elem_ext_a"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->elem_ext_a == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="elem_ext_a"
                                                    value="non"
                                                    {{ $ficheevaluatthision->elem_ext_a == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->elem_ext_a == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->elem_ext_a == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Passage Couvert : </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="elem_ext_p"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->elem_ext_p == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="elem_ext_p"
                                                    value="non"
                                                    {{ $ficheevaluatthision->elem_ext_p == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->elem_ext_p == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->elem_ext_p == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
<hr>
<h5>
    <strong>
        Problème de Sol autour de la Construction (*)
    </strong>
</h5><br>
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Faille : </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="faille"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->faille == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="faille"
                                                    value="non"
                                                    {{ $ficheevaluatthision->faille == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->faille == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->faille == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Liquéfaction : </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="liquefa"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->liquefa == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="liquefa"
                                                    value="non"
                                                    {{ $ficheevaluatthision->liquefa == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}


                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->liquefa == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->liquefa == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Affaissement / Soulèvement :
                                            </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="affaisse_s"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->affaisse_s == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="affaisse_s"
                                                    value="non"
                                                    {{ $ficheevaluatthision->affaisse_s == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->affaisse_s == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->affaisse_s == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Glissement : </label>

                                            <div class="col-sm-8">
                                                {{-- <input class="form-check-input" type="checkbox"  name="gliss"
                                                    value="oui"
                                                    {{ $ficheevaluatthision->gliss == 'oui' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Oui </label><br>

                                                <input class="form-check-input" type="checkbox"  name="gliss"
                                                    value="non"
                                                    {{ $ficheevaluatthision->gliss == 'non' ? 'checked' : ''}}>
                                                <label class="form-check-label"> Non </label> --}}


                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->gliss == 'oui' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->gliss == 'non' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                                  </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                            </div>
                        </div>
                    </div>

                </div>

                <div id="step-3" style="display: none" class="">
                    <div style="text-align:center"><a href="#step-3"><br />
                            <h4 class="btn active"><strong>FONDATIONS INFRASTRUCTURE</strong> </h4> <br><br>
                        </a>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>
                                    <strong>
                                        Fondations
                                    </strong>
                                </h5><br>
                                <div class="row">
                                    <div class="col-md-12 text-justify">
                                        <div class="form-group row">


                                            <label class="col-sm-4 col-form-label">Type de Fondations :</label>
                                            <div class="col-sm-8">
                                                <input type="text"  name="age_app"
                                                    value="{{$ficheevaluatthision->fond_type}}"
                                                    class="form-control-plaintext">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>
                                    <strong>
                                        Infrastructure (dans le cas VS ou S/Sol)
                                    </strong>

                                </h5><br>
                                <div class="container">
                                    <label class="col-sm-4 col-form-label">Voile Béton Continu :
                                    </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"  value="1"
                                            {{ $ficheevaluatthision->infr_voil == '1' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="exampleRadios1">
                                            1
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"  value="2"
                                            {{ $ficheevaluatthision->infr_voil == '2' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="exampleRadios2">
                                            2
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"  value="3"
                                            {{ $ficheevaluatthision->infr_voil == '3' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="exampleRadios3">
                                            3
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"  value="4"
                                            {{ $ficheevaluatthision->infr_voil == '4' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="exampleRadios4">
                                            4
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"  value="5"
                                            {{ $ficheevaluatthision->infr_voil == '5' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="exampleRadios4">
                                            5
                                        </label>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Voile Béton Continu :
                                            </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="infr_voil" value="1"
                                                    {{ $ficheevaluatthision->infr_voil == '1' ? 'checked' : ''}}>
                                <label class="form-check-label"> 1 </label>

                                <input class="form-check-input" type="checkbox"  name="infr_voil" value="2"
                                    {{ $ficheevaluatthision->infr_voil == '2' ? 'checked' : ''}}>
                                <label class="form-check-label"> 2 </label>

                                <input class="form-check-input" type="checkbox"  name="infr_voil" value="3"
                                    {{ $ficheevaluatthision->infr_voil == '3' ? 'checked' : ''}}>
                                <label class="form-check-label"> 3 </label>

                                <input class="form-check-input" type="checkbox"  name="infr_voil" value="4"
                                    {{ $ficheevaluatthision->infr_voil == '4' ? 'checked' : ''}}>
                                <label class="form-check-label"> 4 </label>

                                <input class="form-check-input" type="checkbox"  name="infr_voil" value="5"
                                    {{ $ficheevaluatthision->infr_voil == '5' ? 'checked' : ''}}>
                                <label class="form-check-label"> 5 </label>


                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="container">
                    <label class="col-sm-4 col-form-label">Poteaux Béton avec Remplissage :
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="1"
                            {{ $ficheevaluatthision->infr_po_re == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="2"
                            {{ $ficheevaluatthision->infr_po_re == '2' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="3"
                            {{ $ficheevaluatthision->infr_po_re == '3' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="4"
                            {{ $ficheevaluatthision->infr_po_re == '4' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="5"
                            {{ $ficheevaluatthision->infr_po_re == '5' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios4">
                            5
                        </label>
                    </div>
                </div>
                <br>

                {{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Poteaux Béton avec
                                                Remplissage : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="infr_po_re" value="1"
                                                    {{ $ficheevaluatthision->infr_po_re == '1' ? 'checked' : ''}}>
                <label class="form-check-label"> 1 </label>

                <input class="form-check-input" type="checkbox"  name="infr_po_re" value="2"
                    {{ $ficheevaluatthision->infr_po_re == '2' ? 'checked' : ''}}>
                <label class="form-check-label"> 2 </label>

                <input class="form-check-input" type="checkbox"  name="infr_po_re" value="3"
                    {{ $ficheevaluatthision->infr_po_re == '3' ? 'checked' : ''}}>
                <label class="form-check-label"> 3 </label>

                <input class="form-check-input" type="checkbox"  name="infr_po_re" value="4"
                    {{ $ficheevaluatthision->infr_po_re == '4' ? 'checked' : ''}}>
                <label class="form-check-label"> 4 </label>

                <input class="form-check-input" type="checkbox"  name="infr_po_re" value="5"
                    {{ $ficheevaluatthision->infr_po_re == '5' ? 'checked' : ''}}>
                <label class="form-check-label"> 5 </label>




            </div>
        </div>
    </div>
</div> --}}

</div>
<br>
<div class="col-md-6">
    <h5>
        <strong>
            Type de Dommages
        </strong>
    </h5><br>
    <div class="row">
        <div class="col-md-12">

            <div class="form-group row">

                <label class="col-sm-4 col-form-label">Tassement Uniforme : </label>

                <div class="col-sm-8">
                    {{-- <input class="form-check-input" type="checkbox"  name="fon_dom_ta" value="oui"
                        {{ $ficheevaluatthision->fon_dom_ta == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label"> Oui </label><br>

                    <input class="form-check-input" type="checkbox"  name="fon_dom_ta" value="non"
                        {{ $ficheevaluatthision->fon_dom_ta == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label"> Non </label> --}}


                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->fon_dom_ta == 'oui' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->fon_dom_ta == 'non' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">Non</label>
                      </div>


                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            <div class="form-group row">

                <label class="col-sm-4 col-form-label">Glissement : </label>

                <div class="col-sm-8">
                    {{-- <input class="form-check-input" type="checkbox"  name="fon_dom_gl" value="oui"
                        {{ $ficheevaluatthision->fon_dom_gl == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label"> Oui </label><br>

                    <input class="form-check-input" type="checkbox"  name="fon_dom_gl" value="non"
                        {{ $ficheevaluatthision->fon_dom_gl == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label"> Non </label> --}}


                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->fon_dom_gl == 'oui' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->fon_dom_gl == 'non' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">Non</label>
                      </div>



                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            <div class="form-group row">

                <label class="col-sm-4 col-form-label">Basculement : </label>

                <div class="col-sm-8">
                    {{-- <input class="form-check-input" type="checkbox"  name="fon_dom_bs" value="oui"
                        {{ $ficheevaluatthision->fon_dom_bs == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label"> Oui </label><br>

                    <input class="form-check-input" type="checkbox"  name="fon_dom_bs" value="non"
                        {{ $ficheevaluatthision->fon_dom_bs == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label"> Non </label> --}}

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->fon_dom_bs == 'oui' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->fon_dom_bs == 'non' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">Non</label>
                      </div>


                </div>

            </div>
        </div>
    </div>


</div>
</div>

</div>




</div>
<div id="step-4" style="display: none" class="">
    <div style="text-align:center"><a href="#step-4"><br />
            <h4 class="btn active"><strong>STRUCTURE RESISTANTE</strong></h4> <br><br>
        </a>
    </div>
    <hr>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h5>
                    <strong>
                        Elément porteur (charges verticales)
                    </strong>
                    <br><br>
                </h5>
                <div class="container">
                    <label class="col-sm-4 col-form-label">Murs en maçonnerie :
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="1"
                            {{ $ficheevaluatthision->str_e_p_m == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="2"
                            {{ $ficheevaluatthision->str_e_p_m == '2' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="3"
                            {{ $ficheevaluatthision->str_e_p_m == '3' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="4"
                            {{ $ficheevaluatthision->str_e_p_m == '4' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="5"
                            {{ $ficheevaluatthision->str_e_p_m == '5' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios4">
                            5
                        </label>
                    </div>
                </div>
                {{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Murs en maçonnerie : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="str_e_p_m" value="1"
                                                    {{ $ficheevaluatthision->str_e_p_m == '1' ? 'checked' : ''}}>
                <label class="form-check-label"> 1 </label>

                <input class="form-check-input" type="checkbox"  name="str_e_p_m" value="2"
                    {{ $ficheevaluatthision->str_e_p_m == '2' ? 'checked' : ''}}>
                <label class="form-check-label"> 2 </label>

                <input class="form-check-input" type="checkbox"  name="str_e_p_m" value="3"
                    {{ $ficheevaluatthision->str_e_p_m == '3' ? 'checked' : ''}}>
                <label class="form-check-label"> 3 </label>

                <input class="form-check-input" type="checkbox"  name="str_e_p_m" value="4"
                    {{ $ficheevaluatthision->str_e_p_m == '4' ? 'checked' : ''}}>
                <label class="form-check-label"> 4 </label>

                <input class="form-check-input" type="checkbox"  name="str_e_p_m" value="5"
                    {{ $ficheevaluatthision->str_e_p_m == '5' ? 'checked' : ''}}>
                <label class="form-check-label"> 5 </label>



            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Voile Béton :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->str_e_p_vb == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->str_e_p_vb == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->str_e_p_vb == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->str_e_p_vb == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->str_e_p_vb == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Voile Béton : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="1"
                                                    {{ $ficheevaluatthision->str_e_p_vb == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="2"
    {{ $ficheevaluatthision->str_e_p_vb == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="3"
    {{ $ficheevaluatthision->str_e_p_vb == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="4"
    {{ $ficheevaluatthision->str_e_p_vb == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="5"
    {{ $ficheevaluatthision->str_e_p_vb == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>




</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Poteaux Béton :...
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ null == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ null == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ null == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ null == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ null == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Poteaux Béton : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="1"
                                                    {{ $ficheevaluatthision->str_e_p_vb == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="2"
    {{ $ficheevaluatthision->str_e_p_vb == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="3"
    {{ $ficheevaluatthision->str_e_p_vb == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="4"
    {{ $ficheevaluatthision->str_e_p_vb == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_vb" value="5"
    {{ $ficheevaluatthision->str_e_p_vb == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Poteaux Métalliques :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->str_e_p_mt == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->str_e_p_mt == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->str_e_p_mt == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->str_e_p_mt == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->str_e_p_mt == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Poteaux Métalliques : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="str_e_p_mt" value="1"
                                                    {{ $ficheevaluatthision->str_e_p_mt == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_mt" value="2"
    {{ $ficheevaluatthision->str_e_p_mt == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_mt" value="3"
    {{ $ficheevaluatthision->str_e_p_mt == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_mt" value="4"
    {{ $ficheevaluatthision->str_e_p_mt == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_mt" value="5"
    {{ $ficheevaluatthision->str_e_p_mt == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Poteaux Bois :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->str_e_p_b == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->str_e_p_b == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->str_e_p_b == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->str_e_p_b == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->str_e_p_b == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Poteaux Bois : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="str_e_p_b" value="1"
                                                    {{ $ficheevaluatthision->str_e_p_b == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_b" value="2"
    {{ $ficheevaluatthision->str_e_p_b == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_b" value="3"
    {{ $ficheevaluatthision->str_e_p_b == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_b" value="4"
    {{ $ficheevaluatthision->str_e_p_b == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_b" value="5"
    {{ $ficheevaluatthision->str_e_p_b == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Autres :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->str_e_p_au == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->str_e_p_au == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->str_e_p_au == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->str_e_p_au == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->str_e_p_au == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Autres : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="str_e_p_au" value="1"
                                                    {{ $ficheevaluatthision->str_e_p_au == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_au" value="2"
    {{ $ficheevaluatthision->str_e_p_au == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_au" value="3"
    {{ $ficheevaluatthision->str_e_p_au == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_au" value="4"
    {{ $ficheevaluatthision->str_e_p_au == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="str_e_p_au" value="5"
    {{ $ficheevaluatthision->str_e_p_au == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}


</div>
<div class="col-md-6">
    <h5>
        <strong>
            Elément de contreventement
        </strong>
        <br><br>

    </h5>
    <div class="container">
        <label class="col-sm-4 col-form-label">Murs en maçonnerie :
        </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="1"
                {{ $ficheevaluatthision->el_ctv_m_m == '1' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="2"
                {{ $ficheevaluatthision->el_ctv_m_m == '2' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="3"
                {{ $ficheevaluatthision->el_ctv_m_m == '3' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="4"
                {{ $ficheevaluatthision->el_ctv_m_m == '4' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="5"
                {{ $ficheevaluatthision->el_ctv_m_m == '5' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios4">
                5
            </label>
        </div>
    </div>
    {{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Murs en maçonnerie : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="el_ctv_m_m" value="1"
                                                    {{ $ficheevaluatthision->el_ctv_m_m == '1' ? 'checked' : ''}}>
    <label class="form-check-label"> 1 </label>

    <input class="form-check-input" type="checkbox"  name="el_ctv_m_m" value="2"
        {{ $ficheevaluatthision->el_ctv_m_m == '2' ? 'checked' : ''}}>
    <label class="form-check-label"> 2 </label>

    <input class="form-check-input" type="checkbox"  name="el_ctv_m_m" value="3"
        {{ $ficheevaluatthision->el_ctv_m_m == '3' ? 'checked' : ''}}>
    <label class="form-check-label"> 3 </label>

    <input class="form-check-input" type="checkbox"  name="el_ctv_m_m" value="4"
        {{ $ficheevaluatthision->el_ctv_m_m == '4' ? 'checked' : ''}}>
    <label class="form-check-label"> 4 </label>

    <input class="form-check-input" type="checkbox"  name="el_ctv_m_m" value="5"
        {{ $ficheevaluatthision->el_ctv_m_m == '5' ? 'checked' : ''}}>
    <label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Voile Béton :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_ctv_v_b == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_ctv_v_b == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_ctv_v_b == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_ctv_v_b == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_ctv_v_b == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Voile Béton : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="el_ctv_v_b" value="1"
                                                    {{ $ficheevaluatthision->el_ctv_v_b == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_v_b" value="2"
    {{ $ficheevaluatthision->el_ctv_v_b == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_v_b" value="3"
    {{ $ficheevaluatthision->el_ctv_v_b == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_v_b" value="4"
    {{ $ficheevaluatthision->el_ctv_v_b == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_v_b" value="5"
    {{ $ficheevaluatthision->el_ctv_v_b == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Portiques Béton Armé:
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_ctv_p_b == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_ctv_p_b == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_ctv_p_b == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_ctv_p_b == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_ctv_p_b == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Portiques Béton Armé: </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="el_ctv_p_b" value="1"
                                                    {{ $ficheevaluatthision->el_ctv_p_b == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_p_b" value="2"
    {{ $ficheevaluatthision->el_ctv_p_b == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_p_b" value="3"
    {{ $ficheevaluatthision->el_ctv_p_b == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_p_b" value="4"
    {{ $ficheevaluatthision->el_ctv_p_b == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_p_b" value="5"
    {{ $ficheevaluatthision->el_ctv_p_b == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Portiques Métalliques :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_ctv_p_m == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_ctv_p_m == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_ctv_p_m == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_ctv_p_m == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_ctv_p_m == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Portiques Métalliques : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="el_ctv_p_m" value="1"
                                                    {{ $ficheevaluatthision->el_ctv_p_m == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_p_m" value="2"
    {{ $ficheevaluatthision->el_ctv_p_m == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_p_m" value="3"
    {{ $ficheevaluatthision->el_ctv_p_m == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_p_m" value="4"
    {{ $ficheevaluatthision->el_ctv_p_m == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_p_m" value="5"
    {{ $ficheevaluatthision->el_ctv_p_m == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>





</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Palées Triangulées :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_ctv_pa_ == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_ctv_pa_ == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_ctv_pa_ == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_ctv_pa_ == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_ctv_pa_ == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Palées Triangulées : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="el_ctv_pa_" value="1"
                                                    {{ $ficheevaluatthision->el_ctv_pa_ == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_pa_" value="2"
    {{ $ficheevaluatthision->el_ctv_pa_ == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_pa_" value="3"
    {{ $ficheevaluatthision->el_ctv_pa_ == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_pa_" value="4"
    {{ $ficheevaluatthision->el_ctv_pa_ == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_pa_" value="5"
    {{ $ficheevaluatthision->el_ctv_pa_ == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>




</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Autres :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_ctv_au == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_ctv_au == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_ctv_au == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_ctv_au == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_ctv_au == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label for="inputPassword" class="col-sm-4 col-form-label">Autres : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="el_ctv_au" value="1"
                                                    {{ $ficheevaluatthision->el_ctv_au == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_au" value="2"
    {{ $ficheevaluatthision->el_ctv_au == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_au" value="3"
    {{ $ficheevaluatthision->el_ctv_au == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_au" value="4"
    {{ $ficheevaluatthision->el_ctv_au == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_ctv_au" value="5"
    {{ $ficheevaluatthision->el_ctv_au == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
</div>
</div>
<hr>

<div class="row">
    <div class="col-md-6">
        <h5>
            <strong>
                Planchers-toiture terrasse
            </strong>
            <br><br>
        </h5>
        <div class="container">
            <label class="col-sm-4 col-form-label">Béton Armé :
            </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="1"
                    {{ $ficheevaluatthision->plan_tr__1 == '1' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios1">
                    1
                </label>

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="2"
                    {{ $ficheevaluatthision->plan_tr__1 == '2' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios2">
                    2
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="3"
                    {{ $ficheevaluatthision->plan_tr__1 == '3' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios3">
                    3
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="4"
                    {{ $ficheevaluatthision->plan_tr__1 == '4' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios4">
                    4
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="5"
                    {{ $ficheevaluatthision->plan_tr__1 == '5' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios4">
                    5
                </label>
            </div>
        </div>
        {{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Béton Armé : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="plan_tr_b" value="1"
                                                    {{ $ficheevaluatthision->plan_tr_b == '1' ? 'checked' : ''}}>
        <label class="form-check-label"> 1 </label>

        <input class="form-check-input" type="checkbox"  name="plan_tr_b" value="2"
            {{ $ficheevaluatthision->plan_tr_b == '2' ? 'checked' : ''}}>
        <label class="form-check-label"> 2 </label>

        <input class="form-check-input" type="checkbox"  name="plan_tr_b" value="3"
            {{ $ficheevaluatthision->plan_tr_b == '3' ? 'checked' : ''}}>
        <label class="form-check-label"> 3 </label>

        <input class="form-check-input" type="checkbox"  name="plan_tr_b" value="4"
            {{ $ficheevaluatthision->plan_tr_b == '4' ? 'checked' : ''}}>
        <label class="form-check-label"> 4 </label>

        <input class="form-check-input" type="checkbox"  name="plan_tr_b" value="5"
            {{ $ficheevaluatthision->plan_tr_b == '5' ? 'checked' : ''}}>
        <label class="form-check-label"> 5 </label>


    </div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Solives Métalliques :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->plan_tr_s_ == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->plan_tr_s_ == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->plan_tr_s_ == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->plan_tr_s_ == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->plan_tr_s_ == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Solives Métalliques : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="plan_tr_s_" value="1"
                                                    {{ $ficheevaluatthision->plan_tr_s_ == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="plan_tr_s_" value="2"
    {{ $ficheevaluatthision->plan_tr_s_ == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="plan_tr_s_" value="3"
    {{ $ficheevaluatthision->plan_tr_s_ == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="plan_tr_s_" value="4"
    {{ $ficheevaluatthision->plan_tr_s_ == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="plan_tr_s_" value="5"
    {{ $ficheevaluatthision->plan_tr_s_ == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Solives Bois :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->plan_tr_b == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->plan_tr_b == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->plan_tr_b == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->plan_tr_b == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->plan_tr_b == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Solives Bois : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="plan_tr__1" value="1"
                                                    {{ $ficheevaluatthision->plan_tr__1 == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="plan_tr__1" value="2"
    {{ $ficheevaluatthision->plan_tr__1 == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="plan_tr__1" value="3"
    {{ $ficheevaluatthision->plan_tr__1 == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="plan_tr__1" value="4"
    {{ $ficheevaluatthision->plan_tr__1 == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="plan_tr__1" value="5"
    {{ $ficheevaluatthision->plan_tr__1 == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>

</div>
</div>
</div>
</div> --}}



</div>
<div class="col-md-6">
    <h5>
        <strong>
            Toiture inclinée
        </strong>
        <br><br>

    </h5>
    <div class="container">
        <label class="col-sm-4 col-form-label">Charpente Métallique :
        </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="1"
                {{ $ficheevaluatthision->t_in_c_m == '1' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="2"
                {{ $ficheevaluatthision->t_in_c_m == '2' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="3"
                {{ $ficheevaluatthision->t_in_c_m == '3' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="4"
                {{ $ficheevaluatthision->t_in_c_m == '4' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="5"
                {{ $ficheevaluatthision->t_in_c_m == '5' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios4">
                5
            </label>
        </div>
    </div>
    {{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Charpente Métallique : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="t_in_c_m" value="1"
                                                    {{ $ficheevaluatthision->t_in_c_m == '1' ? 'checked' : ''}}>
    <label class="form-check-label"> 1 </label>

    <input class="form-check-input" type="checkbox"  name="t_in_c_m" value="2"
        {{ $ficheevaluatthision->t_in_c_m == '2' ? 'checked' : ''}}>
    <label class="form-check-label"> 2 </label>

    <input class="form-check-input" type="checkbox"  name="t_in_c_m" value="3"
        {{ $ficheevaluatthision->t_in_c_m == '3' ? 'checked' : ''}}>
    <label class="form-check-label"> 3 </label>

    <input class="form-check-input" type="checkbox"  name="t_in_c_m" value="4"
        {{ $ficheevaluatthision->t_in_c_m == '4' ? 'checked' : ''}}>
    <label class="form-check-label"> 4 </label>

    <input class="form-check-input" type="checkbox"  name="t_in_c_m" value="5"
        {{ $ficheevaluatthision->t_in_c_m == '5' ? 'checked' : ''}}>
    <label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Charpente Bois :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->t_in_c_b == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->t_in_c_b == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->t_in_c_b == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->t_in_c_b == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->t_in_c_b == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Charpente Bois : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="t_in_c_b" value="1"
                                                    {{ $ficheevaluatthision->t_in_c_b == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="t_in_c_b" value="2"
    {{ $ficheevaluatthision->t_in_c_b == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="t_in_c_b" value="3"
    {{ $ficheevaluatthision->t_in_c_b == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="t_in_c_b" value="4"
    {{ $ficheevaluatthision->t_in_c_b == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="t_in_c_b" value="5"
    {{ $ficheevaluatthision->t_in_c_b == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>




</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Couverture Tuile :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->t_in_cv_t == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->t_in_cv_t == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->t_in_cv_t == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->t_in_cv_t == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->t_in_cv_t == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Couverture Tuile : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="t_in_cv_t" value="1"
                                                    {{ $ficheevaluatthision->t_in_cv_t == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_t" value="2"
    {{ $ficheevaluatthision->t_in_cv_t == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_t" value="3"
    {{ $ficheevaluatthision->t_in_cv_t == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_t" value="4"
    {{ $ficheevaluatthision->t_in_cv_t == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_t" value="5"
    {{ $ficheevaluatthision->t_in_cv_t == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Couverture Amiante Ciment :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->t_in_cv_am == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->t_in_cv_am == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->t_in_cv_am == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->t_in_cv_am == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->t_in_cv_am == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Couverture Amiante Ciment : </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="t_in_cv_am" value="1"
                                                    {{ $ficheevaluatthision->t_in_cv_am == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_am" value="2"
    {{ $ficheevaluatthision->t_in_cv_am == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_am" value="3"
    {{ $ficheevaluatthision->t_in_cv_am == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_am" value="4"
    {{ $ficheevaluatthision->t_in_cv_am == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_am" value="5"
    {{ $ficheevaluatthision->t_in_cv_am == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Couverture Métallique:
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->t_in_cv_me == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->t_in_cv_me == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->t_in_cv_me == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->t_in_cv_me == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->t_in_cv_me == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
<br>
{{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Couverture Métallique: </label>

                                            <div class="col-sm-8">
                                                <input class="form-check-input" type="checkbox"  name="t_in_cv_me" value="1"
                                                    {{ $ficheevaluatthision->t_in_cv_me == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_me" value="2"
    {{ $ficheevaluatthision->t_in_cv_me == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_me" value="3"
    {{ $ficheevaluatthision->t_in_cv_me == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_me" value="4"
    {{ $ficheevaluatthision->t_in_cv_me == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="t_in_cv_me" value="5"
    {{ $ficheevaluatthision->t_in_cv_me == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}

</div>
</div>
</div>


</div>

</div>
<div id="step-5" style="display: none" class="">
    <div style="text-align:center"><a href="#step-5"><br />
            <h4 class="btn active"><strong>SECONDAIRES</strong> </h4><br> <br>
        </a>
    </div>
    <hr>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h5>
                    <strong>
                        Escaliers
                    </strong>
                    <br><br>
                </h5>
                <div class="container">
                    <label class="col-sm-4 col-form-label">Béton :
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="1"
                            {{ $ficheevaluatthision->el_s_es_be == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="2"
                            {{ $ficheevaluatthision->el_s_es_be == '2' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="3"
                            {{ $ficheevaluatthision->el_s_es_be == '3' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="4"
                            {{ $ficheevaluatthision->el_s_es_be == '4' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="5"
                            {{ $ficheevaluatthision->el_s_es_be == '5' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios4">
                            5
                        </label>
                    </div>
                </div>
                {{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Béton : </label>

                                        <div class="col-sm-8">

                                            <input class="form-check-input" type="checkbox"  name="el_s_es_be" value="1"
                                                {{ $ficheevaluatthision->el_s_es_be == '1' ? 'checked' : ''}}>
                <label class="form-check-label"> 1 </label>

                <input class="form-check-input" type="checkbox"  name="el_s_es_be" value="2"
                    {{ $ficheevaluatthision->el_s_es_be == '2' ? 'checked' : ''}}>
                <label class="form-check-label"> 2 </label>

                <input class="form-check-input" type="checkbox"  name="el_s_es_be" value="3"
                    {{ $ficheevaluatthision->el_s_es_be == '3' ? 'checked' : ''}}>
                <label class="form-check-label"> 3 </label>

                <input class="form-check-input" type="checkbox"  name="el_s_es_be" value="4"
                    {{ $ficheevaluatthision->el_s_es_be == '4' ? 'checked' : ''}}>
                <label class="form-check-label"> 4 </label>

                <input class="form-check-input" type="checkbox"  name="el_s_es_be" value="5"
                    {{ $ficheevaluatthision->el_s_es_be == '5' ? 'checked' : ''}}>
                <label class="form-check-label"> 5 </label>



            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Métal :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_es_m == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_es_m == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_es_m == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_es_m == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_es_m == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>

<div class="container">
    <label class="col-sm-4 col-form-label">Bois:
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_es_b == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_es_b == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_es_b == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_es_b == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_es_b == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>


{{-- maaaaaaanque bois {{ $ficheevaluatthision->el_s_es_b}} --}}



{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Métal :
                                        </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_es_m" value="1"
                                                {{ $ficheevaluatthision->el_s_es_m == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_es_m" value="2"
    {{ $ficheevaluatthision->el_s_es_m == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_es_m" value="3"
    {{ $ficheevaluatthision->el_s_es_m == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_es_m" value="4"
    {{ $ficheevaluatthision->el_s_es_m == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_es_m" value="5"
    {{ $ficheevaluatthision->el_s_es_m == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>

</div>
</div>
</div>
</div> --}}


</div>
<div class="col-md-6">
    <h5>
        <strong>
            Remplissage Extérieur
        </strong>
        <br><br>

    </h5>
    <div class="container">
        <label class="col-sm-4 col-form-label">Maçonnerie :
        </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="1"
                {{ $ficheevaluatthision->el_s_r_m == '1' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="2"
                {{ $ficheevaluatthision->el_s_r_m == '2' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="3"
                {{ $ficheevaluatthision->el_s_r_m == '3' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="4"
                {{ $ficheevaluatthision->el_s_r_m == '4' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="5"
                {{ $ficheevaluatthision->el_s_r_m == '5' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios4">
                5
            </label>
        </div>
    </div>
    {{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Maçonnerie : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_r_m" value="1"
                                                {{ $ficheevaluatthision->el_s_r_m == '1' ? 'checked' : ''}}>
    <label class="form-check-label"> 1 </label>

    <input class="form-check-input" type="checkbox"  name="el_s_r_m" value="2"
        {{ $ficheevaluatthision->el_s_r_m == '2' ? 'checked' : ''}}>
    <label class="form-check-label"> 2 </label>

    <input class="form-check-input" type="checkbox"  name="el_s_r_m" value="3"
        {{ $ficheevaluatthision->el_s_r_m == '3' ? 'checked' : ''}}>
    <label class="form-check-label"> 3 </label>

    <input class="form-check-input" type="checkbox"  name="el_s_r_m" value="4"
        {{ $ficheevaluatthision->el_s_r_m == '4' ? 'checked' : ''}}>
    <label class="form-check-label"> 4 </label>

    <input class="form-check-input" type="checkbox"  name="el_s_r_m" value="5"
        {{ $ficheevaluatthision->el_s_r_m == '5' ? 'checked' : ''}}>
    <label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Béton préfabriqué :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_r_bt == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_r_bt == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_r_bt == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_r_bt == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_r_bt == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Béton préfabriqué : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_r_bt" value="1"
                                                {{ $ficheevaluatthision->el_s_r_bt == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_bt" value="2"
    {{ $ficheevaluatthision->el_s_r_bt == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_bt" value="3"
    {{ $ficheevaluatthision->el_s_r_bt == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_bt" value="4"
    {{ $ficheevaluatthision->el_s_r_bt == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_bt" value="5"
    {{ $ficheevaluatthision->el_s_r_bt == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Bardages :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_r_ba == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_r_ba == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_r_ba == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_r_ba == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_r_ba == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>

{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Bardages : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_r_ba" value="1"
                                                {{ $ficheevaluatthision->el_s_r_ba == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_ba" value="2"
    {{ $ficheevaluatthision->el_s_r_ba == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_ba" value="3"
    {{ $ficheevaluatthision->el_s_r_ba == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_ba" value="4"
    {{ $ficheevaluatthision->el_s_r_ba == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_ba" value="5"
    {{ $ficheevaluatthision->el_s_r_ba == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Autres :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_r_au == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_r_au == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_r_au == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_r_au == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_r_au == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Autres : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_r_au" value="1"
                                                {{ $ficheevaluatthision->el_s_r_au == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_au" value="2"
    {{ $ficheevaluatthision->el_s_r_au == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_au" value="3"
    {{ $ficheevaluatthision->el_s_r_au == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_au" value="4"
    {{ $ficheevaluatthision->el_s_r_au == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_r_au" value="5"
    {{ $ficheevaluatthision->el_s_r_au == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}

</div>
</div>
<hr>


<div class="row">
    <div class="col-md-6">
        <h5>
            <strong>
                Autres Eléments Intérieurs
            </strong>
            <br><br>
        </h5>
        <div class="container">
            <label class="col-sm-4 col-form-label">Plafonds :
            </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="1"
                    {{ $ficheevaluatthision->el_s_in_p == '1' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios1">
                    1
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="2"
                    {{ $ficheevaluatthision->el_s_in_p == '2' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios2">
                    2
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="3"
                    {{ $ficheevaluatthision->el_s_in_p == '3' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios3">
                    3
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="4"
                    {{ $ficheevaluatthision->el_s_in_p == '4' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios4">
                    4
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  value="5"
                    {{ $ficheevaluatthision->el_s_in_p == '5' ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios4">
                    5
                </label>
            </div>
        </div>
        {{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Plafonds : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_in_p" value="1"
                                                {{ $ficheevaluatthision->el_s_in_p == '1' ? 'checked' : ''}}>
        <label class="form-check-label"> 1 </label>

        <input class="form-check-input" type="checkbox"  name="el_s_in_p" value="2"
            {{ $ficheevaluatthision->el_s_in_p == '2' ? 'checked' : ''}}>
        <label class="form-check-label"> 2 </label>

        <input class="form-check-input" type="checkbox"  name="el_s_in_p" value="3"
            {{ $ficheevaluatthision->el_s_in_p == '3' ? 'checked' : ''}}>
        <label class="form-check-label"> 3 </label>

        <input class="form-check-input" type="checkbox"  name="el_s_in_p" value="4"
            {{ $ficheevaluatthision->el_s_in_p == '4' ? 'checked' : ''}}>
        <label class="form-check-label"> 4 </label>

        <input class="form-check-input" type="checkbox"  name="el_s_in_p" value="5"
            {{ $ficheevaluatthision->el_s_in_p == '5' ? 'checked' : ''}}>
        <label class="form-check-label"> 5 </label>

    </div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Cloisons :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_in_c == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_in_c == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_in_c == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_in_c == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_in_c == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Cloisons : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_in_c" value="1"
                                                {{ $ficheevaluatthision->el_s_in_c == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_in_c" value="2"
    {{ $ficheevaluatthision->el_s_in_c == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_in_c" value="3"
    {{ $ficheevaluatthision->el_s_in_c == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_in_c" value="4"
    {{ $ficheevaluatthision->el_s_in_c == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_in_c" value="5"
    {{ $ficheevaluatthision->el_s_in_c == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>

</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Eléments
        Vitrés :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_in_v == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_in_v == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_in_v == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_in_v == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_in_v == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Eléments
                                            Vitrés : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_in_v" value="1"
                                                {{ $ficheevaluatthision->el_s_in_v == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_in_v" value="2"
    {{ $ficheevaluatthision->el_s_in_v == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_in_v" value="3"
    {{ $ficheevaluatthision->el_s_in_v == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_in_v" value="4"
    {{ $ficheevaluatthision->el_s_in_v == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_in_v" value="5"
    {{ $ficheevaluatthision->el_s_in_v == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>

</div>
</div>
</div>
</div> --}}



</div>
<div class="col-md-6">
    <h5>
        <strong>
            Eléments Extérieurs
        </strong>
        <br><br>

    </h5>
    <div class="container">
        <label class="col-sm-4 col-form-label">Balcons :
        </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="1"
                {{ $ficheevaluatthision->el_s_ex_b == '1' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="2"
                {{ $ficheevaluatthision->el_s_ex_b == '2' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="3"
                {{ $ficheevaluatthision->el_s_ex_b == '3' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="4"
                {{ $ficheevaluatthision->el_s_ex_b == '4' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="5"
                {{ $ficheevaluatthision->el_s_ex_b == '5' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios4">
                5
            </label>
        </div>
    </div>
    {{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Balcons : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_ex_b" value="1"
                                                {{ $ficheevaluatthision->el_s_ex_b == '1' ? 'checked' : ''}}>
    <label class="form-check-label"> 1 </label>

    <input class="form-check-input" type="checkbox"  name="el_s_ex_b" value="2"
        {{ $ficheevaluatthision->el_s_ex_b == '2' ? 'checked' : ''}}>
    <label class="form-check-label"> 2 </label>

    <input class="form-check-input" type="checkbox"  name="el_s_ex_b" value="3"
        {{ $ficheevaluatthision->el_s_ex_b == '3' ? 'checked' : ''}}>
    <label class="form-check-label"> 3 </label>

    <input class="form-check-input" type="checkbox"  name="el_s_ex_b" value="4"
        {{ $ficheevaluatthision->el_s_ex_b == '4' ? 'checked' : ''}}>
    <label class="form-check-label"> 4 </label>

    <input class="form-check-input" type="checkbox"  name="el_s_ex_b" value="5"
        {{ $ficheevaluatthision->el_s_ex_b == '5' ? 'checked' : ''}}>
    <label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Garde-corps :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_ex_ga == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_ex_ga == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_ex_ga == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_ex_ga == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_ex_ga == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Garde-corps : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_ex_ga" value="1"
                                                {{ $ficheevaluatthision->el_s_ex_ga == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ga" value="2"
    {{ $ficheevaluatthision->el_s_ex_ga == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ga" value="3"
    {{ $ficheevaluatthision->el_s_ex_ga == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ga" value="4"
    {{ $ficheevaluatthision->el_s_ex_ga == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ga" value="5"
    {{ $ficheevaluatthision->el_s_ex_ga == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Auvent :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_ex_av == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_ex_av == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_ex_av == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_ex_av == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_ex_av == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label class="col-sm-4 col-form-label">Auvent : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_ex_av" value="1"
                                                {{ $ficheevaluatthision->el_s_ex_av == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_av" value="2"
    {{ $ficheevaluatthision->el_s_ex_av == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_av" value="3"
    {{ $ficheevaluatthision->el_s_ex_av == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_av" value="4"
    {{ $ficheevaluatthision->el_s_ex_av == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_av" value="5"
    {{ $ficheevaluatthision->el_s_ex_av == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>

</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Acrotères
        – Corniches :
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_ex_ac == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_ex_ac == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_ex_ac == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_ex_ac == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_ex_ac == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Acrotères
                                            – Corniches : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_ex_ac" value="1"
                                                {{ $ficheevaluatthision->el_s_ex_ac == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ac" value="2"
    {{ $ficheevaluatthision->el_s_ex_ac == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ac" value="3"
    {{ $ficheevaluatthision->el_s_ex_ac == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ac" value="4"
    {{ $ficheevaluatthision->el_s_ex_ac == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ac" value="5"
    {{ $ficheevaluatthision->el_s_ex_ac == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>

</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Cheminées: </label>
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_ex_ch == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_ex_ch == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_ex_ch == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_ex_ch == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_ex_ch == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Cheminées
                                            : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_ex_ch" value="1"
                                                {{ $ficheevaluatthision->el_s_ex_ch == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ch" value="2"
    {{ $ficheevaluatthision->el_s_ex_ch == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ch" value="3"
    {{ $ficheevaluatthision->el_s_ex_ch == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ch" value="4"
    {{ $ficheevaluatthision->el_s_ex_ch == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_ch" value="5"
    {{ $ficheevaluatthision->el_s_ex_ch == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Autres : </label>
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="1"
            {{ $ficheevaluatthision->el_s_ex_au == '1' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            1
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="2"
            {{ $ficheevaluatthision->el_s_ex_au == '2' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            2
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="3"
            {{ $ficheevaluatthision->el_s_ex_au == '3' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            3
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="4"
            {{ $ficheevaluatthision->el_s_ex_au == '4' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            4
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="5"
            {{ $ficheevaluatthision->el_s_ex_au == '5' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios4">
            5
        </label>
    </div>
</div>
<br>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Autres :
                                        </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="el_s_ex_au" value="1"
                                                {{ $ficheevaluatthision->el_s_ex_au == '1' ? 'checked' : ''}}>
<label class="form-check-label"> 1 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_au" value="2"
    {{ $ficheevaluatthision->el_s_ex_au == '2' ? 'checked' : ''}}>
<label class="form-check-label"> 2 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_au" value="3"
    {{ $ficheevaluatthision->el_s_ex_au == '3' ? 'checked' : ''}}>
<label class="form-check-label"> 3 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_au" value="4"
    {{ $ficheevaluatthision->el_s_ex_au == '4' ? 'checked' : ''}}>
<label class="form-check-label"> 4 </label>

<input class="form-check-input" type="checkbox"  name="el_s_ex_au" value="5"
    {{ $ficheevaluatthision->el_s_ex_au == '5' ? 'checked' : ''}}>
<label class="form-check-label"> 5 </label>

</div>
</div>
</div>
</div> --}}
</div>
</div>
</div>

</div>
<div id="step-6" style="display: none" class="">
    <div style="text-align:center"><a href="#step-6"><br />
            <h4 class="btn active"><strong>INFORMATION</strong> </h4> <br><br>
        </a>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h5>
                    <strong>
                        INFLUENCE DES CONSTRUCTIONS ADJACENTES (*)
                    </strong>
                    <br><br>
                </h5>
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group row">

                            <label class="col-sm-8 col-form-label">La construction menace une
                                autre construction : </label>

                            <div class="col-sm-4">

                                {{-- <input class="form-check-input" type="checkbox"  name="if_c_a_m_c" value="oui"
                                    {{ $ficheevaluatthision->if_c_a_m_c == 'oui' ? 'checked' : ''}}>
                                <label class="form-check-label"> Oui </label><br>

                                <input class="form-check-input" type="checkbox"  name="if_c_a_m_c" value="non"
                                    {{ $ficheevaluatthision->if_c_a_m_c == 'non' ? 'checked' : ''}}>
                                <label class="form-check-label"> Non </label> --}}
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->if_c_a_m_c == 'oui' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->if_c_a_m_c == 'non' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                  </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group row">

                            <label class="col-sm-8 col-form-label">La construction est menacée
                                par une autre construction : </label>

                            <div class="col-sm-4">
                                {{-- <input class="form-check-input" type="checkbox"  name="if_c_a_emc" value="oui"
                                    {{ $ficheevaluatthision->if_c_a_emc == 'oui' ? 'checked' : ''}}>
                                <label class="form-check-label"> Oui </label><br>

                                <input class="form-check-input" type="checkbox"  name="if_c_a_emc" value="non"
                                    {{ $ficheevaluatthision->if_c_a_emc == 'non' ? 'checked' : ''}}>
                                <label class="form-check-label"> Non </label> --}}
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->if_c_a_emc == 'oui' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->if_c_a_emc == 'non' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                  </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group row">

                            <label for="inputPassword" class="col-sm-8 col-form-label">La
                                construction peut être un soutien à une autre construction :
                            </label>

                            <div class="col-sm-4">
                                {{-- <input class="form-check-input" type="checkbox"  name="if_c_a_spc" value="oui"
                                    {{ $ficheevaluatthision->if_c_a_spc == 'oui' ? 'checked' : ''}}>
                                <label class="form-check-label"> Oui </label><br>

                                <input class="form-check-input" type="checkbox"  name="if_c_a_spc" value="non"
                                    {{ $ficheevaluatthision->if_c_a_spc == 'non' ? 'checked' : ''}}>
                                <label class="form-check-label"> Non </label> --}}

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->if_c_a_spc == 'oui' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->if_c_a_spc == 'non' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                  </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group row">

                            <label class="col-sm-8 col-form-label">La construction peut être
                                soutenue par une autre construction : </label>

                            <div class="col-sm-4">
                                {{-- <input class="form-check-input" type="checkbox"  name="if_c_a_esp" value="oui"
                                    {{ $ficheevaluatthision->if_c_a_esp == 'oui' ? 'checked' : ''}}>
                                <label class="form-check-label"> Oui </label><br>

                                <input class="form-check-input" type="checkbox"  name="if_c_a_esp" value="non"
                                    {{ $ficheevaluatthision->if_c_a_esp == 'non' ? 'checked' : ''}}>
                                <label class="form-check-label"> Non </label> --}}
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="oui" {{ $ficheevaluatthision->el_s_ex_av == 'oui' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="non" {{ $ficheevaluatthision->el_s_ex_av == 'non' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                                  </div>


                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <hr>
        <h5>
            <strong>
                VICTIMES (*)
            </strong>
        </h5><br>

        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <label class="col-sm-4 col-form-label">Symétrie en plan : </label>
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="oui"
                        {{ $ficheevaluatthision->victime == 'oui' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios1">
                            oui
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="non"
                        {{ $ficheevaluatthision->victime == 'non' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios2">
                            non
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="peut-être"
                        {{ $ficheevaluatthision->victime == 'peut-être' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios3">
                            peut-être
                        </label>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">


                            <input class="form-check-input" type="checkbox"  name="victime" value="oui"
                                {{ $ficheevaluatthision->victime == 'oui' ? 'checked' : ''}}>
                            <label class="form-check-label"> Oui </label><br>

                            <input class="form-check-input" type="checkbox"  name="victime" value="non"
                                {{ $ficheevaluatthision->victime == 'non' ? 'checked' : ''}}>
                            <label class="form-check-label"> Non </label><br>

                            <input class="form-check-input" type="checkbox"  name="victime" value="peut-être"
                                {{ $ficheevaluatthision->victime == 'peut-être' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio2"> Peut-être
                            </label>

                        </div>
                    </div>
                </div> --}}



            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Si oui combien ?</label>
                            <div class="col-sm-8">

                                <input type="text"  name="nb_victime"
                                    value="{{$ficheevaluatthision->nb_victime}}" class="form-control-plaintext"
                                    placeholder="">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <hr>
        <h5 >
            <strong>
                COMMENTAIRES SUR LA NATURE ET LA CAUSE PROBABLE DES DOMMAEGES
            </strong>
        </h5><br>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-center">
                    <strong>
                        Sens Transversal 
                    </strong>
                    <br><br>
                </h5>
                <div class="container">
                    <label class="col-sm-4 col-form-label">Symétrie en plan : </label>
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="Bon"
                            {{ $ficheevaluatthision->com_st_sp == 'Bon' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios1">
                            Bon
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="Moyen"
                            {{ $ficheevaluatthision->com_st_sp == 'Moyen' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios2">
                            Moyen
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  value="Mauvais"
                            {{ $ficheevaluatthision->com_st_sp == 'Mauvais' ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleRadios3">
                            Mauvais
                        </label>
                    </div>
                </div>
                {{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Symétrie en
                                            plan : </label>

                                        <div class="col-sm-8">

                                            <input class="form-check-input" type="checkbox"  name="com_st_sp" value="Bon"
                                                {{ $ficheevaluatthision->com_st_sp == 'Bon' ? 'checked' : ''}}>
                <label class="form-check-label"> Bon </label>

                <input class="form-check-input" type="checkbox"  name="com_st_sp" value="Moyen"
                    {{ $ficheevaluatthision->com_st_sp == 'Moyen' ? 'checked' : ''}}>
                <label class="form-check-label"> Moyen </label>

                <input class="form-check-input" type="checkbox"  name="com_st_sp" value="Mauvais"
                    {{ $ficheevaluatthision->com_st_sp == 'Mauvais' ? 'checked' : ''}}>
                <label class="form-check-label"> Mauvais </label>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Régularité en
        élévation : </label>
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Bon"
            {{ $ficheevaluatthision->com_st_re == 'Bon' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            Bon
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Moyen"
            {{ $ficheevaluatthision->com_st_re == 'Moyen' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            Moyen
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Mauvais"
            {{ $ficheevaluatthision->com_st_re == 'Mauvais' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            Mauvais
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Régularité en
                                            élévation : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="com_st_re" value="Bon"
                                                {{ $ficheevaluatthision->com_st_re == 'Bon' ? 'checked' : ''}}>
<label class="form-check-label"> Bon </label>

<input class="form-check-input" type="checkbox"  name="com_st_re" value="Moyen"
    {{ $ficheevaluatthision->com_st_re == 'Moyen' ? 'checked' : ''}}>
<label class="form-check-label"> Moyen </label>

<input class="form-check-input" type="checkbox"  name="com_st_re" value="Mauvais"
    {{ $ficheevaluatthision->com_st_re == 'Mauvais' ? 'checked' : ''}}>
<label class="form-check-label"> Mauvais </label>




</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Redondance
        des files : </label>
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Bon"
            {{ $ficheevaluatthision->com_st_rf == 'Bon' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            Bon
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Moyen"
            {{ $ficheevaluatthision->com_st_rf == 'Moyen' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            Moyen
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Mauvais"
            {{ $ficheevaluatthision->com_st_rf == 'Mauvais' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            Mauvais
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Redondance
                                            des files : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="com_st_rf" value="Bon"
                                                {{ $ficheevaluatthision->com_st_rf == 'Bon' ? 'checked' : ''}}>
<label class="form-check-label"> Bon </label>

<input class="form-check-input" type="checkbox"  name="com_st_rf" value="Moyen"
    {{ $ficheevaluatthision->com_st_rf == 'Moyen' ? 'checked' : ''}}>
<label class="form-check-label"> Moyen </label>

<input class="form-check-input" type="checkbox"  name="com_st_rf" value="Mauvais"
    {{ $ficheevaluatthision->com_st_rf == 'Mauvais' ? 'checked' : ''}}>
<label class="form-check-label"> Mauvais </label>




</div>
</div>
</div>
</div> --}}


</div>
<div class="col-md-6">
    <h5>
        <strong>
            Sens Longitudinal (*)
        </strong>
        <br><br>

    </h5>
    <div class="container">
        <label class="col-sm-4 col-form-label">Symétrie en
            plan : </label>
        </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="Bon"
                {{ $ficheevaluatthision->com_sl_sp == 'Bon' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios1">
                Bon
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="Moyen"
                {{ $ficheevaluatthision->com_sl_sp == 'Moyen' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios2">
                Moyen
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="Mauvais"
                {{ $ficheevaluatthision->com_sl_sp == 'Mauvais' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios3">
                Mauvais
            </label>
        </div>
    </div>
    {{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Symétrie en
                                            plan : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="com_sl_sp" value="Bon"
                                                {{ $ficheevaluatthision->com_sl_sp == 'Bon' ? 'checked' : ''}}>
    <label class="form-check-label"> Bon </label>

    <input class="form-check-input" type="checkbox"  name="com_sl_sp" value="Moyen"
        {{ $ficheevaluatthision->com_sl_sp == 'Moyen' ? 'checked' : ''}}>
    <label class="form-check-label"> Moyen </label>

    <input class="form-check-input" type="checkbox"  name="com_sl_sp" value="Mauvais"
        {{ $ficheevaluatthision->com_sl_sp == 'Mauvais' ? 'checked' : ''}}>
    <label class="form-check-label"> Mauvais </label>


</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Régularité en
        élévation : </label>
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Bon"
            {{ $ficheevaluatthision->com_sl_re == 'Bon' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            Bon
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Moyen"
            {{ $ficheevaluatthision->com_sl_re == 'Moyen' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            Moyen
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Mauvais"
            {{ $ficheevaluatthision->com_sl_re == 'Mauvais' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            Mauvais
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Régularité en
                                            élévation : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="com_sl_re" value="Bon"
                                                {{ $ficheevaluatthision->com_sl_re == 'Bon' ? 'checked' : ''}}>
<label class="form-check-label"> Bon </label>

<input class="form-check-input" type="checkbox"  name="com_sl_re" value="Moyen"
    {{ $ficheevaluatthision->com_sl_re == 'Moyen' ? 'checked' : ''}}>
<label class="form-check-label"> Moyen </label>

<input class="form-check-input" type="checkbox"  name="com_sl_re" value="Mauvais"
    {{ $ficheevaluatthision->com_sl_re == 'Mauvais' ? 'checked' : ''}}>
<label class="form-check-label"> Mauvais </label>



</div>
</div>
</div>
</div> --}}
<div class="container">
    <label class="col-sm-4 col-form-label">Redondance
        des files :</label>
    </label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Bon"
            {{ $ficheevaluatthision->com_sl_rf == 'Bon' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios1">
            Bon
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Moyen"
            {{ $ficheevaluatthision->com_sl_rf == 'Moyen' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios2">
            Moyen
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox"  value="Mauvais"
            {{ $ficheevaluatthision->com_sl_rf == 'Mauvais' ? 'checked' : ''}}>
        <label class="form-check-label" for="exampleRadios3">
            Mauvais
        </label>
    </div>
</div>
{{-- <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-4 col-form-label">Redondance
                                            des files : </label>

                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox"  name="com_sl_rf" value="Bon"
                                                {{ $ficheevaluatthision->com_sl_rf == 'Bon' ? 'checked' : ''}}>
<label class="form-check-label"> Bon </label>

<input class="form-check-input" type="checkbox"  name="com_sl_rf" value="Moyen"
    {{ $ficheevaluatthision->com_sl_rf == 'Moyen' ? 'checked' : ''}}>
<label class="form-check-label"> Moyen </label>

<input class="form-check-input" type="checkbox"  name="com_sl_rf" value="Mauvais"
    {{ $ficheevaluatthision->com_sl_rf == 'Mauvais' ? 'checked' : ''}}>
<label class="form-check-label"> Mauvais </label>





</div>
</div>
</div>
</div> --}}


</div>

</div><hr>


<div class="row">
    <div class="col-md-12">



        <div class="row">
            <div class="col-md-12">

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label"><strong> AUTRES
                        COMMENTAIRES :</strong></label>
                    <div class="col-sm-8">
                        <input type="text"  class="form-control-plaintext" value="{{ $ficheevaluatthision->autre_com}}">
                    </div>
                </div>

            </div>
        </div>
<br>
    </div>
</div>
</div>
</div>


<div id="step-7" style="display: none">
    <div style="text-align:center"><a href="#step-1"><br />
            <h4 class="btn active"><strong>EVALUATION FINALE</strong></h4> <br><br>
        </a>
    </div>
    <hr>

    <h5 class="text-center">
        <strong>
            EVALUATION 
        </strong>
        <br><br>
    </h5>

    <div class="container">
        <label class="col-sm-4 col-form-label">Niveau Général des
            Dommages :</label>
        </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="VERT 1"
                {{ $ficheevaluatthision->evl_fin_gd == 'VERT 1' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios1">
               <span  @if($ficheevaluatthision->evl_fin_gd == 'VERT 1')
               style="color:#5cff78" 
               @endif>
                VERT 1
            </span>
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="VERT 2"
                {{ $ficheevaluatthision->evl_fin_gd == 'VERT 2' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios2">
                <span  @if($ficheevaluatthision->evl_fin_gd == 'VERT 2')
                    style="color:#02c021" 
                    @endif>
                    VERT 2
                </span>
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="ORANGE 3"
                {{ $ficheevaluatthision->evl_fin_gd == 'ORANGE 3' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios3">
                <span  @if($ficheevaluatthision->evl_fin_gd == 'ORANGE 3')
                    style="color:#ffba53" 
                    @endif>
                    ORANGE 3
                </span>
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="ORANGE 4"
                {{ $ficheevaluatthision->evl_fin_gd == 'ORANGE 4' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios2">
                <span  @if($ficheevaluatthision->evl_fin_gd == 'ORANGE 4')
                    style="color:#ff7b00" 
                    @endif>
                    ORANGE 4
                </span>
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox"  value="ROUGE 5" 
                {{ $ficheevaluatthision->evl_fin_gd == 'ROUGE 5' ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleRadios3">
                <span  @if($ficheevaluatthision->evl_fin_gd == 'ROUGE 5')
                    style="color:#f00" 
                    @endif>
                    ROUGE 5
                </span>
            </label>
        </div>
    </div>
    {{-- <div class="row">
                    <div class="col-md-12">

                        <div class="form-group row">

                            <label for="inputPassword" class="col-sm-5 col-form-label"> Niveau Général des
                                Dommages </label>

                            <div class="col-sm-7">

                                <input class="form-check-input" type="checkbox"  name="evl_fin_gd" value="VERT 1"
                                    {{ $ficheevaluatthision->evl_fin_gd == 'VERT 1' ? 'checked' : ''}}>
    <label class="form-check-label"> VERT 1 </label>

    <input class="form-check-input" type="checkbox"  name="evl_fin_gd" value="VERT 2"
        {{ $ficheevaluatthision->evl_fin_gd == 'VERT 2' ? 'checked' : ''}}>
    <label class="form-check-label"> VERT 2 </label>

    <input class="form-check-input" type="checkbox"  name="evl_fin_gd" value="ORANGE 3"
        {{ $ficheevaluatthision->evl_fin_gd == 'ORANGE 3' ? 'checked' : ''}}>
    <label class="form-check-label"> ORANGE 3 </label>

    <input class="form-check-input" type="checkbox"  name="evl_fin_gd" value="ORANGE 4"
        {{ $ficheevaluatthision->evl_fin_gd == 'ORANGE 4' ? 'checked' : ''}}>
    <label class="form-check-label"> ORANGE 4 </label>

    <input class="form-check-input" type="checkbox"  name="evl_fin_gd" value="ROUGE 5"
        {{ $ficheevaluatthision->evl_fin_gd == 'ROUGE 5' ? 'checked' : ''}}>
    <label class="form-check-label"> ROUGE 5 </label>



</div>
</div>
</div>
</div> --}}
<hr>
<h5 class="text-center">
    <strong>
        MESURES IMMEDIATES A PRENDRE
    </strong>
    <br><br>
</h5>
<div class="col-sm-7">
    <input type="text"  name="ilot" value="{{ $ficheevaluatthision->mesure_imm}}" class="form-control-plaintext" placeholder="">
</div>
<br>
{{-- <div class=" text-center" >

        <div class="form-group row">

            <label for="inputPassword" class="col-sm-5 col-form-label" ><strong> MESURES IMMEDIATES A
                PRENDRE </strong></label>

            <div class="col-sm-7">
                <input type="text"  name="ilot" value="" class="form-control-plaintext" placeholder="">
            </div>
        </div>
  
</div> --}}



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
        var step7 = document.getElementById("step-7");


        var id1 = document.getElementById("b1");
        var id2 = document.getElementById("b2");
        var id3 = document.getElementById("b3");
        var id4 = document.getElementById("b4");
        var id5 = document.getElementById("b5");
        var id6 = document.getElementById("b6");
        var id7 = document.getElementById("b7");


        step1.style.display = "block";
        step2.style.display = "none";
        step3.style.display = "none";
        step4.style.display = "none";
        step5.style.display = "none";
        step6.style.display = "none";
        step7.style.display = "none";


        e.classList.remove("active");
        id2.classList.remove("active");
        id3.classList.remove("active");
        id4.classList.remove("active");
        id5.classList.remove("active");
        id6.classList.remove("active");
        id7.classList.remove("active");

        // e.classList.remove("active");
        // id2.classList.remove("active");
        // id3.classList.remove("active");
        // id4.classList.remove("active");
        // id5.classList.remove("active");
        // id6.classList.remove("active");
        // id7.classList.remove("active");



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
        var step7 = document.getElementById("step-7");


        var id1 = document.getElementById("b1");
        var id2 = document.getElementById("b2");
        var id3 = document.getElementById("b3");
        var id4 = document.getElementById("b4");
        var id5 = document.getElementById("b5");
        var id6 = document.getElementById("b6");
        var id7 = document.getElementById("b7");




        step1.style.display = "none";
        step2.style.display = "block";
        step3.style.display = "none";
        step4.style.display = "none";
        step5.style.display = "none";
        step6.style.display = "none";
        step7.style.display = "none";




        e.classList.remove("active");
        id1.classList.remove("active");
        id3.classList.remove("active");
        id4.classList.remove("active");
        id5.classList.remove("active");
        id6.classList.remove("active");
        id7.classList.remove("active");

        // e.classList.remove("active");
        // id1.classList.remove("active");
        // id3.classList.remove("active");
        // id4.classList.remove("active");
        // id5.classList.remove("active");
        // id6.classList.remove("active");


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
        var step7 = document.getElementById("step-7");


        var id1 = document.getElementById("b1");
        var id2 = document.getElementById("b2");
        var id3 = document.getElementById("b3");
        var id4 = document.getElementById("b4");
        var id5 = document.getElementById("b5");
        var id6 = document.getElementById("b6");
        var id7 = document.getElementById("b7");




        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "block";
        step4.style.display = "none";
        step5.style.display = "none";
        step6.style.display = "none";
        step7.style.display = "none";


        e.classList.remove("active");
        id1.classList.remove("active");
        id2.classList.remove("active");
        id4.classList.remove("active");
        id5.classList.remove("active");
        id6.classList.remove("active");
        id7.classList.remove("active");

        // e.classList.remove("active");
        // id1.classList.remove("active");
        // id2.classList.remove("active");
        // id4.classList.remove("active");
        // id5.classList.remove("active");
        // id6.classList.remove("active");


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
        var step7 = document.getElementById("step-7");


        var id1 = document.getElementById("b1");
        var id2 = document.getElementById("b2");
        var id3 = document.getElementById("b3");
        var id4 = document.getElementById("b4");
        var id5 = document.getElementById("b5");
        var id6 = document.getElementById("b6");
        var id7 = document.getElementById("b7");




        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "none";
        step4.style.display = "block";
        step5.style.display = "none";
        step6.style.display = "none";
        step7.style.display = "none";


        e.classList.remove("active");
        id1.classList.remove("active");
        id3.classList.remove("active");
        id2.classList.remove("active");
        id5.classList.remove("active");
        id6.classList.remove("active");
        id7.classList.remove("active");

        // e.classList.remove("active");
        // id1.classList.remove("active");
        // id3.classList.remove("active");
        // id2.classList.remove("active");
        // id5.classList.remove("active");
        // id6.classList.remove("active");


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
        var step7 = document.getElementById("step-7");


        var id1 = document.getElementById("b1");
        var id2 = document.getElementById("b2");
        var id3 = document.getElementById("b3");
        var id4 = document.getElementById("b4");
        var id5 = document.getElementById("b5");
        var id6 = document.getElementById("b6");
        var id7 = document.getElementById("b7");



        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "none";
        step4.style.display = "none";
        step5.style.display = "block";
        step6.style.display = "none";
        step7.style.display = "none";


        e.classList.remove("active");
        id1.classList.remove("active");
        id3.classList.remove("active");
        id4.classList.remove("active");
        id2.classList.remove("active");
        id6.classList.remove("active");
        id7.classList.remove("active");

        // e.classList.remove("active");
        // id1.classList.remove("active");
        // id3.classList.remove("active");
        // id4.classList.remove("active");
        // id2.classList.remove("active");
        // id6.classList.remove("active");


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
        var step7 = document.getElementById("step-7");


        var id1 = document.getElementById("b1");
        var id2 = document.getElementById("b2");
        var id3 = document.getElementById("b3");
        var id4 = document.getElementById("b4");
        var id5 = document.getElementById("b5");
        var id6 = document.getElementById("b6");
        var id7 = document.getElementById("b7");



        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "none";
        step4.style.display = "none";
        step5.style.display = "none";
        step6.style.display = "block";
        step7.style.display = "none";


        e.classList.remove("active");
        id1.classList.remove("active");
        id3.classList.remove("active");
        id4.classList.remove("active");
        id5.classList.remove("active");
        id2.classList.remove("active");
        id7.classList.remove("active");


        // e.classList.remove("active");
        // id1.classList.remove("active");
        // id3.classList.remove("active");
        // id4.classList.remove("active");
        // id5.classList.remove("active");
        // id2.classList.remove("active");


        e.classList.add("active");
        // id1.classList.add("active")
        // id3.classList.add("active")
        // id4.classList.add("active")
        // id5.classList.add("active")
        // id2.classList.add("active")

    }

    function afficherstep7(e) {
        var step1 = document.getElementById("step-1");
        var step2 = document.getElementById("step-2");
        var step3 = document.getElementById("step-3");
        var step4 = document.getElementById("step-4");
        var step5 = document.getElementById("step-5");
        var step6 = document.getElementById("step-6");
        var step7 = document.getElementById("step-7");


        var id1 = document.getElementById("b1");
        var id2 = document.getElementById("b2");
        var id3 = document.getElementById("b3");
        var id4 = document.getElementById("b4");
        var id5 = document.getElementById("b5");
        var id6 = document.getElementById("b6");
        var id7 = document.getElementById("b7");




        step1.style.display = "none";
        step2.style.display = "none";
        step3.style.display = "none";
        step4.style.display = "none";
        step5.style.display = "none";
        step6.style.display = "none";
        step7.style.display = "block";




        e.classList.remove("active");
        id1.classList.remove("active");
        id3.classList.remove("active");
        id4.classList.remove("active");
        id5.classList.remove("active");
        id6.classList.remove("active");
        id2.classList.remove("active");

        // e.classList.remove("active");
        // id1.classList.remove("active");
        // id3.classList.remove("active");
        // id4.classList.remove("active");
        // id5.classList.remove("active");
        // id6.classList.remove("active");


        e.classList.add("active");
        // id1.classList.add("active")
        // id3.classList.add("active")
        // id4.classList.add("active")
        // id5.classList.add("active")
        // id6.classList.add("active")



    }

</script>

@endsection
