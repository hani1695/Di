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
use App\Typevoie;
use App\User;
use Auth;
use DB;

class TypevoieController extends Controller
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
                $typevoies=typevoie::where('id_type_v', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $typevoies=typevoie::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_type_v', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $typevoie=typevoie::where('id_type_v', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $typevoie=typevoie::where('id_type_v', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $typevoie=typevoie::where('id_type_v', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $typevoies=typevoie::where('id_type_v', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $typevoies;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();

        $typevoie=$this->recherche($privilege->visibilite); 

        $auth= Auth::user();
        $typevoies = DB::table('c_type_voie')->get();
        if ( $privilege->consultation) return view('listes_predefinies.type_voies.type_voie',compact('typevoie','privilege','typevoies')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      
        
       $typevoie=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $typevoie_enr= typevoie::where('id_type_v',$id)
        ->first();
        return view('listes_predefinies.type_voies.type_voie_update',compact('typevoie','typevoie_enr','privilege')) ;
      }
  

      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'id_type_v'=>'required|numeric|unique:c_status_typevoie',
                     'descreption_t_v'=>'required',
                           ]); 

                DB::table('c_type_voie')->where('id_type_v','like',$id)
                ->update([
                  //   'id_type_v'=>$request->id_type_v,
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
            // 'id_type_v'=>'required|numeric|unique:c_type_voie',
             'descreption_t_v'=>'required',
                   ]); 
 
                      DB::table('c_type_voie')->insert([
                        //   'id_type_v'=>$request->id_type_v,
                          'descreption_t_v'=>$request->descreption_t_v,
                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        typevoie::where('id_type_v',$id)->delete();
       
        return redirect()->route("typevoie.index");

      }

}