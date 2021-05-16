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
        $constructionadresses = DB::table('b_construction_adresse')
        // ->join('c_type_adresses', 'c_type_adresses.id_type_adr', '=', 'b_construction_adresse.nature_zonep')
   
        ->where('fk_id_const','=', $id)->get();
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
  
          // $construction = DB::table('b_construction')->where('id_const','=', $constructionadresses->fk_id_const)->first();
          $constructionadresse_enr= constructionadresse::where('id_constp',$id)
           ->first();
          $construction = DB::table('b_construction')->where('id_const','=', $constructionadresse_enr->fk_id_const)->first();
         $constructionadresse=$this->recherche($privilege->visibilite);
         $auth= Auth::user();
         $constructionadresses = DB::table('b_construction_adresse')->where('id_constp','=', $id)->get();
          // dd($constructionadresses->fk_id_const);
          $constructions= DB::table('b_construction')->get();
          $communes= DB::table('b_commune')->get();
          // dd($construction);

          return view('constructions.constructionsadresses.constructionadresseupdate',compact('constructionadresse','constructionadresse_enr','privilege','constructionadresses','constructions','communes','construction')) ;
        }
        public function detaille($id){
        
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','wilayas') // pretypep constructionadresse ca marche pas
          ->first();    
  
         $constructionadresse=$this->recherche($privilege->visibilite);
         $auth= Auth::user();
         $constructionadresses = DB::table('b_construction_adresse')->where('id_constp','=', $id)->get();

         $teste=  DB::table('b_construction_adresse')
         ->join('b_construction', 'b_construction.id_const', '=', 'b_construction_adresse.fk_id_const')
         ->join('b_commune', 'b_commune.code_c', '=', 'b_construction_adresse.fk_id_comn')

         ->where('id_constp',$id)->first();
         if ($teste) {
          $constructionadresse_enr=  DB::table('b_construction_adresse')
          ->join('b_construction', 'b_construction.id_const', '=', 'b_construction_adresse.fk_id_const')
          ->join('c_type_adresses', 'c_type_adresses.descreption_t_adr', '=', 'b_construction_adresse.nature_zonep')
          ->join('b_commune', 'b_commune.code_c', '=', 'b_construction_adresse.fk_id_comn')
 
          ->where('id_constp',$id)->first();
         } else {
          $constructionadresse_enr=  DB::table('b_construction_adresse')
          ->join('b_construction', 'b_construction.id_const', '=', 'b_construction_adresse.fk_id_const')
          // ->join('b_commune', 'b_commune.code_c', '=', 'b_construction_adresse.fk_id_comn')
          ->where('id_constp',$id)->first();
         }
         
        

          $constructions= DB::table('b_construction')->get();
          $communes= DB::table('b_commune')->get();
          return view('constructions.constructionsadresses.constructionadressedetaille',compact('constructionadresse','constructionadresse_enr','privilege','constructionadresses','constructions','communes')) ;
        }
    
        public function update(Request $request,$id){
          $data=request()->all();        

          
          $wilaya = DB::table('b_wilaya')->where('code_w','=', $request->fk_wilaya)->first();
          $daira = DB::table('b_daira')->where('code_d','=', $request->fk_daira)->first();

          $nature_zonep=(int)$request->nature_zonep;
          // $nom_zonep=(int)$request->nom_zonep;
          $c_type_adresses = DB::table('c_type_adresses')->where('id_type_adr','=', $nature_zonep)->first();
          // $c_type_zone_voie = DB::table('c_type_zone_voie')->where('id_type_z_v','=', $nom_zonep)->first();

          $this->validate($request,[
            // 'id_constp' =>'required|numeric|unique:b_construction_adresse',
            'nomp' =>'required',
            // 'nom_arabp' =>'required',
            'numerop' =>'nullable|numeric',
            // 'cotep' =>'required',
            // 'type_entreep' =>'required',                 
            // 'pretypep' =>'required',
            // 'nom_ruep' =>'required',
            'nature_zonep' =>'required',                 
            'nom_zonep' =>'required',
            // 'nom_zone_arp' =>'required',
            // 'nom_rue_arp' =>'required',
            'nom_adressep' =>'required',
            // 'nom_adresse_arp' =>'required',
            // 'occupationp' =>'required',
            'etat_constp' =>'required',                 
            // 'daira' =>'required|max:90000',
            // 'wilaya' =>'required|max:90000',
            // 'geom' =>'required|max:90000',
            // 'fk_id_const' =>'required',
            'fk_id_comn' =>'required',
                   ]);            
     
                  //  dd( $request->fk_id_comn);

                   DB::table('b_construction_adresse')->where('id_constp','like',$id)
                   ->update([
                    // 'id_constp'  =>$request->id_constp,
                    'nomp' =>$request->nomp,
                    'nom_arabp' =>$request->nom_arabp,
                    'numerop' =>$request->numerop,
                    'cotep' =>$request->cotep,
                    'type_entreep' =>$request->type_entreep,                 
                    'pretypep' =>$request->pretypep,
                    'nom_ruep' =>$request->nom_ruep,
                    'nom_rue_arp' =>$request->nom_rue_arp,
                    'nature_zonep' =>$c_type_adresses->descreption_t_adr, 
                    'nom_zonep'  =>$request->nom_zonep,                 
                    'nom_zone_arp' =>$request->nom_zone_arp,
                    'nom_adressep' =>$request->nom_adressep,
                    'nom_adresse_arp' =>$request->nom_adresse_arp,
                    'occupationp' =>$request->nom_adressep,
                    'etat_constp' =>$request->etat_constp,                
                    // 'daira' =>$daira->nom_d,
                    // 'wilaya' =>$wilaya->nom_w,
                    'geom' =>$request->geom,
                    'fk_id_const' =>$request->fk_id_const,
                    'fk_id_comn' =>$request->fk_id_comn,
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

          $nature_zonep=(int)$request->nature_zonep;
          // $nom_zonep=(int)$request->nom_zonep;
          $c_type_adresses = DB::table('c_type_adresses')->where('id_type_adr','=', $nature_zonep)->first();
          // $c_type_zone_voie = DB::table('c_type_zone_voie')->where('id_type_z_v','=', $nom_zonep)->first();

          // dd( $request->nom_zonep);

        $this->validate($request,[
                    'id_constp' =>'required|numeric|unique:b_construction_adresse',
                    'nomp' =>'required',
                    // 'nom_arabp' =>'required',
                    'numerop' =>'nullable|numeric',
                    // 'cotep' =>'required',
                    // 'type_entreep' =>'required',                 
                    // 'pretypep' =>'required',
                    // 'nom_ruep' =>'required',
                    // 'nom_rue_arp' =>'required',
                    'nature_zonep' =>'required',                 
                    'nom_zonep' =>'required',
                    // 'nom_zone_arp' =>'required',
                    'nom_adressep' =>'required',
                    // 'nom_adresse_arp' =>'required',
                    // 'occupationp' =>'required',
                    'etat_constp' =>'required',                 
                                // 'daira' =>'required',
                                // 'wilaya' =>'required',
                                // 'geom' =>'required|max:90000',
                                // 'fk_id_const' =>'required',
                    'fk_id_comn' =>'required',
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
            'nature_zonep' =>$c_type_adresses->descreption_t_adr, 
            'nom_zonep'  =>$request->nom_zonep,                     
            'nom_zone_arp' =>$request->nom_zone_arp,
            'nom_adressep' =>$request->nom_adressep,
            'nom_adresse_arp' =>$request->nom_adresse_arp,
            'occupationp' =>$request->nom_adressep,
            'etat_constp' =>$request->etat_constp,                
            // 'daira' =>$daira->nom_d,
            // 'wilaya' =>$wilaya->nom_w,
            'geom' =>$request->geom,
            'fk_id_const' =>$request->fk_id_const,
            'fk_id_comn' =>$request->fk_id_comn,
       ]);
          
       
           return back();
          
        }   
    
        public function destroy($id){
         
          
          constructionadresse::where('id_constp',$id)->delete();
         
          return redirect()->route("construction.index");
        }
  
  
  }
  


