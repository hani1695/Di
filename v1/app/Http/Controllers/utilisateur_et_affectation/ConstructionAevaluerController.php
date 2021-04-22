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
        if(Session::has('event_id')) {
          $zones = DB::table('t_zone')->where('fk_event',Session::get('event_id'))->get();
          $consZones = DB::table('b_construction')
          ->join('t_construction_evalues','b_construction.id_const','=','t_construction_evalues.id_const')
          ->join('t_zone','t_construction_evalues.zone_id','=','t_zone.id_zone')
          ->join('b_wilaya','t_construction_evalues.fk_id_wilaya','=','b_wilaya.code_w')
          ->join('b_commune','t_construction_evalues.fk_id_comn','=','b_commune.code_c')
          ->where('t_construction_evalues.fk_event',Session::get('event_id'))
          // ->groupBy('id_zone')
          ->get();
          // dd($consZones);
            // $wilayas = DB::table('b_wilaya')->get();


        //   $utilisateurs = Utilisateur::whereRaw('b_users.id not in (select fk_user from t_users_event where fk_event = '.Session::get("event_id").')')->get();
        //   $usersM = DB::table('t_users_event')->join('b_users', 'b_users.id', '=', 't_users_event.fk_user')->where('t_users_event.fk_event','=', Session::get("event_id"))
        //   ->get();
        }
        
          if ( $privilege->consultation) return view('utilisateur_et_affectation.construction_a_evaluer.ajouter' ,compact('privilege','zones','consZones')) ;
          else return view('layouts.pasacces');   
        }
        public function store (Request $request) {
          $data = $request->validate([
            'zone_id' => 'required',
            'fk_wilaya' => 'required',
            'fk_commune' => 'required',
            'id_const' => 'required'
          ]);
          foreach ($request->id_const as $key => $value) {
            DB::table('t_construction_evalues')->insert([
              'zone_id' => $request->zone_id ,
              'fk_id_wilaya' => $request->fk_wilaya ,
              'fk_id_comn' => $request->fk_commune ,
              'fk_event' => Session::get('event_id'),
              'id_const' => $value,
              'date_creation' => date('Y-m-d')
              
            ]);
          }
          return redirect () -> back() ->with('success','Les constructions sont affectées aux zones avec succés');
        }
        public function destroy ($id) {
          DB::table('t_construction_evalues')->where('id_const_ev',$id)->delete();
          return redirect () -> back() ->with('supp','L\'affection a été supprimé avec succés');

        }
}
