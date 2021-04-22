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
use App\User;
use Auth;
use DB;

class WilayaController extends Controller
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
                $wilayas=wilaya::where('nom_w', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $wilayas=wilaya::where('nom_dr', auth::user()->nom_dr)
                   ->where('nom_w', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $wilaya=wilaya::where('nom_w', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $wilaya=wilaya::where('nom_w', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $wilaya=wilaya::where('nom_w', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $wilayas=wilaya::where('nom_w', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $wilayas;     
     }
  
      public function index() {

        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        // $wilaya=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $wilayas = DB::table('b_wilaya')->get();
        // 'wilaya',
        if ( $privilege->consultation) return view('decoupage.wilayas.wilaya',compact('privilege','wilayas')) ;
        else
         return view('layouts.pasacces');   
      }
  
    //  public function create(){
        
    //   $privilege = DB::table('p_privileges') ->join('b_wilaya', 'b_wilaya.code', '=', 'p_privileges.wilaya_code')
    //   ->where('b_wilaya.code','=', Auth::user()->wilaya)
    //   ->where('volet_app','=','wilayas')
    //   ->first();     
   
    //    $wilaya=$this->recherche($privilege->visibilite);
    //    $auth= Auth::user();
    //   //  return view('wilayas.wilayacreate',compact('wilaya','privilege')) ;
    //   return view('decoupage.wilayas.wilaya',compact('wilaya','privilege')) ;
    //   }
  
      public function edit($id){
        //$privilege = DB::table('p_privileges') ->join('p_wilayas', 'p_wilayas.code', '=', 'p_privileges.wilaya_code')
        //->where('p_wilayas.code','=', Auth::user()->wilaya)
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

       $wilaya=$this->recherche($privilege->visibilite);

       $auth= Auth::user();
       $wilayas = DB::table('b_wilaya')->get();

       $wilaya_enr= wilaya::where('code_w',$id)
        ->first();
        // 'wilaya
        return view('decoupage.wilayas.wilayaupdate',compact('wilayas','wilaya_enr','privilege')) ;
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
                 'nom_w' =>'required',
                 'nom_w_arb' =>'required',                 
                 'siege_w' =>'required',
                 'autre_nom_w' =>'required',
                 ]);            
  
            // wilaya::where('code_w','like',$id)
            //      ->update([
            //      'nom_w' =>$request->nom_w,
            //      'nom_w_arb' =>$request->nom_w_arb,                 
            //      'siege_w' =>$request->siege_w,
            //      'autre_nom_w' =>$request->autre_nom_w,
            //      'geom_w' =>$request->geom_w,
            //      ]);   
                 
                 DB::table('b_wilaya')->where('code_w','like',$id)
                 ->update([
                   'nom_w' =>$request->nom_w,
                   'nom_w_arb' =>$request->nom_w_arb,
                   'siege_w' =>$request->siege_w,
                   'autre_nom_w' =>$request->autre_nom_w,
                  'geom_w' =>$request->geom_w
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
          'code_w'=>'required|unique:b_wilaya|numeric',
          'nom_w'=>'required',
          'nom_w_arb'=>'required',
           'siege_w'=>'required',
            'autre_nom_w'=>'required',
          //  'geom_w'=>'required',
                 ]);
                 
                 
        
      DB::table('b_wilaya')->insert([
        'code_w' =>$request->code_w, 
         'nom_w' =>$request->nom_w,
         'nom_w_arb' =>$request->nom_w_arb,
         'siege_w' =>$request->siege_w,
         'autre_nom_w' =>$request->autre_nom_w,
        'geom_w' =>$request->geom_w
      ]);
        
     
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        wilaya::where('code_w',$id)->delete();
       
        return redirect()->route("wilaya.index");
      }

      // public function show($id){

      //   wilaya::where('code_w',$id)->delete();
       
      //    return back();
      // }

}
