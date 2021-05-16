<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\organisme;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class OrganismeController extends Controller
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
                $organismes=organisme::where('nom', 'like',"%$search%")
                   ->paginate(20);  
             }elseif ($p=='R'){
                $organismes=organisme::where('nom_reg', auth::user()->nom_dr)
                   ->where('nom', 'like',"%$search%")
                   ->paginate(20);  
             }elseif($p=='L'){
                $organismes=organisme::where('nom_reg',auth::user()->nom_dr)
                   ->where('structure',auth::user()->structure)
                   ->where('nom', 'like',"%$search%")
                   ->paginate(20);
             }elseif($p=='P'){
                $organismes=organisme::where('nom', 'like',"%$search%")
                   ->paginate(20);
             }
        return $organismes;
     }
  
      public function index() {
        
      $privileges = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->get();
     
     foreach ($privileges as $privilege) {           
      $p= $privilege->visibilite;  
      $consultation=$privilege->consultation;
      $insertion=$privilege->insertion;
      $modification=$privilege->modification;
      $suppression=$privilege->suppression;       
      $telecharger= $privilege->telecharger;  
      $imprimer=$privilege->imprimer;
      $visualiser=$privilege->visualiser;
      $historique=$privilege->historique;
      $exporter=$privilege->exporter;   
      $gerer_permission=$privilege->gerer_permission;   
     }

        $organismes=$this->recherche($p);
        $auth= Auth::user();
        if ($consultation==1) 
        return view('organismes.organisme',['organisme'=> $organismes,'auth'=> $auth,'consultation'=>$consultation,'insertion'=>$insertion,'modification'=>$modification,'suppression'=>$suppression,'telecharger'=>$telecharger,'imprimer'=>$imprimer,'visualiser'=>$visualiser,'historique'=>$historique,'exporter'=>$exporter,'gerer_permission'=>$gerer_permission]) ;
        else return view('layouts.pasacces');  
      }
  
      public function create(){
        
      $privileges = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->get();
     
     foreach ($privileges as $privilege) {           
      $p= $privilege->visibilite;  
      $consultation=$privilege->consultation;
      $insertion=$privilege->insertion;
      $modification=$privilege->modification;
      $suppression=$privilege->suppression;       
      $telecharger= $privilege->telecharger;  
      $imprimer=$privilege->imprimer;
      $visualiser=$privilege->visualiser;
      $historique=$privilege->historique;
      $exporter=$privilege->exporter;   
      $gerer_permission=$privilege->gerer_permission;   
     }

       $organismes=$this->recherche($p);
       $auth= Auth::user();
       return view('organismes.organismecreate',['organisme'=> $organismes,'auth'=> $auth,'consultation'=>$consultation,'insertion'=>$insertion,'modification'=>$modification,'suppression'=>$suppression,'telecharger'=>$telecharger,'imprimer'=>$imprimer,'visualiser'=>$visualiser,'historique'=>$historique,'exporter'=>$exporter,'gerer_permission'=>$gerer_permission]) ;
      }
  
      public function edit($id){

        $privileges = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','organismes')
        ->get();
       
       foreach ($privileges as $privilege) {           
         $p= $privilege->visibilite;  
         $consultation=$privilege->consultation;
         $insertion=$privilege->insertion;
         $modification=$privilege->modification;
         $suppression=$privilege->suppression;       
         $telecharger= $privilege->telecharger;  
         $imprimer=$privilege->imprimer;
         $visualiser=$privilege->visualiser;
         $historique=$privilege->historique;
         $exporter=$privilege->exporter;   
         $gerer_permission=$privilege->gerer_permission;   
       }

       $organismes=$this->recherche($p);
       $auth= Auth::user();
       $organisme_enr= organisme::where('id',$id)
                             ->get();
        return view('organismes.organismeupdate',['organisme'=> $organismes, 'organisme_enr'=>$organisme_enr,'auth'=> $auth,'consultation'=>$consultation,'insertion'=>$insertion,'modification'=>$modification,'suppression'=>$suppression,'telecharger'=>$telecharger,'imprimer'=>$imprimer,'visualiser'=>$visualiser,'historique'=>$historique,'exporter'=>$exporter,'gerer_permission'=>$gerer_permission]) ;
      }
  
      public function update(Request $request){
        $data=request()->all();

        if ($request->nom_dr=='') $nom_dr=$request->nomdrread;
        else  $nom_dr=$request->nom_dr;

        if ($request->structure=='') $structure=$request->structureread;
        else  $structure=$request->structure;   

        if ($request->nom_dr==''){
        $this->validate($request,[
          'matricule'=>'required',
           'nom'=>'required',
           'prenom'=>'required',
            'nomdrread'=>'required',
             'structureread'=>'required',
            'fonction'=>'required',
             'email'=>'required',
              'profile'=>'required',
                 ]);
        }else{
          $this->validate($request,[
            'matricule'=>'required',
             'nom'=>'required',
             'prenom'=>'required',
             'nom_dr'=>'required',
              'structure'=>'required',
              'fonction'=>'required',
               'email'=>'required',
                'profile'=>'required',
                   ]);
        }        
  
        organisme::where('id','like',$request->id)
                 ->update([
                 'matricule' =>$request->matricule,
                 'nom' =>$request->nom,                 
                 'prenom' =>$request->prenom,
                 'nom_dr' =>$nom_dr,
                 'structure' =>$structure,
                 'fonction' =>$request->fonction,
                 'email' =>$request->email,
                 'profile' =>$request->profile,
                 ]);                   
      //   return response()
      //       ->back()//view('hello', $data, 200)
      //       ->header('Content-Type', $request); Response::json(array('success' => true, 'user_added' => 1), 200);  
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
          'matricule'=>'required',
           'nom'=>'required',
           'prenom'=>'required',
            'nom_dr'=>'required',
             'structure'=>'required',
            'fonction'=>'required',
             'email'=>'required',
              'profile'=>'required',
              'password'=>'required',
                 ]);
                 
         $fam= new organisme;
         $fam->matricule =$request->matricule;
         $fam->nom =$request->nom;
         $fam->prenom =$request->prenom;
         $fam->nom_dr =$request->nom_dr;
         $fam->structure =$request->structure;
         $fam->fonction =$request->fonction;
         $fam->email =$request->email;
         $fam->profile =$request->profile;
         $fam->password =Hash::make($request->password);
        
         $fam->save();
         return back();
      }   
  
      public function destroy($id){
        
        organisme::where('id',$id)->delete();;
       
         return back();
      }
}
