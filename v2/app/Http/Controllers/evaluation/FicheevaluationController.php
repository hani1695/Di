<?php

namespace App\Http\Controllers\evaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class FicheevaluationController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }
    public function index() {
      $ficheevaluations = null ; 
      if(Session::has('event_id')) {
        $ficheevaluations =  DB::table('t_fiches_dommages')
        
        ->join('b_commune',DB::raw('CAST(commune AS int)'),'=','b_commune.code_c')
        ->where('fk_event',Session::get('event_id'))
        ->orderBy('date_fiche')
        ->get();
      }
      // dd()
      // $code_c_fiche = (int)$code_c_fiche;
      // $commune = DB::table('b_commune')->where('code_c',$code_c_fiche)->get();
      // dd($commune);
        // $ficheevaluations = DB::table('t_fiches_dommages')->get();
         return view('evaluations.liste_des_fiche_devaluations.liste_des_fiche_devaluation',compact('ficheevaluations')) ;
      }
      public function detaille($id) {

        $code_c_fiche =  (int)DB::table('t_fiches_dommages')->where('code_fiche',$id)->pluck('commune')->first();
       
        $ficheevaluatthision = DB::table('t_fiches_dommages')
        // ->join('b_commune', 'b_commune.code_c', '=', 't_fiches_dommages.commune')
        ->where('code_fiche',$id)->first();
        $commune = DB::table('b_commune')->where('code_c',$code_c_fiche)->first();
        // dd($ficheevaluatthision);
        $zone = DB::table('t_zone')->where('id_zone',$ficheevaluatthision->fk_zone)->first();
                // dd($zone);

         return view('evaluations.liste_des_fiche_devaluations.liste_des_fiche_devaluation_detaille',compact('ficheevaluatthision','zone','commune')) ;
      }
      public function pdfPrint ($id) {

        $code_c_fiche =  (int)DB::table('t_fiches_dommages')->where('code_fiche',$id)->pluck('commune')->first();

        $ficheevaluatthision = DB::table('t_fiches_dommages')
        // ->join('b_commune', 'b_commune.code_c', '=', 't_fiches_dommages.commune')
        ->leftJoin('t_evenement', 't_evenement.id', '=', 't_fiches_dommages.fk_event')
        ->where('code_fiche',$id)
        ->first();
        $commune = DB::table('b_commune')->where('code_c',$code_c_fiche)->first();
        // dd($ficheevaluatthision);
        // $zone = DB::table('t_zone')->where('id_zone',$ficheevaluatthision->fk_zone)->first();

        // ,'zone'

        return view('evaluations.liste_des_fiche_devaluations.fiche_en_pdf',compact('ficheevaluatthision','commune'));
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
