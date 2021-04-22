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
use App\mesure;
use App\User;
use Auth;
use DB;

class MesureController extends Controller
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
                $mesures=mesure::where('id_mesure', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $mesures=mesure::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_mesure', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $mesure=mesure::where('id_mesure', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $mesure=mesure::where('id_mesure', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $mesure=mesure::where('id_mesure', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $mesures=mesure::where('id_mesure', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $mesures;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        $mesure=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $mesures = DB::table('c_mesure_immediate')->get();
        if ( $privilege->consultation) return view('listes_predefinies.liste_des_mesures_immediates.liste_des_mesures_immediate',compact('mesure','privilege','mesures')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      
        
       $mesure=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $mesure_enr= mesure::where('id_mesure',$id)
        ->first();
        return view('listes_predefinies.liste_des_mesures_immediates.liste_des_mesures_immediate_update',compact('mesure','mesure_enr','privilege')) ;
      }
  

      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'id_mesure'=>'required|numeric|unique:c_status_mesure',
                     'descreption_mesure'=>'required',
                           ]); 

                DB::table('c_mesure_immediate')->where('id_mesure','like',$id)
                ->update([
                    'id_mesure'=>$request->id_mesure,
                    'descreption_mesure'=>$request->descreption_mesure,
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
            'id_mesure'=>'required|numeric|unique:c_mesure_immediate',
             'descreption_mesure'=>'required',
                   ]); 
 
                      DB::table('c_mesure_immediate')->insert([
                          'id_mesure'=>$request->id_mesure,
                          'descreption_mesure'=>$request->descreption_mesure,
                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        mesure::where('id_mesure',$id)->delete();
       
        return redirect()->route("mesure.index");

      }

}
