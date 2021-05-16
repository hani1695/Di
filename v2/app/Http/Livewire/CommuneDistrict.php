<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class CommuneDistrict extends Component
{
    public $wilaya_id ='';
    // public $daira_id ='';
    public $commune_id ='';
    public $district_id ='';
    public function render()
    {
        $wilayas = DB::table('b_wilaya')->get();
        // $dairas = DB::table('b_daira')->where('fk_code_wilaya',$this->wilaya_id)->get();
        $communes = DB::table('b_commune')->where('fk_wilaya',$this->wilaya_id)->orderBy('nom_c')->get();
        $districts = DB::table('b_district')->where('fk_commune',$this->commune_id)->orderBy('num_district')->get();
        return view('livewire.commune-district',compact('wilayas','communes','districts'));
    }
}
