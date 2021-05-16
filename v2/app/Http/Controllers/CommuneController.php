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
use App\Commune;
use App\User;
use Auth;
use DB;


class CommuneController extends Controller
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
            // return dd(N);
            $communes=Commune::where('nom_c', 'like',"%$search%")
            ->paginate(20);  
             }elseif ($p=='R'){
               return dd(R);
                $communes=Commune::where('nom_dr', auth::user()->nom_dr)# use app\user
                   ->where('nom_c', 'like',"%$search%")
                   ->latest()->paginate(20);  
             }elseif($p=='D'){
               return dd(D);

                    $commune=Commune::where('nom_c', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
               return dd('D');

                  $commune=Commune::where('nom_c', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
               return dd('L');

                  $commune=Commune::where('nom_c', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
               return dd('P');

                $communes=Commune::where('nom_c', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $communes;     
     }

     public function index() {

        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
      
        $commune=DB::table('b_commune')
        ->join('b_wilaya','b_wilaya.code_w','=','b_commune.fk_wilaya')
        ->select("nom_w","nom_c","code_c","nom_c_arb")
        // ->dropColumn('geom')
        ->get();  
        // dd($commune);
        $auth= Auth::user();

        $communes = DB::table('b_commune')->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_commune.fk_wilaya')
        ->join('b_daira', 'b_daira.code_d', '=', 'b_commune.fk_diara')->get();
        $wilayas = DB::table('b_wilaya')->get();

        $dairas = DB::table('b_daira')->get();
        // ,'wilayas','dairas'
        if ( $privilege->consultation) return view('decoupage.communes.commune',compact('commune','privilege','communes')) ;
        else
         return view('layouts.pasacces');   
      }

    //   public function create(){
        
    //     $privilege = DB::table('p_privileges') ->join('b_wilaya', 'b_wilaya.code', '=', 'p_privileges.wilaya_code')
    //     ->where('b_wilaya.code','=', Auth::user()->wilaya)
    //     ->where('volet_app','=','wilayas')
    //     ->first();     
     
    //      $wilaya=$this->recherche($privilege->visibilite);
    //      $auth= Auth::user();
    //     //  return view('wilayas.wilayacreate',compact('wilaya','privilege')) ;
    //     return view('decoupage.wilayas.wilaya',compact('wilaya','privilege')) ;
    //     }
    
        public function edit($id){
        
          //$privilege = DB::table('p_privileges') ->join('p_wilayas', 'p_wilayas.code', '=', 'p_privileges.wilaya_code')
          //->where('p_wilayas.code','=', Auth::user()->wilaya)
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','wilayas') // wilaya commune ca marche pas
          ->first();    
  
        $commune=DB::table('b_commune')
        ->join('b_wilaya','b_wilaya.code_w','=','b_commune.fk_wilaya')
        ->select("nom_w","nom_c","code_c","nom_c_arb")
        ->get();  

         $auth= Auth::user();
  
         $commune_enr= commune::where('code_c',$id)
          ->first();
          $wilayas = DB::table('b_wilaya')->get();

        $dairas = DB::table('b_daira')->get();
        // ,'wilayas','dairas'
          return view('decoupage.communes.communeupdate',compact('commune','commune_enr','privilege')) ;
        }
        public function detaille($id){
        
          //$privilege = DB::table('p_privileges') ->join('p_wilayas', 'p_wilayas.code', '=', 'p_privileges.wilaya_code')
          //->where('p_wilayas.code','=', Auth::user()->wilaya)
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','wilayas') // wilaya commune ca marche pas
          ->first();    
         $commune=$this->recherche($privilege->visibilite);

         $auth= Auth::user();

         $commune_enr=  DB::table('b_commune')
         ->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_commune.fk_wilaya')
        //  ->join('b_daira', 'b_daira.code_d', '=', 'b_commune.fk_diara')
        // ->select("nom_w","nom_c","code_c","nom_c_arb")

        ->where('code_c',$id)
         ->first();
        //  dd(2);

          $wilayas = DB::table('b_wilaya')->get();

        $dairas = DB::table('b_daira')->get();

        // ,'wilayas','dairas'
          return view('decoupage.communes.communedetaille',compact('commune','commune_enr','privilege')) ;
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
            // 'code_c' =>'required|unique:b_commune',

                   'elevation' =>'numeric',
                  //  'nom_c_arb' =>'required',
                   'nom_c' =>'required',                 
                  //  'siege_c' =>'required',
                  //  'autre_nom_c' =>'required',
                  //  'nature_c' =>'required',                 
                  //  'source_donnees' =>'required',
                  //  'geom_com' =>'required',
                  //  'zone_sis' =>'required',
                   'distance_chef' =>'numeric',                 
                   'population' =>'numeric',
                   'surface' =>'numeric',
                   'zone_vent' =>'numeric',
                   'zone_niege' =>'numeric',                 
                   'fk_wilaya' =>'required',
                  //  'fk_diara' =>'required',
                   ]);            
    
              // commune::where('code_w','like',$id)
              //      ->update([
              //      'nom_w' =>$request->nom_w,
              //      'nom_w_arb' =>$request->nom_w_arb,                 
              //      'siege_w' =>$request->siege_w,
              //      'autre_nom_w' =>$request->autre_nom_w,
              //      'geom_w' =>$request->geom_w,
              //      ]);   
                   
                   DB::table('b_commune')->where('code_c','like',$id)
                   ->update([
                    'elevation' =>$request->elevation,
                    'nom_c_arb' =>$request->nom_c_arb,
                    'nom_c' =>$request->nom_c,                 
                    'siege_c' =>$request->siege_c,
                    'autre_nom_c' =>$request->autre_nom_c,
                    'nature_c' =>$request->nature_c,                 
                    'source_donnees' =>$request->source_donnees,
                    'geom_com' =>$request->geom_com,
                    'zone_sis' =>$request->zone_sis,
                    'distance_chef' =>$request->distance_chef,                 
                    'population' =>$request->population,
                    'surface' =>$request->surface,
                    'zone_vent' =>$request->zone_vent,
                    'zone_niege' =>$request->zone_niege,                 
                    'fk_wilaya' =>$request->fk_wilaya,
                    'fk_diara' =>$request->fk_diara,
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
                     'code_c' =>'required|unique:b_commune',
                    'elevation' =>'numeric',
                    // 'nom_c_arb' =>'required',
                    'nom_c' =>'required',                 
                    // 'siege_c' =>'required',
                    // 'autre_nom_c' =>'required',
                    // 'nature_c' =>'required',                 
                    // 'source_donnees' =>'required',
                  //   'geom_com' =>'required',
                    // 'zone_sis' =>'required',
                    'distance_chef' =>'numeric',                 
                    'population' =>'numeric',
                    'surface' =>'numeric',
                    'zone_vent' =>'numeric',
                    'zone_niege' =>'numeric',                 
                    'fk_wilaya' =>'required',
                    // 'fk_diara' =>'required',
                    ]);            
                   
                   
        
        DB::table('b_commune')->insert([
         'code_c'  =>$request->code_c,
         'elevation' =>$request->elevation,
         'nom_c_arb' =>$request->nom_c_arb,
         'nom_c' =>$request->nom_c,                 
         'siege_c' =>$request->siege_c,
         'autre_nom_c' =>$request->autre_nom_c,
         'nature_c' =>$request->nature_c,                 
         'source_donnees' =>$request->source_donnees,
         'geom_com' =>$request->geom_com,
         'zone_sis' =>$request->zone_sis,
         'distance_chef' =>$request->distance_chef,                 
         'population' =>$request->population,
         'surface' =>$request->surface,
         'zone_vent' =>$request->zone_vent,
         'zone_niege' =>$request->zone_niege,                 
         'fk_wilaya' =>$request->fk_wilaya,
         'fk_diara' =>$request->fk_diara,
       ]);
          
       
           return back();
          
        }   
    
        public function destroy($id){
         
          
          commune::where('code_c',$id)->delete();
         
          return redirect()->route("commune.index");
        }
  
      //   public function show($id){
  
      //     commune::where('code_c',$id)->delete();
         
      //      return back();
      //   }
  
  }
  


