<?php

namespace App\Http\Controllers\evaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FicheevaluationController extends Controller
{
    public function index() {

        $ficheevaluations = DB::table('t_fiches_dommages')->get();
         return view('evaluations.liste_des_fiche_devaluations.liste_des_fiche_devaluation',compact('ficheevaluations')) ;
      }
      public function detaille($id) {

        
        $ficheevaluatthision = DB::table('t_fiches_dommages')->where('qgs_fid_0',$id)->first();
        // dd($ficheevaluation);
        $zone = DB::table('t_zone')->where('id_zone',$ficheevaluatthision->fk_zone)->first();
                // dd($zone);

         return view('evaluations.liste_des_fiche_devaluations.liste_des_fiche_devaluation_detaille',compact('ficheevaluatthision','zone')) ;
      }
      // public function det($id) {
      //   $ficheevaluation = DB::table('t_fiches_dommages')->where('qgs_fid_0',$id)->first();
      //   // dd($ficheevaluation);
      //   $zone = DB::table('t_zone')->where('id_zone',$ficheevaluation->fk_zone)->first();
      //           // dd($zone);

      //    return view('evaluations.liste_des_fiche_devaluations.detaille',compact('ficheevaluation','zone')) ;
      // }
      // public function det3($id) {
      //    $ficheevaluation = DB::table('t_fiches_dommages')->where('qgs_fid_0',$id)->first();
      //    // dd($ficheevaluation);
      //    $zone = DB::table('t_zone')->where('id_zone',$ficheevaluation->fk_zone)->first();
      //            // dd($zone);
 
      //     return view('evaluations.liste_des_fiche_devaluations.detaille3',compact('ficheevaluation','zone')) ;
      //  }
}
