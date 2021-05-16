<?php

namespace App\Http\Controllers\utilisateur_et_affectation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class AffectationZonesAuxInspecteursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonesAEva = NULL ;
        $utilisateursMob = NULL;
        $zonesUtilisateus = NULL;
        if(Session::has("event_id")) {

        $zonesAEva = DB::table('t_zone')
        // ->join('t_construction_a_evaluer','t_construction_a_evaluer.zone_id','=','t_zone.id_zone')
        // ->whereRaw('t_zone.id_zone IN (SELECT zone_id FROM t_construction_a_evaluer)')
        ->where('t_zone.fk_event',Session::get("event_id"))->get();
        

        $utilisateursMob = DB::table('t_users_event')
        ->join('b_users','b_users.id','=','t_users_event.fk_user')
        ->where([
            'fk_event' => Session::get("event_id"),
            'profile' => 'insp'
        ])
        ->get();
        $zonesUtilisateus = DB::table('t_zone_insp')
        ->join('t_zone','t_zone.id_zone','=','t_zone_insp.fk_zone')
        ->join('t_users_event','t_users_event.id_user_event','=','t_zone_insp.fk_user_insp')
        ->join('b_users','b_users.id','=','t_users_event.fk_user')
        ->where('t_users_event.fk_event',Session::get("event_id"))
        ->get();

        }
        return view('admin.affect_zone_insp.index',compact('zonesAEva','utilisateursMob','zonesUtilisateus'));
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
        $this->validate($request,[
            'zones' => 'required',
            'insp' => 'required'
        ]);
        $data = array();
        foreach ($request->zones as $key => $zone) {
            array_push ($data , array (
                'fk_zone' => $zone,
                'fk_user_insp' => $request->insp
            ));
        }
        DB::table('t_zone_insp')->insert($data);
        return redirect() -> back() -> with('success','L\'affectaion a été faite avec succès');
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
    public function destroy($id)
    {
        //
    }
}
