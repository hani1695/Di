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
    $directions = DB::table('b_direction')->where('Nom_Org',$request->id)->get();
    return response()->json($directions);
});

Route::get('getstuctures',function (Request $request) {
    $structures = DB::table('b_structures')->where('Nom_DR',$request->nomDr)->get();
    return response()->json($structures);
});

Route::get('getSources',function (Request $request) {
    $sources = DB::table('t_source_sismologie')->where('evenement_id',$request->id)->get();
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
    $sources = DB::table('b_construction')->where('fk_id_comn',$request->commune_id)->get();
    return response()->json($sources);
});