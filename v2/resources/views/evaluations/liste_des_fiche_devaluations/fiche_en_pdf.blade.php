<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        .text-purple {
            color : rgb(0, 2, 102)
        }
        @media print {
              .noPrint{
                display:none;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
    <div class="container">
        <button class="btn btn-primary form-control noPrint mt-2" onclick="window.print();"><i class="fas fa-print"></i> Imprimer</button>
    </div>
    <div class="container" style="pointer-events:none">
        
        <div style="border: 1px black solid ; background-color: #a6c9fd;" class="py-1 my-2">
            <h5 class="text-center text-purple">WILAYA DE : {{$ficheevaluatthision->wilaya}}</h5>
        </div>
        <div class="float-right mr-4">
            <strong>N° </strong>{{$ficheevaluatthision->code_fiche}}
        </div>
        <br/>
        <div style="border: 1px black solid ; background-color: #a6c9fd;" class="py-1 mt-2">
            <h5 class="text-center text-purple">FICHE D'EVALUATION DES DOMMAGES <br/> ... DU  {{ date('d-m-Y', strtotime($ficheevaluatthision->date_fiche)) }}</h5>            
        </div>
        <div style="border: 1px black solid ; border-top: white; " class="py-2 px-2">
            <div class="float-right"> Date : {{ date('d-m-Y', strtotime($ficheevaluatthision->date_fiche)) }}</div>
            <div>Code inspecteur : {{ $ficheevaluatthision->cod_inp_a  }}</div>
        </div>
        <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
            <h6 class="ml-2 text-purple">IDENTIFICATION DE LA CONSTRUCTION</h6>
        </div>
        <div style="border: 1px black solid ; border-top: white; " class="pt-2 pl-2">
            <div>
                <div class="float-right">
                    Construction Calculée au Séisme : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->const_clc == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->const_clc == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                    <p class="text-left">Secteur : ...  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Zone : ...</span></p>                
                </div>
            </div>
            <div>
                <div class="float-right">
                    Construction Contrôlée : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->const_cont == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->const_cont == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                    <p class="text-left">Adresse ou Eléments d’Identification  : ...  </p>                
                </div>
            </div>
        </div>
        <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
            <h6 class="ml-2 text-purple">USAGE DE LA CONSTRUCTION</h6>
        </div>
        <div style="border: 1px black solid ; border-top: white; " class="pt-2 pl-2">
            <div class="form-row">
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Logement' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Logement</label>
                </div>
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Scolaire' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Scolaire</label>
                </div>
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Commercial' ? 'checked' : ''}} >
                    <label class="form-check-label" for="inlineCheckbox3">Commercial</label>
                </div> 
            </div>
            <div class="form-row">
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Administratif' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Administratif</label>
                </div>
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Hospitalier' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Hospitalier</label>
                </div>
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Industriel' ? 'checked' : ''}} >
                    <label class="form-check-label" for="inlineCheckbox3">Industriel</label>
                </div> 
            </div>
            <div class="form-row">
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Socioculturel' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Socioculturel</label>
                </div>
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Sportif' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Sportif</label>
                </div>
                <div class="form-check form-check-inline col">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="{{$ficheevaluatthision->usage}}"
                    {{ $ficheevaluatthision->usage == 'Réservoir d’eau' ? 'checked' : ''}} >
                    <label class="form-check-label" for="inlineCheckbox3">Réservoir d’eau</label>
                </div> 
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="{{$ficheevaluatthision->usage}}"
                {{ $ficheevaluatthision->usage == 'Autre' ? 'checked' : ''}} >
                <label class="form-check-label" for="inlineCheckbox3">Autre (à préciser) : ...</label>
            </div>

        </div>
        <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
            <h6 class="ml-2 text-purple">DESCRIPTION SOMMAIRE</h6>
        </div>
        <div style="border: 1px black solid ; border-top: white; " class="pt-2 pl-2">
            <div>
                <div class="float-right">
                    Vide Sanitaire  : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->v_san == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->v_san == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                    <p class="text-left">Age Approximatif : {{$ficheevaluatthision->age_app}}</p>                
                </div>
            </div>
            <div>
                <div class="float-right">
                    Sous-sol : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->sou_sol == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->sou_sol == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                    <p class="text-left">Nombr/e de Niveaux : {{$ficheevaluatthision->nb_niv}}  </p>                
                </div>
            </div>
            <div>
                <div class="float-right mr-3 "> <strong> Eléments extérieurs indépendants : </strong> </div>
                <div> <strong> Nombr/e de Joints de Dilatation : </strong> </div>
            </div>
            <div>
                <div class="float-right">
                    Escaliers : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->elem_ext_e == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->elem_ext_e == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                    <p class="text-left">En élévation  : {{$ficheevaluatthision->nb_join_el}} </p>                
                </div>
                
            </div>   
            <div>
                <div class="float-right">
                    Auvent : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->elem_ext_a == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->elem_ext_a == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                    <p class="text-left">Infrastructure  : {{$ficheevaluatthision->nb_join_in}}  </p>                
                </div>                
            </div>   
            <div>
                <div class="float-right">
                    Passage Couvert : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->elem_ext_p == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->elem_ext_p == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                    <p class="text-left text-white">&nbsp;</p>                
                </div>                
            </div>   
        </div>
        <div style="border: 1px black solid ; border-top: white; " class="pt-1 pl-2 pb-2">
            <div>
                Problème de Sol autour de la Construction (*) </strong>
            </div>
            <div>
                <div class="float-right">
                   <strong> Affaissement / Soulèvement  : </strong> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->affaisse_s == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->affaisse_s == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                    <strong> Faille  : </strong> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                        {{ $ficheevaluatthision->faille == 'oui' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                        {{ $ficheevaluatthision->faille == 'non' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">Non</label>
                    </div>                
                </div>
            </div>
            <div>
                <div class="float-right">
                    <strong> Glissement  : </strong>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->gliss == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->gliss == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>

                </div>
                <div class="">
                <strong>   Liquéfaction  : </strong>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                        {{ $ficheevaluatthision->liquefa == 'oui' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                        {{ $ficheevaluatthision->liquefa == 'non' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">Non</label>
                    </div>                
                </div>
            </div>

        </div>
        <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
            <h6 class="ml-2 text-purple">FONDATIONS – INFRASTRUCTURE</h6>
        </div>
        <div style="border: 1px black solid ; border-top: white; " class="pt-1 pl-2 pb-2">
            <div>
                <div class="float-right mr-3 "> <strong> Infrastructure : </strong> (dans le cas VS ou S/Sol)</div>
                <div> <strong> Fondations : </strong> </div>
                <div> Type de Fondations : {{$ficheevaluatthision->fond_type}} </div>
            </div>
            <div>
                <div class="float-right">
                    Voile Béton Continu : &nbsp;
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->infr_voil == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->infr_voil == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->infr_voil == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->infr_voil == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->infr_voil == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>

                </div>
                <div class="">
                    <p class="text-left"><strong>Type de Dommages</strong></p>                
                </div>
                
            </div> 
            <div>
                <div class="float-right">
                   Poteaux Béton avec Remplissage  : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->infr_po_re == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->infr_po_re == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->infr_po_re == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->infr_po_re == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->infr_po_re == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>

                </div>
                 
            </div>
            <div class="">
                <p>&nbsp;</p>               
            </div>
            <div class="">
                <strong> Tassement Uniforme  : </strong> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->fon_dom_ta == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->fon_dom_ta == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>                
            </div>
            <div class="">
                <strong> Glissement  : </strong> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->fon_dom_gl == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->fon_dom_gl == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>                
            </div>
            <div class="">
                <strong> Basculement  : </strong> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                    {{ $ficheevaluatthision->fon_dom_bs == 'oui' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                    {{ $ficheevaluatthision->fon_dom_bs == 'non' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">Non</label>
                </div>                
            </div>
        </div>
        <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
            <h6 class="ml-2 text-purple">STRUCTURE RESISTANTE</h6>
        </div>
        <div style="border: 1px black solid ; border-top: white; " class="pt-1 pl-2 pb-2">
            <div>
                <div class="float-right mr-3 "><strong> Elément de contreventement : </strong></div>
                <div><strong> Elément porteur </strong> (charges verticales) :</div>                
            </div>
            <div>
                <div class="float-right">
                    Murs en maçonnerie : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->el_ctv_m_m == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->el_ctv_m_m == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->el_ctv_m_m == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->el_ctv_m_m == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->el_ctv_m_m == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>

                </div>
                <div class="">
                    Murs en maçonnerie : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->str_e_p_m == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->str_e_p_m == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->str_e_p_m == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->str_e_p_m == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->str_e_p_m == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>               
                </div>
            </div>
            <div>
                <div class="float-right">
                    Voile Béton : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->el_ctv_v_b == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->el_ctv_v_b == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->el_ctv_v_b == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->el_ctv_v_b == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->el_ctv_v_b == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>

                </div>
                <div class="">
                    Voile Béton : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->str_e_p_vb == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->str_e_p_vb == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->str_e_p_vb == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->str_e_p_vb == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->str_e_p_vb == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>               
                </div>
            </div>
            <div>
                <div class="float-right">
                    Portiques Béton Armé : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->el_ctv_p_b == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->el_ctv_p_b == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->el_ctv_p_b == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->el_ctv_p_b == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->el_ctv_p_b == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>

                </div>
                <div class="">
                    Poteaux Béton : .......
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ null == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->val_in_a == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="3"
                    {{ $ficheevaluatthision->val_in_a == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->val_in_a == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->val_in_a == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>               
                </div>
            </div>
            <div>
                <div class="float-right">
                    Portiques Métalliques : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->el_ctv_p_m == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->el_ctv_p_m == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->el_ctv_p_m == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->el_ctv_p_m == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->el_ctv_p_m == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>

                </div>
                <div class="">
                    Poteaux Métalliques : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->str_e_p_mt == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->str_e_p_mt == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->str_e_p_mt == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->str_e_p_mt == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="5"
                    {{ $ficheevaluatthision->str_e_p_mt == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>               
                </div>
            </div>
            <div>
                <div class="float-right">
                    Palées Triangulées : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->el_ctv_pa_ == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->el_ctv_pa_ == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->el_ctv_pa_ == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->el_ctv_pa_ == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->el_ctv_pa_ == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>

                </div>
                <div class="">
                    Poteaux Bois : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->str_e_p_b == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->str_e_p_b == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->str_e_p_b == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->str_e_p_b == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>               
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->str_e_p_b == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>               
                </div>
            </div>
            <div>
                <div class="float-right">
                    Autres : 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                    {{ $ficheevaluatthision->el_ctv_au == '1' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                    {{ $ficheevaluatthision->el_ctv_au == '2' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                    {{ $ficheevaluatthision->el_ctv_au == '3' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                    {{ $ficheevaluatthision->el_ctv_au == '4' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                    {{ $ficheevaluatthision->el_ctv_au == '5' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                </div>

                </div>
                <div class="">
                    Autres: 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                        {{ $ficheevaluatthision->str_e_p_au == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                        {{ $ficheevaluatthision->str_e_p_au == '2' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                        {{ $ficheevaluatthision->str_e_p_au == '3' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                        {{ $ficheevaluatthision->str_e_p_au == '4' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                        {{ $ficheevaluatthision->str_e_p_au == '5' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineCheckbox2">5</label>
                    </div>          
                </div> <br/>


                
                
                </div>
                <div>
                    <div class="float-right mr-3 "><strong> Toiture inclinée : </strong></div>
                    <div><strong>  Planchers-toiture terrasse : </strong></div>                
                </div>
                
                <div class="form-row">
                    <div class="col">
                        <div class="">
                            Béton Armé: 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->plan_tr__1 == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->plan_tr__1 == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->plan_tr__1 == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->plan_tr__1 == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->plan_tr__1 == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>                
                        </div>
                    </div>
                    <div class="col text-right">
                        <div class="">
                            Charpente Métallique: 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->t_in_c_m == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->t_in_c_m == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->t_in_c_m == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->t_in_c_m == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->t_in_c_m == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>               
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="">
                            Solives Métalliques: 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->plan_tr_s_ == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->plan_tr_s_ == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->plan_tr_s_ == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->plan_tr_s_ == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->plan_tr_s_ == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>              
                        </div>
                    </div>
                    <div class="col text-right">
                        <div class="">
                            Charpente Bois: 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->t_in_c_b == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->t_in_c_b == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->t_in_c_b == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->t_in_c_b == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->t_in_c_b == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>     
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="">
                            Solives Bois: 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->plan_tr_b == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->plan_tr_b == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->plan_tr_b == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->plan_tr_b == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->plan_tr_b == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>            
                        </div>
                    </div>
                    <div class="col text-right">
                        <div class="">
                            Couverture Tuile: 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->t_in_cv_t == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->t_in_cv_t == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->t_in_cv_t == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->t_in_cv_t == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->t_in_cv_t == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>                 
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="">
                            &nbsp;
                                           
                        </div>
                    </div>
                    <div class="col text-right">
                        <div class="">
                            Couverture Amiante Ciment: 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->t_in_cv_am == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->t_in_cv_am == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->t_in_cv_am == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->t_in_cv_am == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->t_in_cv_am == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>                           
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="">
                            &nbsp;
                                           
                        </div>
                    </div>
                    <div class="col text-right">
                        <div class="">
                            Couverture Métallique: 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->t_in_cv_me == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->t_in_cv_me == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->t_in_cv_me == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->t_in_cv_me == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->t_in_cv_me == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>                 
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="row mt-5">
                <div class="col d-flex justify-content-end">
                    <strong>N° </strong>{{$ficheevaluatthision->code_fiche}}
                </div>
            </div>
            <br/>
            <div style="border: 1px black solid ;  background-color: #a6c9fd;" class="py-1 mt-2">
                <h6 class="ml-2 text-purple">ELEMENTS SECONDAIRES</h6>
            </div>
            <div style="border: 1px black solid ; border-top: white; " class="pt-1 pl-2 pb-2">
                <div>
                    <div class="float-right mr-3 "><strong > Remplissage Extérieur : </strong></div>
                    <div><strong> Escaliers </strong> (charges verticales) :</div>                
                </div>
                <div>
                    <div class="float-right">
                        Maçonnerie : 
                     <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_r_m == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_r_m == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_r_m == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_r_m == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_r_m == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>                 
    
                    </div>
                    <div class="">
                        Béton : 
                     <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_es_be == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_es_be == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_es_be == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_es_be == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_es_be == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>                          
                    </div>
                </div>
                <div>
                    <div class="float-right">
                        Béton préfabriqué : 
                     <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_r_bt == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_r_bt == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_r_bt == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_r_bt == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_r_bt == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>                 
    
                    </div>
                    <div class="">
                        Métal : 
                     <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_es_m == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_es_m == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_es_m == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_es_m == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_es_m == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>             
                    </div>
                </div>
                <div>
                    <div class="float-right">
                        Bardages : 
                     <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_r_ba == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_r_ba == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_r_ba == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_r_ba == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_r_ba == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>      
    
                    </div>
                    <div class="">
                        Bois :
                     <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_es_b == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_es_b == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_es_b == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_es_b == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_es_b == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>        
                    </div>
                </div>
                <div>
                    <div class="float-right">
                        Autres : 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                            {{ $ficheevaluatthision->el_s_r_au == '1' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                            {{ $ficheevaluatthision->el_s_r_au == '2' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                            {{ $ficheevaluatthision->el_s_r_au == '3' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                            {{ $ficheevaluatthision->el_s_r_au == '4' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                            {{ $ficheevaluatthision->el_s_r_au == '5' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">5</label>
                        </div>      
    
                    </div>
                    <div class="">
                        &nbsp;
                                   
                    </div>
                </div>
                
                <div>
                <br/>
    
    
                    
                    
                    </div>
                    <div>
                        <div class="float-right mr-3 "><strong> Eléments Extérieurs : </strong></div>
                        <div><strong>  Autres Eléments Intérieurs : </strong></div>                
                    </div>
                    
                    <div class="form-row">
                        <div class="col">
                            <div class="">
                                Plafonds: 
                                 <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_in_p == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_in_p == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_in_p == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_in_p == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_in_p == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>              
                            </div>
                        </div>
                        <div class="col text-right">
                            <div class="">
                                Balcons: 
                                 <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_ex_b == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_ex_b == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_ex_b == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_ex_b == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_ex_b == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>             
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="">
                                Cloisons: 
                               <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_in_c == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_in_c == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_in_c == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_in_c == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_in_c == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>           
                            </div>
                        </div>
                        <div class="col text-right">
                            <div class="">
                                Garde-corps: 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                    {{ $ficheevaluatthision->el_s_ex_ga == '1' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                    {{ $ficheevaluatthision->el_s_ex_ga == '2' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                    {{ $ficheevaluatthision->el_s_ex_ga == '3' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                    {{ $ficheevaluatthision->el_s_ex_ga == '4' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                    {{ $ficheevaluatthision->el_s_ex_ga == '5' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">5</label>
                                </div>         
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="">
                                Eléments Vitrés: 
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_in_v == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_in_v == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_in_v == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_in_v == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_in_v == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>      
                            </div>
                        </div>
                        <div class="col text-right">
                            <div class="">
                                Auvent: 
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_ex_av == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_ex_av == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_ex_av == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_ex_av == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_ex_av == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>        
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="">
                                &nbsp;
                                               
                            </div>
                        </div>
                        <div class="col text-right">
                            <div class="">
                                Acrotères – Corniches: 
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_ex_ac == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_ex_ac == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_ex_ac == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_ex_ac == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_ex_ac == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>            
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="">
                                &nbsp;
                                               
                            </div>
                        </div>
                        <div class="col text-right">
                            <div class="">
                                Cheminées: 
                                 <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_ex_ch == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_ex_ch == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_ex_ch == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_ex_ch == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_ex_ch == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>            
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="">
                                &nbsp;
                                               
                            </div>
                        </div>
                        <div class="col text-right">
                            <div class="">
                                Autres: 
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"
                                {{ $ficheevaluatthision->el_s_r_au == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2"
                                {{ $ficheevaluatthision->el_s_r_au == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3"
                                {{ $ficheevaluatthision->el_s_r_au == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="4"
                                {{ $ficheevaluatthision->el_s_r_au == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="5"
                                {{ $ficheevaluatthision->el_s_r_au == '5' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">5</label>
                            </div>       
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
                
                
                <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
                    <h6 class="ml-2 text-purple">INFLUENCE DES CONSTRUCTIONS ADJACENTES</h6>
                </div>
                <div style="border: 1px black solid ; border-top: white; " class="py-2 px-2">
                    <div>
                        La construction menace une autre construction : 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                            {{ $ficheevaluatthision->if_c_a_m_c == 'oui' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">oui</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                            {{ $ficheevaluatthision->if_c_a_m_c == 'non' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">non</label>
                          </div>
                    </div>
                    <div>
                        La construction est menacée par une autre construction : 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                            {{ $ficheevaluatthision->if_c_a_emc == 'oui' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">oui</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                            {{ $ficheevaluatthision->if_c_a_emc == 'non' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">non</label>
                          </div>
                    </div>
                    <div>
                        La construction peut être un soutien à une autre construction : 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                            {{ $ficheevaluatthision->if_c_a_spc == 'oui' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">oui</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                            {{ $ficheevaluatthision->if_c_a_spc == 'non' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">non</label>
                          </div>
                    </div>
                    <div>
                        La construction peut être soutenue par une autre construction : 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                            {{ $ficheevaluatthision->el_s_ex_av == 'oui' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">oui</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                            {{ $ficheevaluatthision->el_s_ex_av == 'non' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">non</label>
                          </div>
                    </div>
                </div>
                <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
                    <h6 class="ml-2 text-purple">INFLUENCE DES CONSTRUCTIONS ADJACENTES</h6>
                </div>
                <div style="border: 1px black solid ; border-top: white; " class="py-2 px-2">
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="oui"
                                {{ $ficheevaluatthision->victime == 'oui' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="non"
                                {{ $ficheevaluatthision->victime == 'non' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">Non</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="peut-être"
                                {{ $ficheevaluatthision->victime == 'peut-être' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">Peut-être</label>
                              </div>
                        </div>
                        <div class="col">
                            Si oui combien ? {{$ficheevaluatthision->nb_victime}}

                        </div>
                    </div>
                </div>
                <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
                    <h6 class="ml-2 text-purple">COMMENTAIRES SUR LA NATURE ET LA CAUSE PROBABLE DES DOMMAEGES</h6>
                </div>
                <div style="border: 1px black solid ; border-top: white; " class="py-2 px-2">
                   <div class="row">
                       <div class="col">
                           <strong>Sens Transversal (*)</strong>
                        </div>
                        <div class="col">
                           <strong>Sens Longitudinal (*)</strong>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col">
                        Symétrie en plan : 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Bon"
                            {{ $ficheevaluatthision->com_st_sp == 'Bon' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">Bon</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"  value="Moyen"
                            {{ $ficheevaluatthision->com_st_sp == 'Moyen' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Moyen</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Mauvais"
                            {{ $ficheevaluatthision->com_st_sp == 'Mauvais' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Mauvais</label>
                          </div>
                       </div>
                       <div class="col">
                         
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="Bon"
                            {{ $ficheevaluatthision->com_sl_sp == 'Bon' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">Bon</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Moyen"
                            {{ $ficheevaluatthision->com_sl_sp == 'Moyen' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Moyen</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Mauvais"
                            {{ $ficheevaluatthision->com_sl_sp == 'Mauvais' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Mauvais</label>
                          </div>
                       </div>
                    </div>
                   <div class="row">
                       <div class="col">
                        Régularité en élévation : 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Bon"
                            {{ $ficheevaluatthision->com_st_re == 'Bon' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">Bon</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Moyen"
                            {{ $ficheevaluatthision->com_st_re == 'Moyen' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Moyen</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Mauvais"
                            {{ $ficheevaluatthision->com_st_re == 'Mauvais' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Mauvais</label>
                          </div>
                       </div>
                       <div class="col">
                         
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Bon"
                            {{ $ficheevaluatthision->com_sl_re == 'Bon' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">Bon</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Moyen"
                            {{ $ficheevaluatthision->com_sl_re == 'Moyen' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Moyen</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Mauvais"
                            {{ $ficheevaluatthision->com_sl_re == 'Mauvais' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Mauvais</label>
                          </div>
                       </div>
                    </div>
                   <div class="row">
                       <div class="col">
                        Redondance des files : 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Bon"
                            {{ $ficheevaluatthision->com_st_rf == 'Bon' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">Bon</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Moyen"
                            {{ $ficheevaluatthision->com_st_rf == 'Moyen' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Moyen</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Mauvais"
                            {{ $ficheevaluatthision->com_st_rf == 'Mauvais' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Mauvais</label>
                          </div>
                       </div>
                       <div class="col">
                         
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Bon"
                            {{ $ficheevaluatthision->com_sl_rf == 'Bon' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox1">Bon</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Moyen"
                            {{ $ficheevaluatthision->com_sl_rf == 'Moyen' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Moyen</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Mauvais"
                            {{ $ficheevaluatthision->com_sl_rf == 'Mauvais' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineCheckbox2">Mauvais</label>
                          </div>
                       </div>
                    </div>
                   </div>
                   <div style="border: 1px black solid ; border-top: white; " class="pt-2 px-2 pb-5">
                    <h6 class="ml-2 text-purple mb-5">AUTRES COMMENTAIRES :</h6>
                    <div class="my-5">&nbsp;{{ $ficheevaluatthision->autre_com}}</div>
                   </div>
                   <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
                    <h6 class="ml-2 text-purple">EVALUATION FINALE</h6>
                    </div>
                    <div style="border: 1px black solid ; border-top: white; " class="py-2 px-2">
                        <h6 class="ml-2 text-purple ">Niveau Général des Dommages</h6>
                        <div class="row my-2">
                            <div class="col ml-4">
                                <div class="form-check form-check-inline  mr-5">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="VERT 1"
                                    {{ $ficheevaluatthision->evl_fin_gd == 'VERT 1' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox1">VERT 1</label>
                                  </div>
                                  <div class="form-check form-check-inline  mr-5">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="VERT 2"
                                    {{ $ficheevaluatthision->evl_fin_gd == 'VERT 2' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">VERT 2</label>
                                  </div>
                                  <div class="form-check form-check-inline  mr-5">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="ORANGE 3"
                                    {{ $ficheevaluatthision->evl_fin_gd == 'ORANGE 3' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">ORANGE 3</label>
                                  </div>
                                  <div class="form-check form-check-inline  mr-5">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="ORANGE 4"
                                    {{ $ficheevaluatthision->evl_fin_gd == 'ORANGE 4' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">ORANGE 4</label>
                                  </div>
                                  <div class="form-check form-check-inline  mr-5">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="ROUGE 5"
                                    {{ $ficheevaluatthision->evl_fin_gd == 'ROUGE 5' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">ROUGE 5</label>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div style="border: 1px black solid ; border-top: white; background-color: #a6c9fd;" class="py-1 ">
                        <h6 class="ml-2 text-purple">MESURES IMMEDIATES A PRENDRE :</h6>
                    </div>
                    <div style="border: 1px black solid ; border-top: white; " class="py-5 px-2">
                        <div class="my-5">&nbsp;...</div>
                    </div>
                    
                </div>
                <div class="container mb-2">
                    <button class="btn btn-primary form-control noPrint mt-2" onclick="window.print();"><i class="fas fa-print"></i> Imprimer</button>
                </div>

            </div>
            
        </div>
        
    </div>
    
    
</body>
</html>