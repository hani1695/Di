@php
    // dd(Route::currentRouteName());
    function tableauDebordLi () {
        if (empty(Route::currentRouteName()))
            return 'active';
    }
    /*------------------------------------------------------------------------------------------------------------------*/
    function comptes ($e) {
        if (Route::currentRouteName() == "utilisateur.index" && $e=="show")
            return $e;
        elseif(Route::currentRouteName() == "utilisateur.index" && $e=="active")
            return $e;
        elseif(Route::currentRouteName() == "utilisateur.index" && $e=="text-active")
            return $e;
    }
    function profils ($e) {

        if(Route::currentRouteName() == "securite" && $e=="show")
            return $e;
        elseif(Route::currentRouteName() == "securite" && $e=="active")
            return $e;
        elseif(Route::currentRouteName() == "securite" && $e=="text-active")
            return $e;
    }
     /*--------------------------------------------------------------------------------------------------------------------*/
    function organisme ($e) {

    if(Route::currentRouteName() == "tbase.organisme" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "tbase.organisme" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "tbase.organisme" && $e=="text-active")
        return $e;
    }
    function direction ($e) {

    if (Route::currentRouteName() == "tbase.direction" && $e=="show")
        return $e;
    elseif (Route::currentRouteName() == "tbase.direction" && $e=="active")
        return $e;
    elseif (Route::currentRouteName() == "tbase.direction" && $e=="text-active")
        return $e;
    }
    function structure ($e) {

    if(Route::currentRouteName() == "tbase.structure" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "tbase.structure" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "tbase.structure" && $e=="text-active")
        return $e;
    }
    /*------------------------------------------------------------------------------------------------------------------------*/
    function wilaya ($e) {

        if(Route::currentRouteName() == "wilaya.index" && $e=="show")
            return $e;
        elseif(Route::currentRouteName() == "wilaya.index" && $e=="active")
            return $e;
        elseif(Route::currentRouteName() == "wilaya.index" && $e=="text-active")
            return $e;
    }
    function daira ($e) {

        if(Route::currentRouteName() == "daira.index" && $e=="show")
            return $e;
        elseif(Route::currentRouteName() == "daira.index" && $e=="active")
            return $e;
        elseif(Route::currentRouteName() == "daira.index" && $e=="text-active")
            return $e;
    }
    function commune ($e) {

        if(Route::currentRouteName() == "commune.index" && $e=="show")
            return $e;
        elseif(Route::currentRouteName() == "commune.index" && $e=="active")
            return $e;
        elseif(Route::currentRouteName() == "commune.index" && $e=="text-active")
            return $e;
    }
    /*---------------------------------------------------------------------------------------*/
    function district ($e) {

    if(Route::currentRouteName() == "district.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "district.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "district.index" && $e=="text-active")
        return $e;
    }
    function ilot ($e) {

    if(Route::currentRouteName() == "ilot.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "ilot.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "ilot.index" && $e=="text-active")
        return $e;
    }
    function routier ($e) {

    if(Route::currentRouteName() == "routier.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "routier.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "routier.index" && $e=="text-active")
        return $e;
    }
    function construction ($e) {

    if(Route::currentRouteName() == "construction.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "construction.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "construction.index" && $e=="text-active")
        return $e;
    }
    /*------------------------------------------------------------------------------------------*/
    function evenement ($e) {

    if(Route::currentRouteName() == "evenements.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "evenements.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "evenements.index" && $e=="text-active")
        return $e;
    }
    function touche ($e) {

    if(Route::currentRouteName() == "wilayatouche" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "wilayatouche" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "wilayatouche" && $e=="text-active")
        return $e;
    }
    function declarationZones ($e) {

    if(Route::currentRouteName() == "declarationZone.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "declarationZone.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "declarationZone.index" && $e=="text-active")
        return $e;
    }
    /*------------------------------------------------------------------------------------------*/
    
    function utiMob ($e) {

    if(Route::currentRouteName() == "utilisateur_mobilise.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "utilisateur_mobilise.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "utilisateur_mobilise.index" && $e=="text-active")
        return $e;
    }
    function constEval ($e) {

    if(Route::currentRouteName() == "constructionAevaluer.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "constructionAevaluer.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "constructionAevaluer.index" && $e=="text-active")
        return $e;
    }
    function zoneInsp ($e) {

    if(Route::currentRouteName() == "declarationDesZones.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "declarationDesZones.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "declarationDesZones.index" && $e=="text-active")
        return $e;
    }
    /*------------------------------------------------------------------------------------------*/
    function constEva ($e) {

    if(Route::currentRouteName() == "utilisateur_mobilise.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "utilisateur_mobilise.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "utilisateur_mobilise.index" && $e=="text-active")
        return $e;
    }
    function constInc ($e) {

    if(Route::currentRouteName() == "constructionAevaluer.index" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "constructionAevaluer.index" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "constructionAevaluer.index" && $e=="text-active")
        return $e;
    }
    function ficheEva ($e) {
        // ficheevaluation.detaille
    if(Route::currentRouteName() == "ficheevaluation.index" && $e=="show" || Route::currentRouteName() == "ficheevaluation.detaille" && $e=="show")
        return $e;
    elseif(Route::currentRouteName() == "ficheevaluation.index" && $e=="active" || Route::currentRouteName() == "ficheevaluation.detaille" && $e=="active")
        return $e;
    elseif(Route::currentRouteName() == "ficheevaluation.index" && $e=="text-active" || Route::currentRouteName() == "ficheevaluation.detaille" && $e=="text-active")
        return $e;
    }
    /*------------------------------------------------------------------------------------------*/
    function rappEva ($e) {

        if(Route::currentRouteName() == "rapportEval.index" && $e=="show")
            return $e;
        elseif(Route::currentRouteName() == "rapportEval.index" && $e=="active")
            return $e;
        elseif(Route::currentRouteName() == "rapportEval.index" && $e=="text-active")
            return $e;
    }
    function RefPub ($e) {

        if(Route::currentRouteName() == "RefPub.index" && $e=="show")
            return $e;
        elseif(Route::currentRouteName() == "RefPub.index" && $e=="active")
            return $e;
        elseif(Route::currentRouteName() == "RefPub.index" && $e=="text-active")
            return $e;
    }
    function bilanJour ($e) {

        if(Route::currentRouteName() == "bilanJour.index" && $e=="show")
            return $e;
        elseif(Route::currentRouteName() == "bilanJour.index" && $e=="active")
            return $e;
        elseif(Route::currentRouteName() == "bilanJour.index" && $e=="text-active")
            return $e;
    }
    /*------------------------------------------------------------------------------------------*/
    @endphp