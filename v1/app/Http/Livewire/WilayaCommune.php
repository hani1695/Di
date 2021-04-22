<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class WilayaCommune extends Component
{

    public $wilaya_id ='';
    public $commune_id ='';
    public function render()
    {
        $wilayas = DB::table('b_wilaya')->get();
        $communes = DB::table('b_commune')->where('fk_wilaya',$this->wilaya_id)->get();
        return view('livewire.wilaya-commune',compact('wilayas','communes'));
    }
}
