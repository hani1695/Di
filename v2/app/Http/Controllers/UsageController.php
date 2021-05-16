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
                $usages=usage::where('Code_usage_const', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $usages=usage::where('nom_dr', auth::user()->nom_dr)
                   ->where('Code_usage_const', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $usage=usage::where('Code_usage_const', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $usage=usage::where('Code_usage_const', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $usage=usage::where('Code_usage_const', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $usages=usage::where('Code_usage_const', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $usages;     
     }
  
      public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        $usage_famille = DB::table('b_usage_construction')->select('Famille_usage_const')->distinct()->get();
        $usage=DB::table('b_usage_construction')->get();
        $auth= Auth::user();
        $usages = DB::table('b_usage_construction')->get();
        if ( $privilege->consultation) return view('listes_predefinies.type_usages.type_usage',compact('usage','privilege','usages','usage_famille')) ; 
        else
         return view('layouts.pasacces');   
      }
  
      public function index2() {
         $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
         ->where('p_profiles.code','=', Auth::user()->profile)
         ->where('volet_app','=','wilayas')
         ->first();
         
         $usage_famille = DB::table('b_usage_construction')->select('Famille_usage_const')->distinct()->get();
         $usage=DB::table('b_usage_construction')->get();
         $auth= Auth::user();
         $usages = DB::table('b_usage_construction')->get();
         if ( $privilege->consultation) return view('listes_predefinies.type_usages.type-usagefamille',compact('usage','privilege','usages','usage_famille')) ; 
         else
          return view('layouts.pasacces');   
       }
      public function edit($id){
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

        $usage_famille = DB::table('b_usage_construction')->select('Famille_usage_const')->distinct()->get();

       $usage=DB::table('b_usage_construction')->get();

       $auth= Auth::user();

       $usage_enr= usage::where('Code_usage_const',$id)
        ->first();
         // dd($usage_enr);
        return view('Listes_predefinies.type_usages.type_usage_update',compact('usage_famille','usage','usage_enr','privilege')) ;
      }
  
      public function update(Request $request,$id){
        $data=request()->all();

                  
                 $this->validate($request,[
                  //   'Code_usage_const'=>'required|numeric|unique:c_status_usage',
                     // 'Libelle_usage_const'=>'required',
                     'Famille_usage_const'=>'required',
                     // 'Detail_usage_const'=>'required',


                           ]); 

                DB::table('b_usage_construction')->where('Code_usage_const','like',$id)
                ->update([
                    // 'Code_usage_const'=>$request->Code_usage_const,
                  //   'Libelle_usage_const'=>$request->Libelle_usage_const,
                    'Famille_usage_const'=>$request->Famille_usage_const,
                    'Detail_usage_const'=>$request->Detail_usage_const,


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
            'Code_usage_const'=>'required|numeric|unique:b_usage_construction|max:999',
            //  'Libelle_usage_const'=>'required',
             'Famille_usage_const'=>'required',
            //  'Detail_usage_const'=>'required',


                   ]); 
 
                      DB::table('b_usage_construction')->insert([
                          'Code_usage_const'=>$request->Code_usage_const,
                        //   'Libelle_usage_const'=>$request->Libelle_usage_const,
                          'Famille_usage_const'=>$request->Famille_usage_const,
                          'Detail_usage_const'=>$request->Detail_usage_const,

                        ]);
         return back();
        
      } 
      
      
     
        
  
      public function destroy($id){
        // return dd(5);
        
        usage::where('Code_usage_const',$id)->delete();
       
        return redirect()->route("usage.index");

      }

}
