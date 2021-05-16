@php
    // dd(Route::currentRouteName());
    
    
@endphp
@include('admin.active')
<aside class="left-panel" id="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="main-menu collapse navbar-collapse" id="main-menu">
                <ul class="nav navbar-nav">
                    <li class="{{ tableauDebordLi() }}">
                        <a href="/"><i class="menu-icon fa fa-laptop"></i>Tableau de bord</a>
                    </li>
                    <li class="menu-title">Gestions</li><!-- /.menu-title -->
                    <!-- Utilisateurs -->
                    <li class="menu-item-has-children dropdown {{ comptes("show") }} {{ comptes("active") }} {{ profils("show") }} {{ profils("active") }}">
                        <a class="dropdown-toggle " aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"> <i class="menu-icon fa fa-users"></i>Comptes</a>
                        <ul class="sub-menu children dropdown-menu {{ comptes("show") }} {{ profils("show") }}">
                            <li ><i class="fa fa-user {{ comptes("text-active") }}"></i><a href="{{ route('utilisateur.index') }}" class="{{ comptes("text-active") }}">Utilisateurs</a></li>
                            <li><i class="fas fa-users-cog {{ profils("text-active") }}"></i><a href="{{ route('securite') }}" class="{{ profils("text-active") }}">Profils et privilèges</a></li>     
                            <li><i class="fa fa-history"></i><a href="{{ route('securite') }}">Historique des notifications</a></li>  
                        </ul>
                    </li>
                   <!-- Organisation -->
                    <li class="menu-item-has-children dropdown {{ organisme ("show") }} {{ organisme ("active") }} {{ direction ("show") }} {{ direction ("active") }} {{ structure ("show") }} {{ structure ("active") }}">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"> <i class="menu-icon fas fa-building"></i>Organisation</a>
                        <ul class="sub-menu children dropdown-menu {{ organisme ("show") }} {{ direction ("show") }} {{ structure ("show") }}">                                 
                            <li><i class="fas fa-building {{ organisme ("text-active") }}"></i><a href="{{ route('tbase.organisme') }}" class="{{ organisme ("text-active") }}">Organismes & institutions</a></li>    
                            <li><i class="far fa-building {{ direction ("text-active") }}"></i><a href="{{ route('tbase.direction') }}" class="{{ direction ("text-active") }}">Directions</a></li>  
                            <li><i class="fas fa-briefcase {{ structure ("text-active") }}"></i></i><a href="{{ route('tbase.structure') }}" class="{{ structure ("text-active") }}">Structures</a></li>  
                        </ul>
                    </li>  

                   <!-- Organisation -->
                    <li class="menu-item-has-children dropdown {{ wilaya ("show") }} {{ wilaya ("active") }} {{ daira ("show") }} {{ daira ("active") }} {{ commune ("show") }} {{ commune ("active") }}">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"> <i class="menu-icon fas fa-map-signs"></i>Découpage Administratif</a>
                        <ul class="sub-menu children dropdown-menu {{ wilaya ("show") }} {{ daira ("show") }} {{ commune ("show") }}">
                            <li ><i class="fas fa-map-marker-alt {{ wilaya ("text-active") }}"></i></i><a href="{{ route('wilaya.index') }}" class="{{ wilaya ("text-active") }}">Wilayas</a></li>
                            <li><i class="fas fa-map-marker-alt {{ daira ("text-active") }}"></i><a href="{{ route('daira.index') }}" class=" {{ daira ("text-active") }}">Daira</a></li>     
                            <li><i class="fas fa-map-marker-alt {{ commune ("text-active") }}"></i><a href="{{ route('commune.index') }}" class=" {{ commune ("text-active") }}">Communes</a></li>  
     
                        </ul>
                    </li>    

                    <!-- constructions -->
                    <li class="menu-item-has-children dropdown {{ district("active") }} {{ district("show") }} {{ ilot("active") }} {{ ilot("show") }} {{ routier("active") }} {{ routier("show") }} {{ construction("active") }} {{ construction("show") }}">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-globe-africa"></i></i>Adressages</a>
                        <ul class="sub-menu children dropdown-menu {{ district("show") }} {{ ilot("show") }} {{ routier("show") }} {{ construction("show") }}">
                            <li><i class="fas fa-city {{ district("text-active") }}"></i><a href="{{ route('district.index') }}" class="{{ district("text-active") }}">District</a></li>           
                            <li><i class="fa fa-table {{ ilot("text-active") }}"></i><a href="{{ route('ilot.index') }}" class="{{ ilot("text-active") }}">Ilot</a></li>                      
                            <li><i class="fas fa-road {{ routier("text-active") }}"></i><a href="{{ route('routier.index') }}" class="{{ routier("text-active") }}">Tronçons routier</a></li>    
                            <li ><i class="fas fa-home {{ construction("text-active") }}"></i></i><a href="{{ route('construction.index') }}" class="{{ construction("text-active") }}">Constructions</a></li>
                                                    
                        </ul>
                    </li>             

                <li class="menu-title">Post-Catastrophe</li><!-- /.menu-title -->   
                     <!-- évènements -->
                     <li class="menu-item-has-children dropdown {{ evenement("show") }} {{ evenement("active") }} {{ touche("show") }} {{ touche("active") }} {{ declarationZones("show") }} {{ declarationZones("active") }}">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fa fa-table"></i>Évènements</a>
                        <ul class="sub-menu children dropdown-menu {{ evenement("show") }} {{ touche("show") }} {{ declarationZones("show") }}">
                            <li><i class="fas fa-calendar-check {{ evenement("text-active") }}"></i><a href="{{ route('evenements.index') }}" class="{{ evenement("text-active") }}">Évènements</a></li>   
                            <li><i class="fas fa-bolt {{ touche("text-active") }}"></i><a href="{{ route('wilayatouche') }}" class="{{ touche("text-active") }}">Wilayas affectées</a></li>     
                            <li><i class="fas fa-list-ol {{ declarationZones("text-active") }}"></i><a href="{{ route('declarationZone.index') }}" class="{{ declarationZones("text-active") }}">Déclaration des zones</a></li>     
                          </ul>
                    </li>
                      <!-- constructions -->
                    <li class="menu-item-has-children dropdown {{ utiMob("show") }} {{ utiMob("active") }} {{ constEval("show") }} {{ constEval("active") }} {{ zoneInsp("show") }} {{ zoneInsp("active") }}">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-user-plus"></i>Utilisateurs & affectation</a>
                        <ul class="sub-menu children dropdown-menu {{ utiMob("show") }} {{ constEval("show") }} {{ zoneInsp("show") }}">
                            <li><i class="fas fa-user-tie {{ utiMob("text-active") }}"></i><a href="{{ route('utilisateur_mobilise.index') }}" class="{{ utiMob("text-active") }}">Utilisateurs mobilisés</a></li>     
                            <!-- <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.create') }}" >Liste des adresses de l'unité</a></li> -->
                            <li><i class="fas fa-house-damage {{ constEval("text-active") }}"></i><a href="{{ route('constructionAevaluer.index') }}" class="{{ constEval("text-active") }}">Constructions à Evaluer</a></li>       
                            <li><i class="fas fa-user-check {{ zoneInsp("text-active") }}"></i><a href="{{ route('declarationDesZones.index') }}" class="{{ zoneInsp("text-active") }}">Affectation des zones aux inspecteurs</a></li>                                                 
                        </ul>
                    </li>                   



                   <!-- évaluations mode déconnecté -->
                  <!--  <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Evaluations mode papier</a>
                        <ul class="sub-menu children dropdown-menu"> 
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Importation des fiches scannées (Excel)</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Validation du niveau de dommage global des fiches scannées</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Vérification des données reçues et médias (photos, vidéos, audios)</a></li>  

                        </ul>
                    </li>    -->
                   <!-- évaluations -->
                    <li class="menu-item-has-children dropdown {{ ficheEva("show") }} {{ ficheEva("active") }}">
                        <a class="dropdown-toggle" aria-expanded="true" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-paste"></i></i>Evaluations</a>
                        <ul class="sub-menu children dropdown-menu {{ ficheEva("show") }}">
                            <li ><i class="fas fa-tasks"></i><a href="{{ route('constructionevaluees') }}" >Constructions évaluées</a></li>   
                            <li ><i class="fas fa-times-circle"></i><a href="{{ route('constructioninaccessible') }}" >Constructions inaccessibles</a></li>
                            <li ><i class="fas fa-book {{ ficheEva("text-active") }}"></i><a href="{{ route('ficheevaluation.index') }}" class="{{ ficheEva("text-active") }}">Fiches d'évaluations</a></li>   
                          <!--  <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Vérification des données reçues et médias (photos, vidéos, audios)</a></li>   -->  
                        </ul>
                    </li>    
                                         
                    
                     <!-- Batisses  -->
                    <li class="menu-item-has-children dropdown {{ rappEva("show") }} {{ rappEva("active") }} {{ RefPub("show") }} {{ RefPub("active") }} {{ bilanJour("show") }} {{ bilanJour("active") }}">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-chart-line"></i>Reporting</a>
                        <ul class="sub-menu children dropdown-menu {{ rappEva("show") }} {{ RefPub("show") }} {{ bilanJour("show") }}">
                            <li ><i class="fas fa-calendar-plus {{ bilanJour("text-active") }}"></i><a href="{{ route('bilanJour.index') }}" class="{{ bilanJour("text-active") }}">Bilan journalier & Cumulé des évaluations</a></li>  
                          
                          <!--   <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Constructions par classification </a></li>  -->           
                            <li ><i class="fas fa-link {{ rappEva("text-active") }}"></i><a href="{{ route('rapportEval.index') }}" class="{{ rappEva("text-active") }}">Rapports d'évaluations</a></li>  
                            <li><i class="fas fa-at {{ RefPub("text-active") }}"></i><a href="{{ route('RefPub.index') }}" class="{{ RefPub("text-active") }}">Références et publications scientifiques</a></li>    

                        </ul>
                    </li>         

                 <!-- constructions -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-map-marked-alt"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-arrows-alt"></i><a href="{{ route('evenements.index') }}" >Périmètres de la catastrophe</a></li>
                            <li ><i class="fas fa-map"></i><a href="{{ route('evenements.index') }}" >Cartes thématiques</a></li>                   
                        </ul>
                    </li>                       

                <li class="menu-title">Décisions et Suivi</li><!-- /.menu-title -->    
                    <!-- Changements effectués -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Changements effectués</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ route('users.index') }}">Décisions prises</a></li>   
                            <li><i class="fa fa-table"></i><a href="{{ route('users.index') }}">Diagnostics et expertises</a></li>    
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Changements constructions</a></li>               
                        </ul>
                    </li>

                <li class="menu-title">Paramétrages</li><!-- /.menu-title -->    
                    <!-- listes prédéfinies -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-list"></i>Listes prédéfinies</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-map-pin"></i><a href="{{ route('type_adresse.index') }}" > Adresses </a></li>
                            <li><i class="fas fa-road"></i><a href="{{ route('typezonevoie.index') }}">Zones & voies </a></li>    
                            <li><i class="fas fa-hotel"></i><a href="{{ route('usage.index') }}">Types d'usages</a></li>                       
                            <li><i class="fas fa-balance-scale"></i><a href="{{ route('status_juridique.index') }}">Statuts juridiques</a></li>                      
                            <li><i class="fa fa-table"></i><a href="{{ route('typeevenement.index') }}">Type d'évènements</a></li> 
                            <li><i class="fas fa-spell-check"></i><a href="{{ route('mesure.index') }}">Mesures immédiates</a></li>                                    
                        </ul>
                    </li>
                    <!-- Paramétrage -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-tools"></i></i>Fonctionnalités</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-desktop"></i></i><a href="{{ route('tache.index') }}" >Tâches & interfaces</a></li>                
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>