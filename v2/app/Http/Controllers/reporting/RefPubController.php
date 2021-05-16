<?php

namespace App\Http\Controllers\reporting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use \App\RapportEval;

class RefPubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has("event_id")) {
            $rapports = RapportEval::where([
                'event_id' => Session::get('event_id'),
                'rapp_eval' => false
            ])->get();

            return view ("reporting.index0",compact('rapports'));
        }
        return view ("reporting.index0");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required',
            'date_creation' =>'required',
            'lien_rapp' =>'required|file',
        ]);
        $data['rapp_eval'] = false;
        $data['lien_rapp'] = $request->lien_rapp->store('reporting/rapport','public');
        $data['date_creation'] = date('Y-m-d');
        $data['user_id'] = Auth::user()->id;
        $data['event_id'] = Session::get('event_id');

        RapportEval::create($data);

        return redirect () -> back () -> with('success','La publication scientifique a été enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id) {
        RapportEval::whereId($id)->delete();
        return redirect () -> back () -> with('success','La publication scientifique a été supprimé');
    }
}
