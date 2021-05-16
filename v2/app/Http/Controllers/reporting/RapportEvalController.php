<?php

namespace App\Http\Controllers\reporting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use \App\RapportEval;


class RapportEvalController extends Controller
{
    public function index () {
        
        if (Session::has("event_id")) {
            $rapports = RapportEval::where([
                'event_id' => Session::get('event_id'),
                'rapp_eval' => true
            ])->get();

            return view ("reporting.index",compact('rapports'));
        }
        return view ("reporting.index");
    }
    public function store (Request $request) {
        $data = $request->validate([
            'description' => 'required',
            'date_creation' =>'required',
            'lien_rapp' =>'required|mimes:pdf',
        ]);
        $data['rapp_eval'] = true;
        $data['lien_rapp'] = $request->lien_rapp->store('reporting/rapport','public');
        $data['date_creation'] = date('Y-m-d');
        $data['user_id'] = Auth::user()->id;
        $data['event_id'] = Session::get('event_id');

        RapportEval::create($data);

        return redirect () -> back () -> with('success','Le rapport d\'évaluation a été enregistré');
        
    }
    public function destroy ($id) {
        RapportEval::whereId($id)->delete();
        return redirect () -> back () -> with('success','Le rapport d\'évaluation a été supprimé');
    }
}
