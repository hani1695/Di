<?php

namespace App\Http\Livewire;
use DB;
use Livewire\Component;

class WilayaDairaUpdate extends Component
{
    public $wilaya_id ='';
    public $daira_id ='';
    public function render()
    {
        $wilayas = DB::table('b_wilaya')->get();
        $dairas = DB::table('b_daira')->where('fk_code_wilaya',$this->wilaya_id)->get();
        return view('livewire.wilaya-daira-update',compact('wilayas','dairas'));
    }
}