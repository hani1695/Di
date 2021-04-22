<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\pretypep;
use App\Constructionadresse;
use App\User;
use Auth;
use DB;


class ConstructionadresseController extends Controller
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
            $constructionadresses=constructionadresse::where('id_constp', 'like',"%$search%")
            ->paginate(20);  

             }elseif ($p=='R'){
                $constructionadresses=constructionadresse::where('nomp_dr', auth::user()->nomp_dr)# use app\user
                   ->where('id_constp', 'like',"%$search%")
                   ->latest()->paginate(20);  
             }elseif($p=='D'){

                    $constructionadresse=constructionadresse::where('id_constp', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){

                  $constructionadresse=constructionadresse::where('id_constp', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){

                  $constructionadresse=constructionadresse::where('id_constp', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){

                $constructionadresses=constructionadresse::where('id_constp', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $constructionadresses;     
     }

     public function index($id) {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();


        $constructionadresse=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();

        $construction = DB::table('b_construction')->where('id_const','=', $id)->first();
        $constructionadresses = DB::table('b_construction_adresse')->where('fk_id_const','=', $id)->get();
        $constructions= DB::table('b_construction')->get();
        $communes= DB::table('b_commune')->get();

        if ( $privilege->consultation) return view('constructions.constructionsadresses.constructionadresse',compact('constructionadresse','privilege','constructionadresses','construction','constructions','communes')) ;
        else
         return view('layouts.pasacces');   
      }

        public function edit($id){
        
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','wilayas') // pretypep constructionadresse ca marche pas
          ->first();    
  
         $constructionadresse=$this->recherche($privilege->visibilite);
         $auth= Auth::user();
         $constructionadresses = DB::table('b_construction_adresse')->where('id_constp','=', $id)->get();
         $constructionadresse_enr= constructionadresse::where('id_constp',$id)
          ->first();
          $constructions= DB::table('b_construction')->get();
          $communes= DB::table('b_commune')->get();

          return view('constructions.constructionsadresses.constructionadresseupdate',compact('constructionadresse','constructionadresse_enr','privilege','constructionadresses','constructions','communes')) ;
        }
        public function detaille($id){
        
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','wilayas') // pretypep constructionadresse ca marche pas
          ->first();    
  
         $constructionadresse=$this->recherche($privilege->visibilite);
         $auth= Auth::user();
         $constructionadresses = DB::table('b_construction_adresse')->where('id_constp','=', $id)->get();

         $constructionadresse_enr=  DB::table('b_construction_adresse')
         ->join('b_construction', 'b_construction.id_const', '=', 'b_construction_adresse.fk_id_const')
         ->where('id_constp',$id)->first();

          $constructions= DB::table('b_construction')->get();
          $communes= DB::table('b_commune')->get();

          return view('constructions.constructionsadresses.constructionadressedetaille',compact('constructionadresse','constructionadresse_enr','privilege','constructionadresses','constructions','communes')) ;
        }
    
        public function update(Request $request,$id){
          $data=request()->all();        

          
          $wilaya = DB::table('b_wilaya')->where('code_w','=', $request->fk_wilaya)->first();
          $daira = DB::table('b_daira')->where('code_d','=', $request->fk_daira)->first();

          $this->validate($request,[
            // 'id_constp' =>'required|numeric|unique:b_construction_adresse',
            'nomp' =>'required',
            'nom_arabp' =>'required',
            'numerop' =>'required|numeric|max:90000',
            'cotep' =>'required',
            'type_entreep' =>'required',                 
            'pretypep' =>'required',
            'nom_ruep' =>'required',
            'nom_rue_arp' =>'required',
            'nature_zonep' =>'required',                 
            'nom_zonep' =>'required',
            'nom_zone_arp' =>'required',
            'nom_adressep' =>'required',
            'nom_adresse_arp' =>'required',
            'occupationp' =>'required',
            'etat_constp' =>'required',                 
            // 'daira' =>'required|max:90000',
            // 'wilaya' =>'required|max:90000',
            // 'geom' =>'required|max:90000',
            'fk_id_const' =>'required',
            'fk_id_com' =>'required',
                   ]);            
     
                   DB::table('b_construction_adresse')->where('id_constp','like',$id)
                   ->update([
                    'id_constp'  =>$request->id_constp,
                    'nomp' =>$request->nomp,
                    'nom_arabp' =>$request->nom_arabp,
                    'numerop' =>$request->numerop,
                    'cotep' =>$request->cotep,
                    'type_entreep' =>$request->type_entreep,                 
                    'pretypep' =>$request->pretypep,
                    'nom_ruep' =>$request->nom_ruep,
                    'nom_rue_arp' =>$request->nom_rue_arp,
                    'nature_zonep' =>$request->nature_zonep, 
                    'nom_zonep'  =>$request->nom_zonep,                 
                    'nom_zone_arp' =>$request->nom_zone_arp,
                    'nom_adressep' =>$request->nom_adressep,
                    'nom_adresse_arp' =>$request->nom_adresse_arp,
                    'occupationp' =>$request->nom_adressep,
                    'etat_constp' =>$request->etat_constp,                
                    // 'daira' =>$daira->nom_d,
                    'wilaya' =>$wilaya->nom_w,
                    'geom' =>$request->geom,
                    'fk_id_const' =>$request->fk_id_const,
                    'fk_id_com' =>$request->fk_id_com,
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

          $wilaya = DB::table('b_wilaya')->where('code_w','=', $request->fk_wilaya)->first();
          $daira = DB::table('b_daira')->where('code_d','=', $request->fk_daira)->first();


        $this->validate($request,[
                    'id_constp' =>'required|numeric|unique:b_construction_adresse',
                    'nomp' =>'required',
                    'nom_arabp' =>'required',
                    'numerop' =>'required|numeric|max:90000',
                    'cotep' =>'required',
                    'type_entreep' =>'required',                 
                    'pretypep' =>'required',
                    'nom_ruep' =>'required',
                    'nom_rue_arp' =>'required',
                    'nature_zonep' =>'required',                 
                    'nom_zonep' =>'required',
                    'nom_zone_arp' =>'required',
                    'nom_adressep' =>'required',
                    'nom_adresse_arp' =>'required',
                    'occupationp' =>'required',
                    'etat_constp' =>'required',                 
                    // 'daira' =>'required',
                    // 'wilaya' =>'required',
                    // 'geom' =>'required|max:90000',
                    'fk_id_const' =>'required',
                    'fk_id_com' =>'required',
                    ]);            
                   
                    // return dd($request);

        
        DB::table('b_construction_adresse')->insert([
            'id_constp'  =>$request->id_constp,
            'nomp' =>$request->nomp,
            'nom_arabp' =>$request->nom_arabp,
            'numerop' =>$request->numerop,
            'cotep' =>$request->cotep,
            'type_entreep' =>$request->type_entreep,                 
            'pretypep' =>$request->pretypep,
            'nom_ruep' =>$request->nom_ruep,
            'nom_rue_arp' =>$request->nom_rue_arp,
            'nature_zonep' =>$request->nature_zonep, 
            'nom_zonep'  =>$request->nom_zonep,                 
            'nom_zone_arp' =>$request->nom_zone_arp,
            'nom_adressep' =>$request->nom_adressep,
            'nom_adresse_arp' =>$request->nom_adresse_arp,
            'occupationp' =>$request->nom_adressep,
            'etat_constp' =>$request->etat_constp,                
            // 'daira' =>$daira->nom_d,
            'wilaya' =>$wilaya->nom_w,
            'geom' =>$request->geom,
            'fk_id_const' =>$request->fk_id_const,
            'fk_id_com' =>$request->fk_id_com,
       ]);
          
       
           return back();
          
        }   
    
        public function destroy($id){
         
          
          constructionadresse::where('id_constp',$id)->delete();
         
          return redirect()->route("construction.index");
        }
  
  
  }
  


