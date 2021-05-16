<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class WilayaCommuneConstruction extends Component
{
 
    public $wilaya_id ='';
    public $commune_id ='';
    public $wilaya;
    public $commune;
    public function render()
    {
        $wilayaa=DB::table('b_wilaya')->where('code_w',$this->wilaya)->first();
        $communee=DB::table('b_commune')->where('code_c',$this->commune)->first();
        // if (! empty($this->commune)) dd ($this->commune);

        $wilayas = DB::table('b_wilaya')->get();
        $communes = DB::table('b_commune')->where('fk_wilaya',$this->wilaya_id)->orderBy('nom_c')->get();
    
        return view('livewire.wilaya-commune-construction',compact('wilayas','communes','wilayaa','communee'));
    }
    public function mount($wilaya,$commune){
        $this->wilaya=$wilaya;
        $this->commune=$commune;
     }
}


