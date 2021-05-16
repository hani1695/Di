<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Wilaya;
use App\Zone;
use App\Voie;
use App\User;
use Auth;
use DB;

class ZoneController extends Controller
{


   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    
    public function recherche($p){
        $search= request('search');
       
              if($p=='N'){
                $zones=zone::where('id_type_z', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $zones=zone::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_type_z', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $zone=zone::where('id_type_z', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $zone=zone::where('id_type_z', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $zone=zone::where('id_type_z', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $zones=zone::where('id_type_z', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $zones;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        $zone=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $zones = DB::table('c_type_zone')->get();
        if ( $privilege->consultation) return view('listes_predefinies.type_zones_des_voies.type_zones_des_voie',compact('zone','privilege','zones')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      
        
       $zone=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $zone_enr= zone::where('id_type_z',$id)
        ->first();
        return view('listes_predefinies.type_zones_des_voies.type_zones_des_voie_update',compact('zone','zone_enr','privilege')) ;
      }
  

      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'id_type_z'=>'required|numeric|unique:c_status_zone',
                     'descreption_t_z'=>'required',
                           ]); 

                DB::table('c_type_zone')->where('id_type_z','like',$id)
                ->update([
                  //   'id_type_z'=>$request->id_type_z,
                    'descreption_t_z'=>$request->descreption_t_z,
                  ]);
                 
        return back();
     }
    
  
    /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request){
        $data=request()->all();

        $this->validate($request,[
            // 'id_type_z'=>'required|numeric|unique:c_type_zone',
             'descreption_t_z'=>'required',
                   ]); 
 
                      DB::table('c_type_zone')->insert([
                        //   'id_type_z'=>$request->id_type_z,
                          'descreption_t_z'=>$request->descreption_t_z,
                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        zone::where('id_type_z',$id)->delete();
       
        return redirect()->route("zone.index");

      }

}
