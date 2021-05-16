<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class TypeUsage extends Component
{
    public $famille_id ='';
    public $libelle_id ='';
    public $famille;
    public $libelle ;
    public function render()
    {
        $famillea=DB::table('b_usage_construction')->where('Famille_usage_const',$this->famille)->first();
        $libellee=DB::table('b_usage_construction')->where('Detail_usage_const',$this->libelle)->first();
        $usage_famille = DB::table('b_usage_construction')->select('Famille_usage_const')->distinct()->get();
        // $usage_libelle = DB::table('b_usage_construction')->select('Libelle_usage_const')->where('Famille_usage_const',$this->famille_id)->distinct()->get();
        $usage_detail = DB::table('b_usage_construction')->select('Detail_usage_const')->where('Famille_usage_const',$this->famille_id)->distinct()->get();

        return view('livewire.type-usage',compact('usage_famille','usage_detail','famillea','libellee'));
    }
    public function mount($famille,$libelle){
        $this->famille=$famille;
        $this->libelle=$libelle;
     }
}



   