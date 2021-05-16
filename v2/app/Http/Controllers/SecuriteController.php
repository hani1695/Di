<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile;
use App\Privilege;
use App\Tache;
use DB;

class SecuriteController extends Controller
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
              
                $securite=Profile::where('libelle', 'like',"%$search%")
                   ->paginate(20);  
            
                if($p=='N'){
                    $securite=Profile::where('libelle', 'like',"%$search%")
                                           ->paginate(20);       
                }elseif ($p=='R'){
                    $securite=Profile::where('libelle', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->paginate(20); 
                }elseif($p=='W'){
                    $securite=Profile::where('libelle', 'like',"%$search%")
                                          ->where('limitation','!=', 'N')
                                          ->where('limitation','!=', 'R')
                                          ->paginate(20); 
                }elseif($p=='D'){
                  $securite=Profile::where('libelle', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->paginate(20); 
              }elseif($p=='L'){
                  $securite=Profile::where('libelle', 'like',"%$search%")
                                        ->where('limitation','!=', 'N')
                                        ->where('limitation','!=', 'R')
                                        ->where('limitation','!=', 'W')
                                        ->where('limitation','!=', 'D')
                                        ->paginate(20); 
              }elseif($p=='P'){
                    $securite=Profile::where('libelle', 'like',"%$search%")
                                         ->paginate(20);  
               }          
        return $securite;     
     }
  
    public function index() {
        
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','securites')
        ->first();
         
          $securite=$this->recherche($privilege->visibilite);
          $auth= Auth::user();

          if ($privilege->consultation) 
          return view('securites.securite',compact('securite','privilege')) ;
          else return view('layouts.pasacces');  
        }
    
        public function create(){
          
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','securites')
        ->first();
    
         $securite=$this->recherche( $privilege->visibilite);
         $auth= Auth::user();
         return view('securites.securitecreate',compact('securite','privilege')) ;
        }
    
        public function modification($id){
  
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','securites')
          ->first();
  
         $securite=$this->recherche( $privilege->visibilite);

         $auth= Auth::user();
         $securite_enr= Profile::where('code',$id)
                               ->get();

          return view('securites.securiteupdate',compact('securite','securite_enr','privilege')) ;
        }
    
        public function update(Request $request){

          $data=request()->all();
  
          $this->validate($request,[
            'code'=>'required',
             'libelle'=>'required',
             'limitation'=>'required',
                   ]);
            
         Profile::where('code','like',$request->code)
                   ->update([
                   'code' =>$request->code,
                   'libelle' =>$request->libelle,                 
                   'description' =>$request->description,       
                   'limitation' =>$request->limitation,
                   ]);                   
                   
          return back()->with('success','Enregistrement modifié avec succès.');
          // ->with('status', trans($response));
       }
      
  
       public function privilege($id){
  
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','securites')
        ->first();
       
       $privilegeusers=Privilege::where('profile_code',$id)
                                ->get();
       $auth= Auth::user();

       $privilegeuser_enrs= Profile::where('code',$id)->first();
       
        return view('securites.privilege',compact('privilegeusers','privilegeuser_enrs','privilege')) ;
      }
  
    
      public function privilegeajout(Request $request){
        $data=request()->all();

        $this->validate($request,[
          'code'=>'required',
          'visibilite'=>'required',
                 ]);

        $taches=Tache::all();         
          
        foreach($taches as $tache){
                 $fam= new Privilege;
                 $fam->profile_code =$request->code;
                 $fam->volet_app =$tache->tache;
                 $fam->description =$tache->description;;
                 $fam->consultation =1;//donne accès à la donnée en mode de consultation seuelement
                 $fam->insertion =0;//donne possibilité à l'insertion de nouvel enregistrements 
                 $fam->modification =0;//donne la possibilité à la modification d'enregistrement
                 $fam->suppression =0;//donne la possibilité à la suppression des enregregistrements
                 $fam->validation =0;//donne la possibilité à la validtion d'enregistrement
                 $fam->telecharger =0;//donne accès au téléchargement du contenu selon le format disponible csv, pdf, excel, ..
                 $fam->imprimer =0;//permet l'impression  du contenu 
                 $fam->importer =0;//permet d'importer les données à partir d'un support externe (exemple ficher excel des fiches scannées)
                 $fam->historique =0;//donne acces pour consulter l'historique des
                 $fam->exporter =0;//permet l'exportation des données vers d'autres supports
                 $fam->gerer_permission =0;//donne la permession  de gérer le privilèges des profiles et utilisateurs
                 $fam->visibilite =$request->visibilite;//limite l'accès aux données selon le niveau spécifié, exemple P ne peut voir que ses propore données
      
                 $fam->save();                 
        }              
           
        return back()->with('success','Enregistrements ajoutés avec succès.');;
     }
      
     public function privilegemodification($id,$volet){
    
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','securites')
        ->first();

       $privilegeusers=Privilege::where('profile_code',$id)
                                ->get();
       $auth= Auth::user();

       $privilegeuser_enr=  DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
       ->where('p_profiles.code','=', $id)       
       ->where('volet_app','=',$volet)
       ->first();
              
        return view('securites.privilegeupdate',compact('privilegeusers','privilegeuser_enr','privilege')) ;
    
     }
             
      public function privilegeupdate(Request $request){
        $data=request()->all();

        $this->validate($request,[
          'visibilite'=>'required',
                 ]);

        if($request->has('consultation')){ $consultation=1;  }else{ $consultation=0;   }       
        if($request->has('insertion')){ $insertion=1;  }else{ $insertion=0;   }   
        if($request->has('modification')){ $modification=1;  }else{ $modification=0;   }   
        if($request->has('suppression')){ $suppression=1;  }else{ $suppression=0;   }    
 
        if($request->has('validation')){ $validation=1;  }else{ $validation=0;   }       
        if($request->has('telecharger')){ $telecharger=1;  }else{ $telecharger=0;   }   
        if($request->has('imprimer')){ $imprimer=1;  }else{ $imprimer=0;   }   
        if($request->has('importer')){ $importer=1;  }else{ $importer=0;   }    
      
        if($request->has('historique')){ $historique=1;  }else{ $historique=0;   }       
        if($request->has('exporter')){ $exporter=1;  }else{ $exporter=0;   }   
        if($request->has('gerer_permission')){ $gerer_permission=1;  }else{ $gerer_permission=0;   }   
           

       Privilege::where('profile_code','like',$request->profile_code)
                 ->where('volet_app','like',$request->volet_app)
                 
                 ->update([
                 'consultation' =>$consultation,
                 'insertion' =>$insertion,    
                 'modification' =>$modification,         
                 'suppression' =>$suppression,    
  
                 'validation' =>$validation,
                 'telecharger' =>$telecharger,               
                 'imprimer' =>$imprimer,         
                 'importer' =>$importer,      
             
                 'historique' =>$historique,
                 'exporter' =>$exporter,                 
                 'gerer_permission' =>$gerer_permission,      

                 'visibilite' =>$request->visibilite,
                 ]);                   
                 
        return back()->with('success','Enregistrement modifié avec succès.');;
     }    
    
      /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function enregistrer(Request $request){
         
          $data=request()->all();
          $this->validate($request,[
            'code'=>'required',
             'libelle'=>'required',
             'limitation'=>'required',
                   ]);

           $fam= new Profile;
           $fam->code =$request->code;
           $fam->libelle =$request->libelle;
           $fam->description =$request->description;
           $fam->limitation =$request->limitation;

           $fam->save();
           return back()->with('success','Enregistrement ajouté avec succès.');;
        }   
    
        public function destroyfam($id){
          
          Profile::where('code',$id)->delete();;
         
           return back()->with('success','Enregistrement supprimé avec succès.');;
        }   
}
