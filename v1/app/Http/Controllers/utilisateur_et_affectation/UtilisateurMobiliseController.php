<?php

namespace App\Http\Controllers\utilisateur_et_affectation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Utilisateur;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UtilisateurMobiliseController extends Controller
{
    public function index() {
        // dd(2);
       
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        ->where('p_profiles.code','=', Auth::user()->profile)
        ->where('volet_app','=','utilisateurs')
        ->first();
        $utilisateurs = null;
        $usersM = null;
        if(Session::has('event_id')){
          $utilisateurs = Utilisateur::whereRaw('b_users.id not in (select fk_user from t_users_event where fk_event = '.Session::get("event_id").')')->get();
          $usersM = DB::table('t_users_event')->join('b_users', 'b_users.id', '=', 't_users_event.fk_user')->where('t_users_event.fk_event','=', Session::get("event_id"))
          ->get();
        }
        
          if ( $privilege->consultation) return view('utilisateur_et_affectation.utilisateur_mobilise.utilisateurMobilise',compact('utilisateurs','privilege','usersM')) ;
          else return view('layouts.pasacces');   
        }

        public function store(Request $request)
        {        

            
            //   
            //   $data['user_id'] = Auth::user()->id;
            
            //   $event = Evenement::create($data);
            if (! empty($request->user)) {
                foreach ($request->user as $fk_user) {
                    if(! empty($fk_user))
                    
                         if(Session::has('event_id')){
                                        
                                        
                                        // $fk_user = $request->validate([
                                        //   'fk_user' => 'required',]);
                                        
                            DB::table('t_users_event')->insert([
                                'fk_user' => $fk_user,
                                'fk_event' => Session::get('event_id'),
                                'created_at' => date('Y-m-d'),
                                'created_by' => Auth::user()->id
                                
                            ]);
                            }
                            else{
                            return redirect()->back();
                            }
                        }
        } else {
            return redirect()->back();
        }
          return redirect()->back()->with('success','L\'utilisateur a été créé avec succès');
        }  

        public function destroy($id){
        
          DB::table('t_users_event')->where('id_user_event',$id)->delete();
         
           return back();
        }
}
