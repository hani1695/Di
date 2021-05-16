<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class DrAgence extends Component
{
    public $Nom_DR='';
    public $stucture='';
    public $dr='';

    public function render()
    {
        $stucture = $this->stucture;
        $nom_dr = $this->dr;
        $dr = DB::table('b_direction')->get();
        $st = DB::table('b_structures')->where('Nom_DR',$this->Nom_DR)->get();
                
        return view('livewire.dr-agence',compact('dr','st','stucture','nom_dr'));
    }
    public function mount($dr,$st)
    {
        $this->stucture = $st;
        $this->nom_dr = $dr;

    }
}
