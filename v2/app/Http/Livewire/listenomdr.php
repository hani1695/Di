<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bagence;
use DB;
use Auth;

class Listenomdr extends Component
{    
    public function render()
    {  $listenomdrs=Bagence::groupby('nom_dr')->select('nom_dr')->get();
        
        $privileges = DB::table('privileges') ->join('p_profiles', 'p_profiles.code', '=', 'privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','utilisateurs')
        ->get();
        
        foreach ($privileges as $privilege) {           
        $p= $privilege->visibilite;  
        $consultation=$privilege->consultation;
        $insertion=$privilege->insertion;
        $modification=$privilege->modification;
        $suppression=$privilege->suppression;   
        }   
        
        if($p=='N'){
            $listenomdrs=Bagence::groupby('nom_dr')->select('nom_dr')->get();
     
        }elseif ($p=='R'){
            $listenomdrs=Bagence::groupby('nom_dr')->select('nom_dr')->
            where('nom_dr', auth::user()->nom_dr)->get(); 
        }elseif($p=='L'){
            $listenomdrs=Bagence::groupby('nom_dr')->select('nom_dr')->
            where('nom_dr', auth::user()->nom_dr)->get();  
        }elseif($p=='P'){
            $listenomdrs=Bagence::groupby('nom_dr')->select('nom_dr')->get();
     }
       
       return view('livewire.listenomdr',compact('listenomdrs'));
    }

   
}
