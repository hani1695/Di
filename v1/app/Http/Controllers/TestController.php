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
use App\Voie;
use App\User;
use Auth;
use DB;

class VoieController extends Controller
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
                $voies=voie::where('id_type_v', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $voies=voie::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_type_v', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $voie=voie::where('id_type_v', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $voie=voie::where('id_type_v', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $voie=voie::where('id_type_v', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $voies=voie::where('id_type_v', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $voies;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        $voie=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $voies = DB::table('c_type_voie')->get();
        if ( $privilege->consultation) return view('listes_predefinies.type_voies.type_voie',compact('voie','privilege','voies')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      
        
       $voie=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $voie_enr= voie::where('id_type_v',$id)
        ->first();
        return view('listes_predefinies.type_voies.type_voie_update',compact('voie','voie_enr','privilege')) ;
      }
  

      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'id_type_v'=>'required|numeric|unique:c_status_voie',
                     'descreption_t_v'=>'required',
                           ]); 

                DB::table('c_type_voie')->where('id_type_v','like',$id)
                ->update([
                    'id_type_v'=>$request->id_type_v,
                    'descreption_t_v'=>$request->descreption_t_v,
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
            'id_type_v'=>'required|numeric|unique:c_type_voie',
             'descreption_t_v'=>'required',
                   ]); 
 
                      DB::table('c_type_voie')->insert([
                          'id_type_v'=>$request->id_type_v,
                          'descreption_t_v'=>$request->descreption_t_v,
                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        voie::where('id_type_v',$id)->delete();
       
        return redirect()->route("voie.index");

      }

}