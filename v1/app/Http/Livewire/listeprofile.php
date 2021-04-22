<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Profile;
use DB;
use Auth;

class Listeprofile extends Component
{
    public $listeprofile_id='';
    public function render()
    {  $listeprofiles=Profile::all();
  
        $privileges = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
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
            $listeprofiles=Profile::all();     
        }elseif ($p=='R'){
            $listeprofiles=Profile::where('limitation','!=', 'N')->get(); 
        }elseif($p=='L'){
            $listeprofiles=Profile::where('limitation','!=', 'N')
            ->where('limitation','!=', 'R')
            ->get();  
        }elseif($p=='P'){
            $listeprofiles=Profile::all();
     }
       return view('livewire.listeprofile',compact('listeprofiles'));
    }

}
