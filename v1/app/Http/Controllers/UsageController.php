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
use App\Usage;
use App\User;
use Auth;
use DB;

class UsageController extends Controller
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
                $usages=usage::where('id_usage', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $usages=usage::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_usage', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $usage=usage::where('id_usage', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $usage=usage::where('id_usage', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $usage=usage::where('id_usage', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $usages=usage::where('id_usage', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $usages;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        $usage=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $usages = DB::table('c_usage')->get();
        if ( $privilege->consultation) return view('listes_predefinies.type_usages.type_usage',compact('usage','privilege','usages')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

       $usage=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $usage_enr= usage::where('id_usage',$id)
        ->first();

        return view('Listes_predefinies.type_usages.type_usage_update',compact('usage','usage_enr','privilege')) ;
      }
  
      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'id_usage'=>'required|numeric|unique:c_status_usage',
                     'descreption_u'=>'required',
                           ]); 

                DB::table('c_usage')->where('id_usage','like',$id)
                ->update([
                    'id_usage'=>$request->id_usage,
                    'descreption_u'=>$request->descreption_u,
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
            'id_usage'=>'required|numeric|unique:c_usage',
             'descreption_u'=>'required',
                   ]); 
 
                      DB::table('c_usage')->insert([
                          'id_usage'=>$request->id_usage,
                          'descreption_u'=>$request->descreption_u,
                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        usage::where('id_usage',$id)->delete();
       
        return redirect()->route("usage.index");

      }

}
