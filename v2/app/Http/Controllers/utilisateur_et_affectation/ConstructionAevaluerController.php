<?php

namespace App\Http\Controllers\utilisateur_et_affectation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class ConstructionAevaluerController extends Controller
{
    public function index() {
        
       
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','utilisateurs')
        ->first();
        $zones = null ;
        
          
        $utilisateurs = null;
        $usersM = null;
        $consZones = null ;
        $communes = NULL;
        if(Session::has('event_id')) {
          $zones = DB::table('t_zone')
          // ->join('t_construction_a_evaluer','t_zone.id_zone','=','t_construction_a_evaluer.zone_id')
          ->where('t_zone.fk_event',Session::get('event_id'))
          ->whereRaw('id_zone NOT IN (SELECT zone_id FROM t_construction_a_evaluer)')
          ->get();

          $consZones = DB::table('b_construction')
          ->leftJoin('b_construction_adresse','b_construction_adresse.fk_id_const','=','b_construction.id_const')
          ->join('t_construction_a_evaluer','b_construction_adresse.id_constp','=','t_construction_a_evaluer.id_const')
          ->join('t_zone','t_construction_a_evaluer.zone_id','=','t_zone.id_zone')          
          ->leftJoin('b_wilaya','b_construction.fk_id_wilaya','=','b_wilaya.code_w')
          ->leftJoin('b_commune','b_construction.fk_id_comn','=','b_commune.code_c')
          ->where('t_construction_a_evaluer.fk_event',Session::get('event_id'))          
          ->get();
          // dd($consZones);

          $communes = DB::table('b_commune')->join('b_wilaya','b_wilaya.code_w','=','b_commune.fk_wilaya')
          ->whereRaw('code_w IN ( SELECT wilaya_id FROM t_evenement where id = ?)',Session::get('event_id'))
          ->select('code_c','nom_c')
          ->get();
          
        }
        
          if ( $privilege->consultation) return view('utilisateur_et_affectation.construction_a_evaluer.ajouter' ,compact('privilege','zones','consZones','communes')) ;
          else return view('layouts.pasacces');   
        }
        public function store (Request $request) {
          // dd($request->all());
          $this->validate($request,[
            'zone_id' => 'required',            
            'id_const' => 'required'
          ]);
          foreach ($request->id_const as $key => $value) {
            DB::table('t_construction_a_evaluer')->insert([
              'zone_id' => $request->zone_id ,              
              'id_const' => $value,
              'fk_event' => Session::get('event_id'),
              'date_creation' => date('Y-m-d')
              
            ]);
          }
          return redirect () -> back() ->with('success','Les constructions sont affectées aux zones avec succés');
        }
        public function destroy ($id) {
          DB::table('t_construction_a_evaluer')->where('id_const_ev',$id)->delete();
          return redirect () -> back() ->with('supp','L\'affection a été supprimé avec succés');

        }
       
}
