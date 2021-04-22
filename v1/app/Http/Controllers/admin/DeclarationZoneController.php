<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use DB;

class DeclarationZoneController extends Controller
{
    public function index()
    {
      $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','evenements')
      ->first();

      $zones=DB::table('t_zone') ->join('b_commune', 'b_commune.code_c', '=', 't_zone.fk_commune')->get();
      if(Session::has('event_id'))
      $zones=DB::table('t_zone') ->join('b_commune', 'b_commune.code_c', '=', 't_zone.fk_commune')
      ->where('t_zone.fk_event','=',Session::get('event_id'))->get();

    return view ('admin.declarationDesZones.create',compact('privilege','zones'));
    }
    public function edit($id)
    {
      $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','evenements')
      ->first();

      $zones=DB::table('t_zone') ->join('b_commune', 'b_commune.code_c', '=', 't_zone.fk_commune')->get();
      $zone_mdf=DB::table('t_zone') ->join('b_commune', 'b_commune.code_c', '=', 't_zone.fk_commune')
      ->where('t_zone.id_zone','=',$id)->first();

      if(Session::has('event_id')){

            $zones=DB::table('t_zone') ->join('b_commune', 'b_commune.code_c', '=', 't_zone.fk_commune')
            ->where('t_zone.fk_event','=',Session::get('event_id'))->get();
            
            $zone_mdf=DB::table('t_zone') ->join('b_commune', 'b_commune.code_c', '=', 't_zone.fk_commune')
            ->where('t_zone.fk_event','=',Session::get('event_id'))
            ->where('t_zone.id_zone','=',$id)->first();

      }
    return view ('admin.declarationDesZones.update',compact('privilege','zones','zone_mdf'));
    }

    public function store(Request $request)
    {        
        if(Session::has('event_id')){
                     
            $data = $request->validate([
                'nom_zone' => 'required',
                'num_zone' => 'required|numeric',
                'observation' => 'required',
                'fk_commune'  => 'required',        
              ]);

            DB::table('t_zone')->insert([
                    'nom_zone' => $request->nom_zone,
                    'num_zone' => $request->num_zone,
                    'observation' => $request->observation,
                    'fk_commune' => $request->fk_commune,
                    'fk_event' => Session::get('event_id'),
                    
                ]);
                }
                else{
                return redirect()->back()->with('danger','selectionner un évènement');
                }
      
     
     
      return redirect()->back()->with('success','La zone a été créé avec succès');
    }  
    public function update(Request $request,$id)
    {        
        if(Session::has('event_id')){
                     
            $data = $request->validate([
                'nom_zone' => 'required',
                'num_zone' => 'required|numeric',
                'observation' => 'required',
                'fk_commune'  => 'required',        
              ]);

            DB::table('t_zone')->where('id_zone','like',$id)
            ->update([
                    'nom_zone' => $request->nom_zone,
                    'num_zone' => $request->num_zone,
                    'observation' => $request->observation,
                    'fk_commune' => $request->fk_commune,
                    'fk_event' => Session::get('event_id'),
                    
                ]);
                }
                else{
                return redirect()->back()->with('danger','selectionner un évènement');
                }
      
     
     
      return redirect()->back()->with('success','La zone a été modifier avec succès');
    }  

    public function destroy($id){
        
        DB::table('t_zone')->where('id_zone',$id)->delete();
  
        return redirect()->back()->with('supp','La zone  a été supprimé avec succès');
      }
}
