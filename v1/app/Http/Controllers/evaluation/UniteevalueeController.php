<?php

namespace App\Http\Controllers\evaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UniteevalueeController extends Controller
{
    public function index() {

        $uniteevaluers = DB::table('t_construction_evalues')->get();
        // dd($uniteevaluers);
         return view('evaluations.liste_des_unite_evaluees.liste_des_unite_evaluee',compact('uniteevaluers')) ;
      }
}
