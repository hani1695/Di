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
use App\District;
use App\User;
use Auth;
use DB;

class DistrictController extends Controller
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
                $districts=district::where('num_district', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $districts=district::where('nom_dr', auth::user()->nom_dr)
                   ->where('num_district', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $district=district::where('num_district', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $district=district::where('num_district', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $district=district::where('num_district', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $districts=district::where('num_district', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $districts;     
     }
  
      public function index() {

        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        // $district=$this->recherche($privilege->visibilite); 
        $district= DB::table('b_district')->join('b_commune', 'b_commune.code_c', '=', 'b_district.fk_commune')->get(); 

        $auth= Auth::user();
        $districts = DB::table('b_district')->get();
        // $communes = DB::table('b_commune')->get();
        // ,'communes'
        if ( $privilege->consultation) return view('decoupage.districts.district',compact('district','privilege','districts')) ; 
        else
         return view('layouts.pasacces');   
      }
  
    //  public function create(){
        
    //   $privilege = DB::table('p_privileges') ->join('b_district', 'b_district.code', '=', 'p_privileges.district_code')
    //   ->where('b_district.code','=', Auth::user()->district)
    //   ->where('volet_app','=','districts')
    //   ->first();     
   
    //    $district=$this->recherche($privilege->visibilite);
    //    $auth= Auth::user();
    //   //  return view('districts.districtcreate',compact('district','privilege')) ;
    //   return view('decoupage.districts.district',compact('district','privilege')) ;
    //   }
  
      public function edit($id){
        //$privilege = DB::table('p_privileges') ->join('p_districts', 'p_districts.code', '=', 'p_privileges.district_code')
        //->where('p_districts.code','=', Auth::user()->district)
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

      //  $district=$this->recherche($privilege->visibilite);
       $district= DB::table('b_district')->join('b_commune', 'b_commune.code_c', '=', 'b_district.fk_commune')->get(); 

       $auth= Auth::user();

       $district_enr= district::where('id_district',$id)
        ->first();
        // $communes = DB::table('b_commune')->get();
        // ,'communes'

        return view('decoupage.districts.districtupdate',compact('district','district_enr','privilege')) ;
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
                    // 'id_district'=>'required|numeric',
                    'num_district'=>'required|numeric',
                     'observation'=>'required',
                    //   'geom'=>'required',
                     'fk_commune'=>'required',
                           ]);
            // district::where('code_w','like',$id)
            //      ->update([
            //      'nom_w' =>$request->nom_w,
            //      'nom_w_arb' =>$request->nom_w_arb,                 
            //      'siege_w' =>$request->siege_w,
            //      'autre_nom_w' =>$request->autre_nom_w,
            //      'geom_w' =>$request->geom_w,
            //      ]);   
                 
               
                DB::table('b_district')->where('id_district','like',$id)
                ->update([
                    'id_district'=>$request->id_district,
                    'num_district'=>$request->num_district,
                    'observation'=>$request->observation,
                     'geom'=>$request->geom,
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
                'id_district'=>'required|unique:b_district|numeric',
                'num_district'=>'required|numeric',
                 'observation'=>'required',
                //   'geom'=>'required',
                 'fk_commune'=>'required',
                       ]);
  
                 
                 
                  DB::table('b_district')->insert([
                      'id_district'=>$request->id_district,
                      'num_district'=>$request->num_district,
                      'observation'=>$request->observation,
                       'geom'=>$request->geom,
                        'fk_commune'=>$request->fk_commune,
                    ]);
     
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        district::where('id_district',$id)->delete();
       
        return redirect()->route("district.index");
      }

      // public function show($id){

      //   district::where('code_w',$id)->delete();
       
      //    return back();
      // }

}
