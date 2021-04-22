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
use App\Typeevenement;
use App\User;
use Auth;
use DB;

class TypeevenementController extends Controller
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
                    $typeevenements=typeevenement::where('id', 'like',"%$search%")
                       ->paginate(20);  
                 }elseif ($p=='R'){
                    $typeevenements=typeevenement::where('nom_dr', auth::user()->nom_dr)
                       ->where('id', 'like',"%$search%")
                       ->paginate(20);  
                 }elseif($p=='W'){
                        $typeevenement=typeevenement::where('id', 'like',"%$search%")
                                              ->where('limitation','!=', 'N')
                                              ->where('limitation','!=', 'R')
                                              ->paginate(20); 
                 }elseif($p=='D'){
                      $typeevenement=typeevenement::where('id', 'like',"%$search%")
                                            ->where('limitation','!=', 'N')
                                            ->where('limitation','!=', 'R')
                                            ->where('limitation','!=', 'W')
                                            ->paginate(20); 
                }elseif($p=='L'){
                      $typeevenement=typeevenement::where('id', 'like',"%$search%")
                                            ->where('limitation','!=', 'N')
                                            ->where('limitation','!=', 'R')
                                            ->where('limitation','!=', 'W')
                                            ->where('limitation','!=', 'D')
                                            ->paginate(20);     
                }elseif($p=='P'){
                    $typeevenements=typeevenement::where('id', 'like',"%$search%")
                    ->paginate(20);  
                 }              
            return $typeevenements;     
         }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        
    
         public function index () 
        {
            $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
            ->where('p_profiles.code','=', Auth::user()->profile)
            ->where('volet_app','=','wilayas')
            ->first();
            
            $typeevenement=$this->recherche($privilege->visibilite); 
            $auth= Auth::user();
            $typeevenements = DB::table('c_evenements')->get();
            if ( $privilege->consultation) return view('Listes_predefinies.liste_des_evenements.liste_des_evenement',compact('typeevenement','privilege','typeevenements')) ; 
            else
             return view('layouts.pasacces'); 
        }
      
         
      
          public function edit($id){
            
            $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
            ->where('p_profiles.code','=', Auth::user()->profile)
            ->where('volet_app','=','wilayas')
            ->first();      
    
           $typeevenement=$this->recherche($privilege->visibilite);
    
           $auth= Auth::user();
    
           $typeevenement_enr= typeevenement::where('id',$id)
            ->first();
    
            return view('Listes_predefinies.liste_des_evenements.liste_des_evenement_update',compact('typeevenement','typeevenement_enr','privilege')) ;
          }
      
          public function update(Request $request,$id){
            $data=request()->all();
    
                      
                     $this->validate($request,[                     
                         'libelle'=>'required|unique:c_evenements',
                               ]); 
    
                    DB::table('c_evenements')->where('id','like',$id)
                    ->update([                                              
                        'libelle'=>$request->libelle,
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
               
                'libelle'=>'required|unique:c_evenements',
                       ]); 
     
                          DB::table('c_evenements')->insert([
                             
                              'libelle'=>$request->libelle,
                            ]);
             return back();
            
          }   
      
          public function destroy($id){
            // return dd(5);
            
            typeevenement::where('id',$id)->delete();
           
            return redirect()->route("typeevenement.index");
    
          }
    
    }
    
