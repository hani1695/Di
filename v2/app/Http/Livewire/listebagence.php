<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Bagence;
use DB;
use Auth;

class Listebagence extends Component
{
    public $listeagence_id='';
    public $listenomdr_id='';

    public function render()
    { 
      
        $privileges = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','structures')
        ->get();
       
       foreach ($privileges as $privilege) {           
        $u= $privilege->visibilite;     
       }   
       
     if($u=='N'){
        $listenomdrs=Bagence::groupby('nom_dr')->select('nom_dr')
           ->get();  

        $listeagences=Bagence::where('nom_dr',$this->listenomdr_id)
               ->get();            
     }elseif ($u=='R'){
        $listenomdrs=Bagence::where('nom_dr', auth::user()->nom_dr)
           ->groupby('nom_dr')->select('nom_dr')
           ->get();  
        $listeagences=Bagence::where('nom_dr', $this->listenomdr_id)
           ->get();            
     }elseif($u=='L'){
        $listenomdrs=Bagence::where('nom_dr',auth::user()->nom_dr)
           ->groupby('nom_dr')->select('nom_dr')
           ->get();  
           $listeagences=Bagence::where('nom_dr', $this->listenomdr_id)
           ->where('code_ag', auth::user()->structure)
           ->get();            
     }elseif($u=='P'){
        $listenomdrs=Bagence::groupby('nom_dr')->select('nom_dr')
           ->get(); 
        $listeagences=Bagence::where('nom_dr', $this->listenomdr_id)
           ->get();             
     }
    
       return view('livewire.listebagence',compact('listeagences','listenomdrs'));
    }

   
}
