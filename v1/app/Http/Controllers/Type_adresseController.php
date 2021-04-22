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
use App\type_adresse;
use App\User;
use Auth;
use DB;

class type_adresseController extends Controller
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
                $type_adresses=type_adresse::where('id_type_adr', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $type_adresses=type_adresse::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_type_adr', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $type_adresse=type_adresse::where('id_type_adr', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $type_adresse=type_adresse::where('id_type_adr', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $type_adresse=type_adresse::where('id_type_adr', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $type_adresses=type_adresse::where('id_type_adr', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $type_adresses;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        $type_adresse=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $type_adresses = DB::table('c_type_adresses')->get();
        if ( $privilege->consultation) return view('Listes_predefinies.type_adresses.type_adresse',compact('type_adresse','privilege','type_adresses')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

       $type_adresse=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $type_adresse_enr= type_adresse::where('id_type_adr',$id)
        ->first();

        return view('Listes_predefinies.type_adresses.type_adresse_update',compact('type_adresse','type_adresse_enr','privilege')) ;
      }
  
      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'id_type_adr'=>'required|numeric|unique:c_type_adresses',
                     'descreption_t_adr'=>'required',
                           ]); 

                DB::table('c_type_adresses')->where('id_type_adr','like',$id)
                ->update([
                    'id_type_adr'=>$request->id_type_adr,
                    'descreption_t_adr'=>$request->descreption_t_adr,
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
            'id_type_adr'=>'required|numeric|unique:c_type_adresses',
             'descreption_t_adr'=>'required',
                   ]); 
                   
                      DB::table('c_type_adresses')->insert([
                          'id_type_adr'=>$request->id_type_adr,
                          'descreption_t_adr'=>$request->descreption_t_adr,
                        ]);
     
         return back();
        
      }   
  
      public function destroy($id){
        
        type_adresse::where('id_type_adr',$id)->delete();

         return redirect()->route("type_adresse.index");
         
      }

}
