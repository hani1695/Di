<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('getorganismes',function () {
    $organismes = DB::table('b_organismes')->get();    
    return  response()->json($organismes);
});

Route::get('getdrs',function (Request $request) {
    $directions = DB::table('b_direction')->where('fk_org',$request->id)->orderBy('nom')->get();
    return response()->json($directions);
});

Route::get('getstuctures',function (Request $request) {
    $structures = DB::table('b_structures')->where('fk_dr',$request->nomDr)->orderBy('nom_ag')->get();
    return response()->json($structures);
});

Route::get('getSources',function (Request $request) {
    $sources = DB::table('t_source_sismologie')
    ->select('id','source','localisation','date','heure','lattitude','longitude','profondeur','magnitude','evenement_id')
    ->where('evenement_id',$request->id)->get();
    return response()->json($sources);
    
});
Route::get('getSourceInfos',function (Request $request) {
    $sources = DB::table('b_source_informations')->get();
    return response()->json($sources);
});
Route::get('getTypeEvents',function (Request $request) {
    $events = DB::table('c_evenements')->get();

    return response()->json($events);
});
Route::get('getWilayas',function (){
    $wilayas = DB::table('b_wilaya')->get();
    return response()->json($wilayas);
});
Route::get('getCommunes',function (Request $request) {
    $sources = DB::table('b_commune')->where('fk_wilaya',$request->wilaya_id)->get();
    return response()->json($sources);
});
Route::get('getConstructions',function (Request $request) {
    $isWilayaZone =  DB::table('t_zone')->where('id_zone',$request->zone_id)->first();
    
    $sources = [];
    if ($isWilayaZone->defaut) {        
        $sources = DB::table('b_construction')
        ->leftJoin('b_construction_adresse','b_construction_adresse.fk_id_const','=','b_construction.id_const')
        ->join('t_zone','t_zone.fk_wilaya','=','b_construction.fk_id_wilaya')
        ->whereRaw('id_const NOT IN ( SELECT id_const FROM t_construction_a_evaluer WHERE zone_id = ?)',$request->zone_id)
        ->where('t_zone.id_zone',$request->zone_id)
        ->get();
    } else {
        $sources = DB::table('b_construction')
        ->join('b_construction_adresse','b_construction_adresse.fk_id_const','=','b_construction.id_const')
        ->join('t_zone_commune','t_zone_commune.commune_id','=','b_construction.fk_id_comn')
        ->whereRaw('id_const NOT IN ( SELECT id_const FROM t_construction_a_evaluer WHERE zone_id = ?)',$request->zone_id)
        ->where('t_zone_commune.zone_id',$request->zone_id)
        ->get();
    }
    // dd ($sources);
    return response()->json($sources);
});
Route::get('isWialayazone',function (Request $request) {
    $isWilayaZone =  DB::table('t_zone')->where('id_zone',$request->zone_id)->first();
    return response()->json(! $isWilayaZone->defaut);
});



Route::get('getZones',function (Request $request) {
    $zones = DB::table('t_zone')->where('fk_event',$request->event_id)->get();    
    return response()->json($zones);
});

Route::get('getAgences',function (){
    $agences = DB::table('b_structures')
    ->orderBy('code_ag')
    ->get();
    return response()->json($agences);
});

Route::get('getInsp',function (Request $request) {
    $utilisateursMob = DB::table('t_users_event')
        ->join('b_users','b_users.id','=','t_users_event.fk_user')
        ->where([
            'fk_event' => $request->event_id,
            'profile' => 'insp',
            'b_users.structure' => $request->agence
        ])
        ->get();   
    return response()->json($utilisateursMob);
});
Route::get('getUser',function (Request $request) {
    $utilisateursMob = DB::table('b_users')
    ->where('b_users.structure', $request->agence)
    ->whereRaw('b_users.id NOT IN ( SELECT fk_user FROM t_users_event)')
    ->get();   
    return response()->json($utilisateursMob);
});