<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Utilisateur;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class UtilisateurController extends Controller
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
                $utilisateurs=Utilisateur::where('nom', 'like',"%$search%")
                   ->latest()->paginate(20);  
             }elseif ($p=='R'){
                $utilisateurs=Utilisateur::where('nom_dr', auth::user()->nom_dr)
                   ->where('nom', 'like',"%$search%")
                   ->latest()->paginate(20);  
             }elseif($p=='L'){
                $utilisateurs=Utilisateur::where('nom_dr',auth::user()->nom_dr)
                   ->where('structure',auth::user()->structure)
                   ->where('nom', 'like',"%$search%")
                   ->latest()->paginate(20);  
             }elseif($p=='P'){
                $utilisateurs=Utilisateur::where('nom', 'like',"%$search%")
                ->latest()->paginate(20);  
             }              
             
        return $utilisateurs;     
     }
  
      public function index() {
       
      $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','utilisateurs')
      ->first();
      
      
      $utilisateur = Utilisateur::join('b_organismes','b_organismes.id','=','b_users.organisme')
        ->join('b_direction','b_direction.id','=','b_users.nom_dr')
        ->join('b_structures','b_structures.code_ag','=','b_users.structure')
        ->select("*","b_direction.nom as dr","b_organismes.nom as org","b_structures.nom_ag as str","b_users.id as uid")
      ->get();
      // dd($utilisateur);
        $auth= Auth::user();
        $profiles = DB::table('p_profiles')->get();
        if ( $privilege->consultation) return view('utilisateurs.utilisateur',compact('utilisateur','privilege','profiles')) ;
        else return view('layouts.pasacces');   
      }
  
      public function create(){
        
      $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','utilisateurs')
      ->first();     
   
       $utilisateur=$this->recherche($privilege->visibilite);
       $auth= Auth::user();
       return view('utilisateurs.utilisateurcreate',compact('utilisateur','privilege')) ;
      }
  
      public function edit($id){

        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','utilisateurs')
        
        ->first();
       
      //  foreach ($privileges as $privilege) {           
      //    $p= $privilege->visibilite;  
      //    $consultation=$privilege->consultation;
      //    $insertion=$privilege->insertion;
      //    $modification=$privilege->modification;
      //    $suppression=$privilege->suppression;       
      //    $telecharger= $privilege->telecharger;  
      //    $imprimer=$privilege->imprimer;
      //    $visualiser=$privilege->visualiser;
      //    $historique=$privilege->historique;
      //    $exporter=$privilege->exporter;   
      //    $gerer_permission=$privilege->gerer_permission;   
      //  }
      $profiles = DB::table('p_profiles')->get();
      $utilisateur = Utilisateur::join('b_organismes','b_organismes.id','=','b_users.organisme')
      ->join('b_direction','b_direction.id','=','b_users.nom_dr')
      ->join('b_structures','b_structures.code_ag','=','b_users.structure')
      ->select("*","b_direction.nom as dr","b_organismes.nom as org","b_structures.nom_ag as str","b_users.id as uid")
    ->get();
      //  dd($utilisateur);
       $auth= Auth::user();
       $utilisateur_enr= Utilisateur::where('id',$id)->select("*","b_users.id as uid")
                        ->first();
      // dd($utilisateur_enr)  ;          
        return view('utilisateurs.utilisateurupdate',compact('utilisateur','utilisateur_enr','privilege','profiles')) ;
      }
  
      public function update(Request $request,$id){
         // dd($request->all());
      //   $data=request()->all();

      //   if ($request->nom_dr=='') $nom_dr=$request->nomdrread;
      //   else  $nom_dr=$request->nom_dr;

      //   if ($request->structure=='') $structure=$request->structureread;
      //   else  $structure=$request->structure;   

      //   if ($request->nom_dr==''){
      //   $this->validate($request,[
      //     'matricule'=>'required',
      //      'nom'=>'required',
      //      'prenom'=>'required',
      //       'nomdrread'=>'required',
      //        'structureread'=>'required',
      //       'fonction'=>'required',
      //        'email'=>'required',
      //         'profile'=>'required',
      //            ]);
      //   }else{
      //     $this->validate($request,[
      //       'matricule'=>'required',
      //        'nom'=>'required',
      //        'prenom'=>'required',
      //        'nom_dr'=>'required',
      //         'structure'=>'required',
      //         'fonction'=>'required',
      //          'email'=>'required',
      //           'profile'=>'required',
      //              ]);
      //   }        
  
      //   Utilisateur::where('id','like',$request->id)
      //            ->update([
      //            'matricule' =>$request->matricule,
      //            'nom' =>$request->nom,                 
      //            'prenom' =>$request->prenom,
      //            'nom_dr' =>$nom_dr,
      //            'structure' =>$structure,
      //            'fonction' =>$request->fonction,
      //            'email' =>$request->email,
      //            'profile' =>$request->profile,
      //            ]);                   
                 
      //   return back();

      $array = [
         'matricule' => 'required|unique:b_users,matricule,'.$id,
         'nom' => 'required',
         'prenom'=>'required',
         'email' => 'required|unique:b_users,email,'.$id,
         'nom_dr'=>'required',
         'organisme'=>'required',
         'structure'=>'required',
         'fonction'=>'required',
         'email'=>'required',
         'profile'=>'required',
         
      ];
      if (! empty($request->password)) {
         $array['password'] = 'string|min:6|confirmed';
      }
      $data=$request->validate($array);
      
      if (! empty($request->image)) {
         $data['image'] = $request->image->store('images/profil', 'public');
      }
      if (! empty($request->password)) {
         $data['password'] = Hash::make($data['password']);
      }
      
      Utilisateur::whereId($id)->update($data);
      return redirect()->back(); 
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
                 
         $fam= new Utilisateur;
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
        
        Utilisateur::where('id',$id)->delete();;
       
         return back();
      }
      public function profil () {
         return view('utilisateurs.profil');
      }
      public function passchangeer (Request $request) {
          
         $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Utilisateur::find(Auth::user()->id)->update(['password'=> Hash::make($request->new_password)]);
         return redirect()->back();
      }
}

