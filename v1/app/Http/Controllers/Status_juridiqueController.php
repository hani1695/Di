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
use App\Status_juridique;
use App\User;
use Auth;
use DB;

class Status_juridiqueController extends Controller
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
                $status_juridiques=status_juridique::where('id_statu_j', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $status_juridiques=status_juridique::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_statu_j', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $status_juridique=status_juridique::where('id_statu_j', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $status_juridique=status_juridique::where('id_statu_j', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $status_juridique=status_juridique::where('id_statu_j', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $status_juridiques=status_juridique::where('id_statu_j', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $status_juridiques;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        $status_juridique=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $status_juridiques = DB::table('c_status_juridique')->get();
        if ( $privilege->consultation) return view('listes_predefinies.status_juridiques.status_juridique',compact('status_juridique','privilege','status_juridiques')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

       $status_juridique=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $status_juridique_enr= status_juridique::where('id_statu_j',$id)
        ->first();

        return view('Listes_predefinies.status_juridiques.status_juridique_update',compact('status_juridique','status_juridique_enr','privilege')) ;
      }
  
      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'id_statu_j'=>'required|numeric|unique:c_status_status_juridique',
                     'descreption_s'=>'required',
                           ]); 

                DB::table('c_status_juridique')->where('id_statu_j','like',$id)
                ->update([
                    'id_statu_j'=>$request->id_statu_j,
                    'descreption_s'=>$request->descreption_s,
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
            'id_statu_j'=>'required|numeric|unique:c_status_juridique',
             'descreption_s'=>'required',
                   ]); 
 
                      DB::table('c_status_juridique')->insert([
                          'id_statu_j'=>$request->id_statu_j,
                          'descreption_s'=>$request->descreption_s,
                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        status_juridique::where('id_statu_j',$id)->delete();
       
        return redirect()->route("status_juridique.index");

      }

}
