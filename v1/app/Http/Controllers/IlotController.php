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
use App\Ilot;
use App\User;
use Auth;
use DB;


class IlotController extends Controller
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
                $ilots=ilot::where('id_ilot_', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $ilots=ilot::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_ilot_', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $ilot=ilot::where('id_ilot_', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $ilot=ilot::where('id_ilot_', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $ilot=ilot::where('id_ilot_', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $ilots=ilot::where('id_ilot_', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $ilots;     
     }
  
      public function index() {

        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        // $ilot=$this->recherche($privilege->visibilite); 
        $ilot= DB::table('b_ilot')->join('b_commune', 'b_commune.code_c', '=', 'b_ilot.fk_commune')
        ->join('b_district', 'b_district.id_district', '=', 'b_ilot.fk_district')->get();

        $auth= Auth::user();
        $ilots = DB::table('b_ilot')->get();
        $communes = DB::table('b_commune')->get();
        $districts = DB::table('b_district')->get();
        // ,'communes','districts'
        if ( $privilege->consultation) return view('decoupage.ilots.ilot',compact('ilot','privilege','ilots')) ; 
        else
         return view('layouts.pasacces');   
      }
  
    //  public function create(){
        
    //   $privilege = DB::table('p_privileges') ->join('b_ilot', 'b_ilot.code', '=', 'p_privileges.ilot_code')
    //   ->where('b_ilot.code','=', Auth::user()->ilot)
    //   ->where('volet_app','=','ilots')
    //   ->first();     
   
    //    $ilot=$this->recherche($privilege->visibilite);
    //    $auth= Auth::user();
    //   //  return view('ilots.ilotcreate',compact('ilot','privilege')) ;
    //   return view('decoupage.ilots.ilot',compact('ilot','privilege')) ;
    //   }
  
      public function edit($id){
        //$privilege = DB::table('p_privileges') ->join('p_ilots', 'p_ilots.code', '=', 'p_privileges.ilot_code')
        //->where('p_ilots.code','=', Auth::user()->ilot)
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

      //  $ilot=$this->recherche($privilege->visibilite);
      $ilot= DB::table('b_ilot')->join('b_commune', 'b_commune.code_c', '=', 'b_ilot.fk_commune')
      ->join('b_district', 'b_district.id_district', '=', 'b_ilot.fk_district')->get();

       $auth= Auth::user();

       $ilot_enr= ilot::where('id_ilot_',$id)
        ->first();
        $communes = DB::table('b_commune')->get();
        $districts = DB::table('b_district')->get();
        // ,'communes','districts'
        return view('decoupage.ilots.ilotupdate',compact('ilot','ilot_enr','privilege')) ;
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
                    // 'id_ilot_'=>'required|numeric',
                     'nom_ilot'=>'required',
                      'num_ilot'=>'required|numeric',
                      'nom_arb'=>'required',
                      'observation'=>'required',
                      // 'geom'=>'required',
                      'fk_district'=>'required',
                      'fk_commune'=>'required',
                           ]);
            // ilot::where('code_w','like',$id)
            //      ->update([
            //      'nom_w' =>$request->nom_w,
            //      'nom_w_arb' =>$request->nom_w_arb,                 
            //      'siege_w' =>$request->siege_w,
            //      'autre_nom_w' =>$request->autre_nom_w,
            //      'geom_w' =>$request->geom_w,
            //      ]);   
                 

                DB::table('b_ilot')->where('id_ilot_','like',$id)
                ->update([
                    'id_ilot_'=>$request->id_ilot_,
                    'nom_ilot'=>$request->nom_ilot,
                    'num_ilot'=>$request->num_ilot,
                    'nom_arb'=>$request->nom_arb,
                     'observation'=>$request->observation,
                      'geom'=>$request->geom,
                      'fk_district'=>$request->fk_district,
                      'fk_commune'=>$request->fk_commune,
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
            'id_ilot_'=>'required|numeric|unique:b_ilot',
             'nom_ilot'=>'required',
              'num_ilot'=>'required|numeric',
              'nom_arb'=>'required',
              'observation'=>'required',
              // 'geom'=>'required',
              'fk_district'=>'required',
              'fk_commune'=>'required',
                   ]);

                    DB::table('b_ilot')->insert([
                        'id_ilot_'=>$request->id_ilot_,
                        'nom_ilot'=>$request->nom_ilot,
                        'num_ilot'=>$request->num_ilot,
                        'nom_arb'=>$request->nom_arb,
                         'observation'=>$request->observation,
                          'geom'=>$request->geom,
                          'fk_district'=>$request->fk_district,
                          'fk_commune'=>$request->fk_commune,
                      ]);
     
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        ilot::where('id_ilot_',$id)->delete();
       
        return redirect()->route("ilot.index");
      }

      // public function show($id){

      //   ilot::where('code_w',$id)->delete();
       
      //    return back();
      // }

}
