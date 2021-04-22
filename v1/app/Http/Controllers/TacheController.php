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
use App\Tache;
use App\User;
use Auth;
use DB;

class TacheController extends Controller
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
                $taches=tache::where('tache', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $taches=tache::where('nom_dr', auth::user()->nom_dr)
                   ->where('tache', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $tache=tache::where('tache', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $tache=tache::where('tache', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $tache=tache::where('tache', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $taches=tache::where('tache', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $taches;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();

        $tache=$this->recherche($privilege->visibilite); 

        $auth= Auth::user();
        $taches = DB::table('p_taches')->get();
        if ( $privilege->consultation) return view('actions.taches.tache',compact('tache','privilege','taches')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      
        
       $tache=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $tache_enr= tache::where('tache',$id)
        ->first();
        return view('actions.taches.tacheupdate',compact('tache','tache_enr','privilege')) ;
      }
  

      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                    'tache'=>'required|unique:c_status_tache',
                     'description'=>'required',
                           ]); 

                DB::table('p_taches')->where('tache','like',$id)
                ->update([
                    'tache'=>$request->tache,
                    'description'=>$request->description,
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
            'tache'=>'required|unique:p_taches',
             'description'=>'required',
                   ]); 
 
                      DB::table('p_taches')->insert([
                          'tache'=>$request->tache,
                          'description'=>$request->description,
                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        tache::where('tache',$id)->delete();
       
        return redirect()->route("tache.index");

      }

}