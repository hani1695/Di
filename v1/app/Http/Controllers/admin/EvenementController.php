<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Wilaya;
use App\Evenement;
use App\Utilisateur;
use Session;
use App\User;
use Auth;
use DB;

class EvenementController extends Controller
{ 
    
       /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }
      
        
       
        // public function utilisateur_mobilise()
        // {
        //   // $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
        //   // ->where('p_profiles.code','=', Auth::user()->profile)
        //   // ->where('volet_app','=','evenements')
        //   // ->first();          
          
        //   // ->join('b_wilaya','b_wilaya.code_w','=','t_wilaya_sinistree.code_w')
        //   $wilayatouches = DB::table('t_wilaya_sinistree')
        //   ->join('b_wilaya','b_wilaya.code_w','=','t_wilaya_sinistree.code_w')
        //   ->where('evenement_id',18)
        //   ->select('b_wilaya.code_w','b_wilaya.nom_w')
        //   ->get();
        //   return view('admin.wilayatouche.wilayatouche',compact('wilayatouches')) ;
        // }
        public function wilayatouche()
        {
          // $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          // ->where('p_profiles.code','=', Auth::user()->profile)
          // ->where('volet_app','=','evenements')
          // ->first();          
          
          // ->join('b_wilaya','b_wilaya.code_w','=','t_wilaya_sinistree.code_w')
          $wilayatouches = DB::table('t_wilaya_sinistree')
          ->join('b_wilaya','b_wilaya.code_w','=','t_wilaya_sinistree.code_w')
          ->select('b_wilaya.code_w','b_wilaya.nom_w');
          if(Session::has('event_id'))
            $wilayatouches =$wilayatouches->where('evenement_id',Session::get('event_id'))->get();
          else
          $wilayatouches = $wilayatouches->get();
          // dd($wilayatouches);
          return view('admin.wilayatouche.wilayatouche',compact('wilayatouches')) ;
        }
         public function index()
        {
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','evenements')
          ->first();
          
          $evenements = DB::table('t_evenement')->leftJoin('b_wilaya','b_wilaya.code_w','=','t_evenement.wilaya_id')->latest()->get();
          // if ($privilege->visibilite == 'N')
          //   $evenements = $evenements->latest()->get();
          // else if ($privilege->visibilite == 'W')
          //   $UserWilaya = Utilisateur::join('b_organismes','b_users.organisme','=','b_organismes.nom')
          //   ->join('b_wilaya','b_wilaya.code_w','=','b_organismes.fk_wilaya')
          //   ->where('b_users.id',Auth::user()->id)->first(); 
          //   dd($UserWilaya);
          //   $evenements = $evenements
          //   ->join('b_organismes','t_evenement.organisme','=','b_organismes.nom')
          //   ->join('b_wilaya','b_wilaya.code_w','=','b_organismes.fk_wilaya')
          //   ->where('')
          //   ->latest()->get();
          $wilayas = DB::table('b_wilaya')->get();
          // $wilayasSinistrees = DB::table('t_wilaya_sinistree')->join('b_wilaya','b_wilaya.code_w','=','t_wilaya_sinistree.code_w');
            return view ('admin.evenements.create',compact('wilayas','evenements','privilege'));
        }
        public function edit($id)
        {
          $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
          ->where('p_profiles.code','=', Auth::user()->profile)
          ->where('volet_app','=','evenements')
          ->first();          
          $evenements = DB::table('t_evenement')->leftJoin('b_wilaya','b_wilaya.code_w','=','t_evenement.wilaya_id')->latest()->get() ;
          $evenement_enr = Evenement::find($id) ;
          $wilayas = DB::table('b_wilaya')->get();
          $wilayasSinistrees = DB::table('t_wilaya_sinistree')->join('b_wilaya','b_wilaya.code_w','=','t_wilaya_sinistree.code_w')->where('evenement_id',$id)->get() ;
          return view('admin.evenements.update',compact('evenements','evenement_enr','wilayasSinistrees','wilayas','privilege')) ;
         
         
        }

        public function store(Request $request)
        {        
          // dd($request->organisation[0]);
          
          $data = $request->validate([
            'description' => 'required',
            'date_creation' => 'required',
            'type_evenement' => 'required',
            'wilaya_id'  => 'required',
            'wilayas' => 'required'
            
          ]);
          $data['user_id'] = Auth::user()->id;
          
          // dd($request->all());
          $event = Evenement::create($data);
          foreach ($request->wilayas as $wilaya) {
            DB::table('t_wilaya_sinistree')->insert([
              'code_w' => $wilaya,
              'evenement_id' => $event->id
              
            ]);
          }
          
          if (! empty($request->source)) {
            foreach ($request->source  as $key => $source) {
              if(! empty($source))
              DB::table('t_source_sismologie')->insert([
                'source' => $source , 
                'date' =>$request->date[$key],
                'localisation' =>$request->localisation[$key],
                'heure' =>$request->heure[$key],
                'lattitude' =>$request->lattitude[$key],
                'longitude' =>$request->longitude[$key],
                'profondeur' =>$request->profondeur[$key],
                'magnitude' =>$request->magnitude[$key],
                'evenement_id' => $event->id
              ]);              
            }
          }
          return redirect()->back()->with('success','L\'évènement a été créé avec succès');
        }  

        public function update(Request $request,$id){
          $data=request()->validate([
            'description' => 'required',
            'date_creation' => 'required',
            'type_evenement' => 'required',
            'wilaya_id' => 'required',
            'wilayas' => 'required'
            ]);
            unset($data["wilayas"]); 
            Evenement::whereId($id)->update($data);
            $event = Evenement::find($id);
          DB::table('t_source_sismologie')->where('evenement_id',$id)->delete();
          DB::table('t_wilaya_sinistree')->where('evenement_id',$id)->delete();
          foreach ($request->wilayas as $wilaya) {
            DB::table('t_wilaya_sinistree')->insert([
              'code_w' => $wilaya,
              'evenement_id' => $event->id
              
            ]);
          }
          
          if (! empty($request->source)) {
            foreach ($request->source  as $key => $source) {
              if(! empty($source))
              DB::table('t_source_sismologie')->insert([
                'source' => $source , 
                'date' =>$request->date[$key],
                'localisation' =>$request->localisation[$key],
                'heure' =>$request->heure[$key],
                'lattitude' =>$request->lattitude[$key],
                'longitude' =>$request->longitude[$key],
                'profondeur' =>$request->profondeur[$key],
                'magnitude' =>$request->magnitude[$key],
                'evenement_id' => $event->id
              ]);              
            }
          }


          
                   
          return back()->with('success','L\'évènement "'.$event->description.'" a été modifié avec succès');
       }
       public function destroy($id){
        
        $event = Evenement::find($id);
        DB::table('t_evenement')->whereId($id)->delete();
        DB::table('t_source_sismologie')->where('evenement_id',$id)->delete();
        DB::table('t_wilaya_sinistree')->where('evenement_id',$id)->delete();
       

        return redirect()->back()->with('supp','L\'évènement "'.$event->description.'" a été supprimé avec succès');
      }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        // public function create()
        // {
        //     return view ('admin.evenements.create');
        // }    
    }
    
