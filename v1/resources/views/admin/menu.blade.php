<aside class="left-panel" id="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="main-menu collapse navbar-collapse" id="main-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/"><i class="menu-icon fa fa-laptop"></i>Tableau de bord</a>
                    </li>
                    <li class="menu-title">Gestion</li><!-- /.menu-title -->
                    <!-- Utilisateurs -->
                    <li class="menu-item-has-children dropdown">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"> <i class="menu-icon fa fa-users"></i>Comptes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fa fa-user "></i><a href="{{ route('utilisateur.index') }}" class="">Utilisateurs</a></li>
                            <li><i class="fas fa-users-cog"></i><a href="{{ route('securite') }}">Profils et privilèges</a></li>     
                            <li><i class="fa fa-history"></i><a href="{{ route('securite') }}">Historique des notifications</a></li>  
                        </ul>
                    </li>
                   <!-- Organisation -->
                    <li class="menu-item-has-children dropdown">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"> <i class="menu-icon fa fa-users"></i>Organisation</a>
                        <ul class="sub-menu children dropdown-menu">                                 
                            <li><i class="fa fa-table"></i><a href="{{ route('tbase.organisme') }}">Organismes & institutions</a></li>    
                            <li><i class="fa fa-table"></i><a href="{{ route('tbase.direction') }}">Directions</a></li>  
                            <li><i class="fa fa-table"></i><a href="{{ route('tbase.structure') }}">Structures</a></li>  
                        </ul>
                    </li>  

                   <!-- Organisation -->
                    <li class="menu-item-has-children dropdown">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"> <i class="menu-icon fa fa-users"></i>Découpage Administratif</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fa fa-user "></i><a href="{{ route('wilaya.index') }}" class="">Wilayas</a></li>
                            <li><i class="fa fa-table"></i><a href="{{ route('daira.index') }}">Daira</a></li>     
                            <li><i class="fa fa-table"></i><a href="{{ route('commune.index') }}">Communes</a></li>  
                            <li><i class="fa fa-table"></i><a href="{{ route('district.index') }}">District</a></li>           
                            <li><i class="fa fa-table"></i><a href="{{ route('ilot.index') }}">Ilot</a></li>                      
                            <li><i class="fa fa-table"></i><a href="{{ route('routier.index') }}">Tronçons routier</a></li>    
                        </ul>
                    </li>    

                    <!-- constructions -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Constructions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('construction.index') }}" >Unités renseignées</a></li>
                            <!-- <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.create') }}" >Liste des adresses de l'unité</a></li> -->
                            <!-- <li><i class="fa fa-table"></i><a href="{{ route('users.index') }}">Unités à Evaluer</a></li>                             -->
                        </ul>
                    </li>             

                <li class="menu-title">Post-Catastrophe</li><!-- /.menu-title -->   
                     <!-- évènements -->
                     <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Évènements</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ route('evenements.index') }}">Evènements</a></li>   
                            <li><i class="fa fa-table"></i><a href="{{ route('wilayatouche') }}">Wilayas touchés</a></li>     
                            <li><i class="fa fa-table"></i><a href="{{ route('declarationZone.index') }}">Déclaration des zones</a></li>     
                            <li><i class="fa fa-table"></i><a href="{{ route('users.index') }}">Références scientifiques</a></li>                                      
                        </ul>
                    </li>
                      <!-- constructions -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Utilisateurs & affectation</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa-user-tie"></i><a href="{{ route('utilisateur_mobilise.index') }}">Utilisateurs mobilisés</a></li>     
                            <!-- <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.create') }}" >Liste des adresses de l'unité</a></li> -->
                            <li><i class="fa fa-table"></i><a href="{{ route('constructionAevaluer.index') }}">Constructions à Evaluer</a></li>       
                            <li><i class="fa fa-table"></i><a href="{{ route('users.index') }}">Affectation des zones aux inspecteurs</a></li>                                                 
                        </ul>
                    </li>                   



                   <!-- évaluations mode déconnecté -->
                   <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Evaluations mode papier</a>
                        <ul class="sub-menu children dropdown-menu"> 
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Importation des fiches scannées (Excel)</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Validation du niveau de dommage global des fiches scannées</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Vérification des données reçues et médias (photos, vidéos, audios)</a></li>  

                        </ul>
                    </li>    
                   <!-- évaluations -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Evaluations</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('uniteevaluee.index') }}" >Liste des unités évaluées</a></li>   
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Liste des unités impossible d'évaluer</a></li>
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('ficheevaluation.index') }}" >Liste des fiches d'évaluation</a></li>   
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Vérification des données reçues et médias (photos, vidéos, audios)</a></li>    
                        </ul>
                    </li>    
                                          
                    
                     <!-- Batisses  -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Reporting</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Bilan journalier des évaluations</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Bilan Cumulé des évaluations</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Liste des unités déclarées rouges</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Liste des unités déclarées oranges</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Liste des unités déclarées vertes</a></li>  
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Rapports d'évaluations</a></li>  
                        </ul>
                    </li>         

                 <!-- constructions -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Périmètres de la catastrophe</a></li>
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('evenements.index') }}" >Cartes thématiques</a></li>                   
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
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Listes prédéfinies</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('type_adresse.index') }}" > Types d'adresses </a></li>
                            <li><i class="fa fa-table"></i><a href="{{ route('typevoie.index') }}">Types des voies </a></li>   
                            <li><i class="fa fa-table"></i><a href="{{ route('zone.index') }}">Types des zones  </a></li>   
                            <li><i class="fa fa-table"></i><a href="{{ route('mesure.index') }}">Liste des mesures immédiates</a></li>     
                            <li><i class="fa fa-table"></i><a href="{{ route('usage.index') }}">types d'usages</a></li>                       
                            <li><i class="fa fa-table"></i><a href="{{ route('status_juridique.index') }}">Status juridiques</a></li>                      
                            <li><i class="fa fa-table"></i><a href="{{ route('typeevenement.index') }}">Type d'évènements</a></li>                                 
                        </ul>
                    </li>
                    <!-- Paramétrage -->
                    <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown"><i class="menu-icon fas fa-calendar-check"></i>Actions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li ><i class="fas fa-calendar-plus"></i><a href="{{ route('tache.index') }}" >tâches et interfaces</a></li>                
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>