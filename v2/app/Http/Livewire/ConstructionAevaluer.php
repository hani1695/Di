<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class ConstructionAevaluer extends Component
{
    public $wilaya_id ='';
    public $commune_id ='';
    public $construction_id ='';

    public function render()
    {
        $wilayas = DB::table('b_wilaya')->get();
        $communes = DB::table('b_commune')->where('fk_wilaya',$this->wilaya_id)->get();
        $constructions  = DB::table('b_construction')->where('fk_id_comn',$this->commune_id)->get();
        // ,'$constructions'
        return view('livewire.construction-aevaluer',compact('wilayas','communes','constructions'));
    }
}


    