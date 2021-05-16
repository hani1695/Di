<?php

namespace App\Http\Controllers\evaluation;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class UniteevalueeController extends Controller
{
    public function index() {

        $uniteevaluers = DB::table('t_construction_evalues')->get();
        // dd($uniteevaluers);
         return view('evaluations.liste_des_unite_evaluees.liste_des_unite_evaluee',compact('uniteevaluers')) ;
      }

       public function constructionevaluees() {
        

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
            ->join('t_construction_a_evaluer','b_construction.id_const','=','t_construction_a_evaluer.id_const')
            ->join('t_zone','t_construction_a_evaluer.zone_id','=','t_zone.id_zone')          
            ->leftJoin('b_wilaya','b_construction.fk_id_wilaya','=','b_wilaya.code_w')
            ->leftJoin('b_commune','b_construction.fk_id_comn','=','b_commune.code_c')
            ->where('t_construction_a_evaluer.fk_event',Session::get('event_id')) 
            ->where('t_construction_a_evaluer.etat_eval','0')                   
            ->get();
            // dd($consZones);
  
            $communes = DB::table('b_commune')->join('b_wilaya','b_wilaya.code_w','=','b_commune.fk_wilaya')
            ->whereRaw('code_w IN ( SELECT wilaya_id FROM t_evenement where id = ?)',Session::get('event_id'))
            ->select('code_c','nom_c')
            ->get();
            
          }
          
            if ( $privilege->consultation) return view('evaluations.constructionevaluees.constructionevaluees' ,compact('privilege','zones','consZones','communes')) ;
            else return view('layouts.pasacces');   
          }
          public function constructioninaccessible() {
        
       
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
              ->join('t_construction_a_evaluer','b_construction.id_const','=','t_construction_a_evaluer.id_const')
              ->join('t_zone','t_construction_a_evaluer.zone_id','=','t_zone.id_zone')          
              ->leftJoin('b_wilaya','b_construction.fk_id_wilaya','=','b_wilaya.code_w')
              ->leftJoin('b_commune','b_construction.fk_id_comn','=','b_commune.code_c')
              ->where('t_construction_a_evaluer.fk_event',Session::get('event_id'))     
              ->where('t_construction_a_evaluer.etat_eval','1')                   
     
              ->get();
              // dd($consZones);
    
              $communes = DB::table('b_commune')->join('b_wilaya','b_wilaya.code_w','=','b_commune.fk_wilaya')
              ->whereRaw('code_w IN ( SELECT wilaya_id FROM t_evenement where id = ?)',Session::get('event_id'))
              ->select('code_c','nom_c')
              ->get();
              
            }
            
              if ( $privilege->consultation) return view('evaluations.constructioninaccessible.constructioninaccessible' ,compact('privilege','zones','consZones','communes')) ;
              else return view('layouts.pasacces');   
            }

      
}
