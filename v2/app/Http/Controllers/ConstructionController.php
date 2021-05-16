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
use App\Construction;
use App\User;
use Auth;
use DB;


class ConstructionController extends Controller
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
            $constructions=construction::where('id_const', 'like',"%$search%")
            ->paginate(20);  

             }elseif ($p=='R'){
                $constructions=construction::where('nom_dr', auth::user()->nom_dr)# use app\user
                   ->where('id_const', 'like',"%$search%")
                   ->latest()->paginate(20);  
             }elseif($p=='D'){

                    $construction=construction::where('id_const', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){

                  $construction=construction::where('id_const', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){

                  $construction=construction::where('id_const', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){

                $constructions=construction::where('id_const', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $constructions;     
     }

     public function index() {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();

        // $construction=$this->recherche($privilege->visibilite); 

        $auth= Auth::user();

        $constructions = DB::table('b_construction')->get();
        $wilayas = DB::table('b_wilaya')->get();
        $dairas = DB::table('b_daira')->get();
        $communes = DB::table('B_commune')->get();
        $districts = DB::table('b_district')->get();
        $ilots = DB::table('b_ilot')->get();
        // ,'wilayas','dairas','communes','districts','ilots'
        $usages=DB::table('b_usage_construction')->get();

        if ( $privilege->consultation) return view('constructions.constructions.construction',compact('usages','privilege','constructions')) ;
        else
         return view('layouts.pasacces');   
      }

        public function edit($id){
        
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','wilayas') // wilaya construction ca marche pas
          ->first();    
  
        //  $construction=$this->recherche($privilege->visibilite);

         $auth= Auth::user();
  
         $constructions = DB::table('b_construction')->get();

         $construction_enr= construction::where('id_const',$id)
          ->first();
          // dd( $construction_enr);
          $wilayas = DB::table('b_wilaya')->get();
          $dairas = DB::table('b_daira')->get();
          $communes = DB::table('B_commune')->get();
          $districts = DB::table('b_district')->get();
          $ilots = DB::table('b_ilot')->get();
          // ,'wilayas','dairas','communes','districts','ilots'
          $usages=DB::table('b_usage_construction')->get();

          return view('constructions.constructions.constructionupdate',compact('usages','constructions','construction_enr','privilege'
          ,'wilayas','dairas','communes','districts','ilots')) ;
        }
    
        public function update(Request $request,$id){
          $data=request()->all();    
          $this->validate($request,[
                    // 'id_const' =>'required|unique:b_construction',
                    'nom' =>'required',
                  //  'nom_arab' =>'required',
                   'Famille_usage_const' =>'required',
                   'usage' =>'required',
                   'etat_const' =>'required',
                  //  'lieudit' =>'required',

                  //  'daira' =>'required',                 
                  //  'wilaya' =>'required',
                  //  'geom' =>'required',
                   'fk_id_comn' =>'required',
                   'fk_id_wilaya' =>'required',                 
                  //  'fk_id_daira' =>'required',
                  //  'fk_district' =>'required',
                  //  'fk_ilot' =>'required',
                  // 'proprietaire' =>'required',

                   ]);            
                  
                   $wilaya = DB::table('b_wilaya')->where('code_w',$request->fk_id_wilaya)->first();
                  //  $daira = DB::table('b_daira')->where('code_d',$request->fk_id_daira)->first();

                   
                   DB::table('b_construction')->where('id_const','like',$id)
                   ->update([
                    'nom' =>$request->nom,
                    'nom_arab' =>$request->nom_arab,
                    // 'id_const' =>$request->id_const,     
                    'Famille_usage_const' =>$request->Famille_usage_const,            
                    'usage' =>$request->usage,
                    'etat_const' =>$request->etat_const,
                    'lieudit' =>$request->lieudit,

                    // 'daira' =>$daira->nom_d,                 
                    'wilaya' =>$wilaya->nom_w,
                    'geom' =>$request->geom,
                    'fk_id_comn' =>$request->fk_id_comn,
                    'fk_id_wilaya' =>$request->fk_id_wilaya,                 
                    // 'fk_id_daira' =>$request->fk_id_daira,
                    // 'fk_district' =>$request->fk_district,
                    // 'fk_ilot' =>$request->fk_ilot,
                    'proprietaire' =>$request->proprietaire,                 

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
                     'id_const' =>'required|unique:b_construction',
                    'nom' =>'required',
                    // 'nom_arab' =>'required',
                    'Famille_usage_const' =>'required',
                    'usage' =>'required',
                    'etat_const' =>'required',
                    // 'lieudit' =>'required',
                    // 'daira' =>'required',                 
                    // 'wilaya' =>'required',
                  //   'geom' =>'required',
                    'fk_id_comn' =>'required',
                    'fk_id_wilaya' =>'required',                 
                    // 'fk_id_daira' =>'required',
                    // 'fk_district' =>'required',
                    // 'fk_ilot' =>'required',
                    // 'proprietaire' =>'required',                 

                
                    ]);            
                   
                    $wilaya = DB::table('b_wilaya')->where('code_w',$request->fk_id_wilaya)->first();
                    // $daira = DB::table('b_daira')->where('code_d',$request->fk_id_daira)->first();
        
        DB::table('b_construction')->insert([
         'id_const'  =>$request->id_const,
         'nom' =>$request->nom,
         'nom_arab' =>$request->nom_arab,
         'Famille_usage_const' =>$request->Famille_usage_const,
         'usage' =>$request->usage,
         'etat_const' =>$request->etat_const,
         'lieudit' =>$request->lieudit,
        //  'daira' =>$daira->nom_d,                 
         'wilaya' =>$wilaya->nom_w,
         'geom' =>$request->geom,
         'fk_id_comn' =>$request->fk_id_comn,
         'fk_id_wilaya' =>$request->fk_id_wilaya, 
      //    'fk_id_daira' =>$request->fk_id_daira,                 
                
      //    'fk_district' =>$request->fk_district,
      //    'fk_ilot' =>$request->fk_ilot,
      'proprietaire' =>$request->proprietaire,                 

       ]);
          
       
           return back();
          
        }   
    
        public function destroy($id){
         
          
          construction::where('id_const',$id)->delete();
         
          return redirect()->route("construction.index");
        }
  
  
  }
  


