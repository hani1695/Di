<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class WilayaCommuneConstructionAdresse extends Component
{
        public $wilaya_id ='';
        public $daira_id ='';
        public $commune_id ='';
    public function render()
    {
        $wilayas = DB::table('b_wilaya')->get();
        $dairas = DB::table('b_daira')->where('fk_code_wilaya',$this->wilaya_id)->orderBy('nom_c')->get();
        $communes = DB::table('b_commune')->where('fk_diara',$this->daira_id)->get();

        return view('livewire.wilaya-commune-construction-adresse',compact('wilayas','dairas','communes'));
    }
}

