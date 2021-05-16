<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class Decoupage extends Component
{

    public $wilaya_id ='';
    public $daira_id ='';
    public $commune_id ='';
    public $district_id ='';



    public function render()
    {
        $wilayas = DB::table('b_wilaya')->get();
        $dairas = DB::table('b_daira')->where('fk_code_wilaya',$this->wilaya_id)->get();
        $communes = DB::table('b_commune')->where('fk_diara',$this->daira_id)->get();
        $districts = DB::table('b_district')->where('fk_commune',$this->commune_id)->get();
        $ilots = DB::table('b_ilot')->where('fk_district',$this->district_id)->get();

        return view('livewire.decoupage',compact('wilayas','dairas','communes','districts','ilots'));
    }
}
