<?php

use Illuminate\Support\Facades\Route;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/ok',function () {
    return Auth::user()->id;
});
Route::get('/', function () { return view('home'); })->middleware('auth');
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::resource('users', 'UserController');

//---------- table de comptes
Route::post('utilisateur/passchanger','utilisateurController@passchangeer')->name('utilisateur.passchangeer');
Route::get('utilisateur/delete/{id}','utilisateurController@destroy')->name('utilisateur.destroy');
Route::get('utilisateur/profil','utilisateurController@profil')->name('utilisateur.profil');
Route::resource('utilisateur', 'utilisateurController',['except'=>['destroy']]);

Route::get('/securite', 'securiteController@index')->name('securite');
Route::get('/securite/create', 'securiteController@create')->name('securitecreate');
Route::post('/securite/store', 'securiteController@enregistrer')->name('securitestore');
Route::get('/securite/modif/{id}', 'securiteController@modification')->name('securitemodif');
Route::post('/securite/update', 'securiteController@update')->name('securiteupdate');
Route::get('/securite/delete/{id}', 'securiteController@destroyfam')->name('securite-delete');
Route::get('/securite/privilege/{id}', 'securiteController@privilege')->name('securite-privilege');
Route::get('/securite/privilegemodif/{id}/{num}', 'securiteController@privilegemodification')->name('securite-privilegemodification');
Route::post('/securite/privilegeupdate', 'securiteController@privilegeupdate')->name('securite-privilegeupdate');
Route::post('/securite/privilegeajout', 'securiteController@privilegeajout')->name('securite-privilegeajout');
//-------------**


// ------table de base-----
Route::get('/tbase/organisme','TableBaseController@organisme')->name('tbase.organisme');
Route::post('/tbase/ajouter_organisme','TableBaseController@ajouter_organisme')->name('tbase.ajouter_organisme');
Route::get('/tbase/edit_organisme/{id}','TableBaseController@edit_organisme')->name('tbase.edit_organisme');
Route::post('/tbase/modifier_organisme/{id}','TableBaseController@modifier_organisme')->name('tbase.modifier_organisme');
Route::get('/tbase/delete_organisme/{id}','TableBaseController@delete_organisme')->name('tbase.delete_organisme');

Route::get('/tbase/direction','TableBaseController@direction')->name('tbase.direction');
Route::post('/tbase/ajouter_direction','TableBaseController@ajouter_direction')->name('tbase.ajouter_direction');
Route::get('/tbase/edit_direction/{id}','TableBaseController@edit_direction')->name('tbase.edit_direction');
Route::post('/tbase/modifier_direction/{id}','TableBaseController@modifier_direction')->name('tbase.modifier_direction');
Route::get('/tbase/delete_direction/{id}','TableBaseController@delete_direction')->name('tbase.delete_direction');

Route::get('/tbase/structure','TableBaseController@structure')->name('tbase.structure');
Route::post('/tbase/ajouter_structure','TableBaseController@ajouter_structure')->name('tbase.ajouter_structure');
Route::get('/tbase/edit_structure/{id}','TableBaseController@edit_structure')->name('tbase.edit_structure');
Route::post('/tbase/modifier_structure/{id}','TableBaseController@modifier_structure')->name('tbase.modifier_structure');
Route::get('/tbase/delete_structure/{id}','TableBaseController@delete_structure')->name('tbase.delete_structure');
Route::get('/tbase/detaille_structure/{id}','TableBaseController@detaille_structure')->name('tbase.detaille_structure');




// ---------



//------table de découpage-----
Route::get('wilaya/delete/{id}','WilayaController@destroy')->name('wilaya.destroy');
Route::resource('wilaya', 'WilayaController',[
    'except'=>['destroy']
]);
Route::get('commune/delete/{id}','CommuneController@destroy')->name('commune.destroy');
Route::get('commune/detaille/{id}','CommuneController@detaille')->name('commune.detaille');
Route::resource('commune', 'CommuneController',[
    'except'=>['destroy']
    ]);
Route::get('daira/delete/{id}','DairaController@destroy')->name('daira.destroy');
Route::resource('daira', 'DairaController',[
        'except'=>['destroy']
        ]);
Route::get('district/delete/{id}','DistrictController@destroy')->name('district.destroy');
Route::resource('district', 'DistrictController',[
                'except'=>['destroy']
                ]);
Route::get('ilot/delete/{id}','IlotController@destroy')->name('ilot.destroy');
Route::resource('ilot', 'IlotController',[
                'except'=>['destroy']
                ]);
Route::get('routier/delete/{id}','RoutierController@destroy')->name('routier.destroy');
Route::get('routier/detaille/{id}','RoutierController@detaille')->name('routier.detaille');
Route::resource('routier', 'RoutierController',[
                'except'=>['destroy']
                ]);                
// ---------*


//----- tables de post catastrophe

//** Evenement */
// Route::get('evenements/cEvntTable','admin\EvenementController@cEvntTable')->name('evenements.cEvntTable');
Route::get('evenements/delete/{id}','admin\EvenementController@destroy')->name('evenements.destroy');
Route::resource('evenements','admin\EvenementController',[
    'except'=>['destroy']
    ]);
Route::get('wilayatouche','admin\EvenementController@wilayatouche')->name('wilayatouche');

Route::get('declarationZone/delete/{id}','admin\DeclarationZoneController@destroy')->name('declarationZone.destroy');
Route::resource('declarationZone','admin\DeclarationZoneController',[
    'except'=>['destroy']
    ]);




//-----------*

////////////////////////////////////////utilisateur et affectations
Route::get('utilisateur_mobilise/delete/{id}','utilisateur_et_affectation\UtilisateurMobiliseController@destroy')
->name('utilisateur_mobilise.destroy');
Route::resource('utilisateur_mobilise','utilisateur_et_affectation\UtilisateurMobiliseController',[
    'except'=>['destroy']
    ]);

Route::get('constructionAevaluer/delete/{id}','utilisateur_et_affectation\ConstructionAevaluerController@destroy')
->name('constructionAevaluer.destroy');
Route::resource('constructionAevaluer','utilisateur_et_affectation\ConstructionAevaluerController',[
    'except'=>['destroy']
    ]);
////////////////////////////////////////utilisateur et affectations


// ------table des listes predefinies-----
Route::get('type_adresse/delete/{id}','Type_adresseController@destroy')->name('type_adresse.destroy');
Route::resource('type_adresse', 'Type_adresseController',[
                'except'=>['destroy']
                ]); 
Route::get('status_juridique/delete/{id}','Status_juridiqueController@destroy')->name('status_juridique.destroy');
Route::resource('status_juridique', 'Status_juridiqueController',[
                                'except'=>['destroy']
                                ]);    
Route::get('mesure/delete/{id}','MesureController@destroy')->name('mesure.destroy');
Route::resource('mesure', 'MesureController',[
                                'except'=>['destroy']
                                ]);  
Route::get('zone/delete/{id}','ZoneController@destroy')->name('zone.destroy');
Route::resource('zone', 'ZoneController',[
                                'except'=>['destroy']
                                ]); 
Route::get('typevoie/delete/{id}','TypevoieController@destroy')->name('typevoie.destroy');
Route::resource('typevoie', 'TypevoieController',[
                                'except'=>['destroy']
                                ]); 
Route::get('usage/delete/{id}','UsageController@destroy')->name('usage.destroy');
Route::resource('usage', 'UsageController',[
                                'except'=>['destroy']
                                ]);    
          //root types evenements avec les route admin                                
Route::get('typeevenement/delete/{id}','TypeevenementController@destroy')->name('typeevenement.destroy');
Route::resource('typeevenement', 'TypeevenementController',[
                                'except'=>['destroy']
                                ]);
                  //root evenements avec les route admin                                

// ------table des listes predefinies-----


// ------table des actions-----
Route::get('tache/delete/{id}','TacheController@destroy')->name('tache.destroy');
Route::resource('tache', 'TacheController',[
                                'except'=>['destroy']
                                ]);
// ------table des actions-----

// ------table des constructions-----
Route::get('construction/delete/{id}','constructionController@destroy')->name('construction.destroy');
Route::resource('construction', 'ConstructionController',[
                                'except'=>['destroy']
                                ]);
Route::get('constructionadresse/delete/{id}','ConstructionadresseController@destroy')->name('constructionadresse.destroy');
Route::get('constructionadresse/index/{id}','ConstructionadresseController@index')->name('constructionadresse.index');
Route::get('constructionadresse/detaille/{id}','ConstructionadresseController@detaille')->name('constructionadresse.detaille');
Route::resource('constructionadresse', 'ConstructionadresseController',[
                                'except'=>['destroy','index']
                                ]);

// ------table des constructions-----detaille

// ------evaluations-----
Route::resource('uniteevaluee', 'evaluation\UniteevalueeController');
Route::resource('ficheevaluation', 'evaluation\FicheevaluationController');
// Route::get('ficheevaluationdetaille', 'evaluation\FicheevaluationController@detaille')->name('ficheevaluation.detaille');
Route::get('ficheevaluationdetaille\{id}', 'evaluation\FicheevaluationController@detaille')->name('ficheevaluation.detaille');
// Route::get('detaille\{id}', 'evaluation\FicheevaluationController@det')->name('ficheevaluation.det');
// Route::get('detaille3\{id}', 'evaluation\FicheevaluationController@det3')->name('ficheevaluation.det3');


// ------evaluations-----

Route::resource('declarationDesZones', 'utilisateur_et_affectation\AffectationDesZonesAuxInspecteursController',[
    'except'=>['destroy']
]);


Route::get('formtest',function () {
 return view ('formtest');
});

Route::get('eventSession/store/{id}','SessionController@storeSessionData')->name('eventSession.store');
Route::get('eventSession/delete','SessionController@deleteSessionData')->name('eventSelect.delete');
Route::get('eventSession/get','SessionController@getSessionData')->name('eventSession.get');