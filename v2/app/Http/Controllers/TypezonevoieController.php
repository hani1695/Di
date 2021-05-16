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
use App\Typezonevoie;
use App\Voie;
use App\User;
use Auth;
use DB;


class TypezonevoieController extends Controller
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
                $zones=zone::where('id_type_z_v', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $zones=zone::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_type_z_v', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $zone=zone::where('id_type_z_v', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $zone=zone::where('id_type_z_v', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $zone=zone::where('id_type_z_v', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $zones=zone::where('id_type_z_v', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $zones;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        // $typezonevoie=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $typezonevoies = DB::table('c_type_zone_voie')
        ->join('c_type_adresses', 'c_type_adresses.id_type_adr', '=', 'c_type_zone_voie.fk_adresse')
        ->get();
        $adresses = DB::table('c_type_adresses')->get();

        if ( $privilege->consultation) return view('listes_predefinies.type_zones_voies.type_zones_voie',compact('privilege','typezonevoies','adresses')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      
        
    //    $typezonevoie=$this->recherche($privilege->visibilite);

       $auth= Auth::user();
       $typezonevoies = DB::table('c_type_zone_voie')
       ->join('c_type_adresses', 'c_type_adresses.id_type_adr', '=', 'c_type_zone_voie.fk_adresse')
       ->get();

       $adresses = DB::table('c_type_adresses')->get();

       $zone_enr= typezonevoie::where('id_type_z_v',$id)
        ->first();
        return view('listes_predefinies.type_zones_voies.type_zones_voie_update',compact('typezonevoies','zone_enr','privilege','adresses')) ;
      }
  

      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'id_type_z_v'=>'required|numeric|unique:c_status_zone',
                     'descreption_z_v'=>'required',
                     'fk_adresse'=>'required',
                           ]); 

                DB::table('c_type_zone_voie')->where('id_type_z_v','like',$id)
                ->update([
                  //   'id_type_z_v'=>$request->id_type_z_v,
                    'descreption_z_v'=>$request->descreption_z_v,
                    'fk_adresse'=>$request->fk_adresse,

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
            // 'id_type_z_v'=>'required|numeric|unique:c_type_zone_voie',
             'descreption_z_v'=>'required',
             'fk_adresse'=>'required',

                   ]); 
 
                      DB::table('c_type_zone_voie')->insert([
                        //   'id_type_z_v'=>$request->id_type_z_v,
                          'descreption_z_v'=>$request->descreption_z_v,
                          'fk_adresse'=>$request->fk_adresse,

                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        typezonevoie::where('id_type_z_v',$id)->delete();
       
        return redirect()->route("typezonevoie.index");

      }

}
