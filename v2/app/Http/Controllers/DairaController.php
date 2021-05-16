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
use App\Daira;
use App\User;
use Auth;
use DB;

class DairaController extends Controller
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
                $dairas=daira::where('nom_d', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $dairas=daira::where('nom_dr', auth::user()->nom_dr)
                   ->where('nom_d', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $daira=daira::where('nom_d', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $daira=daira::where('nom_d', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $daira=daira::where('nom_d', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $dairas=daira::where('nom_d', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $dairas;     
     }
  
      public function index() {

        $privilege = DB::table('p_privileges')->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
                // $district=$this->recherche($privilege->visibilite); 
        $daira= DB::table('b_daira')->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_daira.fk_code_wilaya')->get();
        $auth= Auth::user();
        $dairas = DB::table('b_daira')->get();
        $wilayas = DB::table('b_wilaya')->get();

        if ( $privilege->consultation) return view('decoupage.dairas.daira',compact('daira','privilege','dairas','wilayas')); 
        else
         return view('layouts.pasacces');   
      }
  
    //  public function create(){
        
    //   $privilege = DB::table('p_privileges') ->join('b_daira', 'b_daira.code', '=', 'p_privileges.daira_code')
    //   ->where('b_daira.code','=', Auth::user()->daira)
    //   ->where('volet_app','=','dairas')
    //   ->first();     
   
    //    $daira=$this->recherche($privilege->visibilite);
    //    $auth= Auth::user();
    //   //  return view('dairas.dairacreate',compact('daira','privilege')) ;
    //   return view('decoupage.dairas.daira',compact('daira','privilege')) ;
    //   }
  
      public function edit($id){
        //$privilege = DB::table('p_privileges') ->join('p_dairas', 'p_dairas.code', '=', 'p_privileges.daira_code')
        //->where('p_dairas.code','=', Auth::user()->daira)
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

                // $district=$this->recherche($privilege->visibilite); 
        $daira= DB::table('b_daira')->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_daira.fk_code_wilaya')->get();

       $auth= Auth::user();

       $daira_enr= daira::where('code_d',$id)
        ->first();
        $wilayas = DB::table('b_wilaya')->get();


        return view('decoupage.dairas.dairaupdate',compact('daira','daira_enr','privilege','wilayas')) ;
      }
  
      public function update(Request $request,$id){
        $data=request()->all();

        // if ($request->nom_dr=='') $nom_dr=$request->nomdrread;
        // else  $nom_dr=$request->nom_dr;

        // if ($request->structure=='') $structure=$request->structureread;
        // else  $structure=$request->structure;   

        // if ($request->nom_dr==''){
        // $this->validate($request,[
        //    'nom_w'=>'required',
        //    'nom_w_arb'=>'required',
        //     'siege_w'=>'required',
        //      'autre_nom_w'=>'required',
        //     'geom_w'=>'required',
        //          ]);
        // }else{
        //   $this->validate($request,[
        //     'nom_w'=>'required',
        //     'nom_w_arb'=>'required',
        //      'siege_w'=>'required',
        //       'autre_nom_w'=>'required',
        //      'geom_w'=>'required',
        //            ]);
        // }        
                  
        $this->validate($request,[
                   // 'code_d'=>'required|unique:b_daira|numeric',
                    'nom_d'=>'required',
                    // 'siege_d'=>'required',
                    //  'autre_nom_d'=>'required',
                    //   'source_donnees'=>'required',
                    //  'geom_d'=>'required',
                    'fk_code_wilaya'=>'required',
          
                           ]);
            // daira::where('code_w','like',$id)
            //      ->update([
            //      'nom_w' =>$request->nom_w,
            //      'nom_w_arb' =>$request->nom_w_arb,                 
            //      'siege_w' =>$request->siege_w,
            //      'autre_nom_w' =>$request->autre_nom_w,
            //      'geom_w' =>$request->geom_w,
            //      ]);   
                 
               
                DB::table('b_daira')->where('code_d','like',$id)
                ->update([
                    // 'code_d'=>$request->code_d,
                    'nom_d'=>$request->nom_d,
                    'siege_d'=>$request->siege_d,
                     'autre_nom_d'=>$request->autre_nom_d,
                      'source_donnees'=>$request->source_donnees,
                   'geom_d'=>$request->code_w,
                    'fk_code_wilaya'=>$request->fk_code_wilaya,
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
            'code_d'=>'required|unique:b_daira|numeric',
            'nom_d'=>'required',
            // 'siege_d'=>'required',
            //  'autre_nom_d'=>'required',
            //   'source_donnees'=>'required',
            //  'geom_d'=>'required',
            'fk_code_wilaya'=>'required',
  
                   ]);
                 
                 
        
                   DB::table('b_daira')->insert([
                    'code_d'=>$request->code_d,
                    'nom_d'=>$request->nom_d,
                    'siege_d'=>$request->siege_d,
                     'autre_nom_d'=>$request->autre_nom_d,
                      'source_donnees'=>$request->source_donnees,
                   'geom_d'=>$request->code_w,
                    'fk_code_wilaya'=>$request->fk_code_wilaya,
                  ]);
        
     
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        daira::where('code_d',$id)->delete();
       
        return redirect()->route("daira.index");
      }

      // public function show($id){

      //   daira::where('code_w',$id)->delete();
       
      //    return back();
      // }

}
