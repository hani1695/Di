<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class TypeZoneVoie extends Component
{
    public $nature_id ='';
    public $type_id ='';
    public $nature;
    public $type ;
    public function render()
    {
        if(is_numeric($this->nature)){
        $naturee=DB::table('c_type_adresses')->where('id_type_adr',$this->nature)->first(); 
    }
        else{
        $naturee=DB::table('c_type_adresses')->where('descreption_t_adr',$this->nature)->first();
    }
    

        $typee=DB::table('c_type_zone_voie')->where('descreption_z_v',$this->type)->first();
        // if (! empty($this->type)) dd ($typee);

        $adresses = DB::table('c_type_adresses')->get();
        $types = DB::table('c_type_zone_voie')->where('fk_adresse',$this->nature_id)->get();
        return view('livewire.type-zone-voie',compact('adresses','types','naturee','typee'));
    }
    public function mount($nature,$type){
        $this->nature=$nature;
        $this->type=$type;
     }
}

