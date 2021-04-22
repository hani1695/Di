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
use App\troncon_routier;
use App\User;
use Auth;
use DB;
class Troncon_routierController extends Controller
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
                $troncon_routiers=troncon_routier::where('id_tr', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $troncon_routiers=troncon_routier::where('nom_dr', auth::user()->nom_dr)
                   ->where('id_tr', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='W'){
                    $troncon_routier=troncon_routier::where('id_tr', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
             }elseif($p=='D'){
                  $troncon_routier=troncon_routier::where('id_tr', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
            }elseif($p=='L'){
                  $troncon_routier=troncon_routier::where('id_tr', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20);     
            }elseif($p=='P'){
                $troncon_routiers=troncon_routier::where('id_tr', 'like',"%$search%")
                ->paginate(20);  
             }              
        return $troncon_routiers;     
     }
  
      public function index() {

        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();
        
        $troncon_routier=$this->recherche($privilege->visibilite); 
        $auth= Auth::user();
        $troncon_routiers = DB::table('b_troncon_routier')->get();
        if ( $privilege->consultation) return view('decoupage.troncon_routiers.troncon_routier',compact('troncon_routier','privilege','troncon_routiers')) ; 
        else
         return view('layouts.pasacces');   
      }
  
    //  public function create(){
        
    //   $privilege = DB::table('p_privileges') ->join('b_troncon_routier', 'b_troncon_routier.code', '=', 'p_privileges.troncon_routier_code')
    //   ->where('b_troncon_routier.code','=', Auth::user()->troncon_routier)
    //   ->where('volet_app','=','troncon_routiers')
    //   ->first();     
   
    //    $troncon_routier=$this->recherche($privilege->visibilite);
    //    $auth= Auth::user();
    //   //  return view('troncon_routiers.troncon_routiercreate',compact('troncon_routier','privilege')) ;
    //   return view('decoupage.troncon_routiers.troncon_routier',compact('troncon_routier','privilege')) ;
    //   }
  
      public function edit($id){
        //$privilege = DB::table('p_privileges') ->join('p_troncon_routiers', 'p_troncon_routiers.code', '=', 'p_privileges.troncon_routier_code')
        //->where('p_troncon_routiers.code','=', Auth::user()->troncon_routier)
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','wilayas')
        ->first();      

       $troncon_routier=$this->recherche($privilege->visibilite);

       $auth= Auth::user();

       $troncon_routier_enr= troncon_routier::where('id_tr',$id)
        ->first();

        return view('decoupage.troncon_routiers.troncon_routierupdate',compact('troncon_routier','troncon_routier_enr','privilege')) ;
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
                    // 'id_tr'=>'required|numeric|unique:b_troncon_routier',
                     'num_route'=>'required',
                      'classification'=>'required',
                      'nb_voie'=>'required',
                      'sens'=>'required',
                      'carossable'=>'required',
                      'debut_droite'=>'required',
                      'debut_gauche'=>'required',
                      'fin_droite'=>'required',
                      'fin_gauche'=>'required',
                      'code_com_dte'=>'required',
                      'code_com_ghe'=>'required',
                      'etat_route'=>'required',
                      'observation'=>'required',
                    //   'geom'=>'required',
                    //   'fk_commune'=>'required',
                    //   'fk_wilaya'=>'required',


                           ]);
            // troncon_routier::where('code_w','like',$id)
            //      ->update([
            //      'nom_w' =>$request->nom_w,
            //      'nom_w_arb' =>$request->nom_w_arb,                 
            //      'siege_w' =>$request->siege_w,
            //      'autre_nom_w' =>$request->autre_nom_w,
            //      'geom_w' =>$request->geom_w,
            //      ]);   
                 

                DB::table('b_troncon_routier')->where('id_tr','like',$id)
                ->update([
                    
                    'id_tr'=>$request->id_tr,
                    'num_route'=>$request->num_route,
                    'classification'=>$request->classification,
                    'nb_voie'=>$request->nb_voie,
                     'sens'=>$request->sens,
                      'carossable'=>$request->carossable,
                      'debut_droite'=>$request->debut_droite,
                      'debut_gauche'=>$request->debut_gauche,
                      'fin_droite'=>$request->fin_droite,
                    'fin_gauche'=>$request->fin_gauche,
                    'code_com_dte'=>$request->code_com_dte,
                    'code_com_ghe'=>$request->code_com_ghe,
                     'etat_route'=>$request->etat_route,
                      'observation'=>$request->observation,
                      'geom'=>$request->geom,
                      'fk_commune'=>$request->fk_commune,
                      'fk_wilaya'=>$request->fk_wilaya,

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
            'id_tr'=>'required|numeric|unique:b_troncon_routier',
             'num_route'=>'required',
              'classification'=>'required',
              'nb_voie'=>'required',
              'sens'=>'required',
              'carossable'=>'required',
              'debut_droite'=>'required',
              'debut_gauche'=>'required',
              'fin_droite'=>'required',
              'fin_gauche'=>'required',
              'code_com_dte'=>'required',
              'code_com_ghe'=>'required',
              'etat_route'=>'required',
              'observation'=>'required',
            //   'geom'=>'required',
            //   'fk_commune'=>'required',
            //   'fk_wilaya'=>'required',

                      DB::table('b_troncon_routier')->insert([
                          'id_tr'=>$request->id_tr,
                          'num_route'=>$request->num_route,
                          'classification'=>$request->classification,
                          'nb_voie'=>$request->nb_voie,
                           'sens'=>$request->sens,
                            'carossable'=>$request->carossable,
                            'debut_droite'=>$request->debut_droite,
                            'debut_gauche'=>$request->debut_gauche,
                            'fin_droite'=>$request->fin_droite,
                          'fin_gauche'=>$request->fin_gauche,
                          'code_com_dte'=>$request->code_com_dte,
                          'code_com_ghe'=>$request->code_com_ghe,
                           'etat_route'=>$request->etat_route,
                            'observation'=>$request->observation,
                            'geom'=>$request->geom,
                            'fk_commune'=>$request->fk_commune,
                            'fk_wilaya'=>$request->fk_wilaya,
      
                        ]);
         return back();
        
      }   
  
      public function destroy($id){
        // return dd(5);
        
        troncon_routier::where('id_tr',$id)->delete();
       
        return redirect()->route("ilot.index");
      }

      // public function show($id){

      //   troncon_routier::where('code_w',$id)->delete();
       
      //    return back();
      // }

}
