<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Wilaya;
use Symfony\Component\VarDumper\Caster\DsCaster;
use Illuminate\Support\Facades\Storage;


class TableBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
            ///////////////////////////////////////////////////////////////////////organisme////////////////////////////////////////////

    public function organisme ()
    {
        
    $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->first();
      
    // $organismes = DB::table('b_organismes')->get();
  

    $organismes=DB::table('b_organismes')->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_organismes.fk_wilaya')
    ->join('b_commune', 'b_commune.code_c', '=', 'b_organismes.fk_commune')
    ->get();

    return view ('tbase.organismes.organisme',compact('privilege','organismes'));

    }

    public function ajouter_organisme (Request $request)
    {
    
      $data=request()->all();

        $this->validate($request,[
            'nom'=>'required',
            'logo'=>'max:5120', 
             'email'=>'required',
            //  'email' => 'required|between:3,64|email|unique:users|email:rfc,dns',
              'phone'=>'required|numeric',
             'nom_reg'=>'required',
            'fk_wilaya'=>'required',
            'fk_commune'=>'required',
            'description'=>'required',

                   ]);
                   if ($request->hasFile('logo')) {
           
                    $data = $request->input('logo');
                    $photo = $request->file('logo')->getClientOriginalName();
         
                    $destination = base_path() . '/public/storage/logoOrganisme';
                     $request->file('logo')->move($destination, $photo);
                 
                 // $news->logo=$photo;
                   
                   DB::table('b_organismes')->insert([
                    'nom'=>$request->nom,
                     'logo'=>$photo,
                     'email'=>$request->email,
                      'phone'=>$request->phone,
                   'nom_reg'=>$request->nom_reg,
                    'fk_wilaya'=>$request->fk_wilaya,
                    'fk_commune'=>$request->fk_wilaya,
                    'description'=>$request->description,

                    
                  ]);
                 
                     

                }else{

                  DB::table('b_organismes')->insert([
                    'nom'=>$request->nom,
                    //  'logo'=>$photo,
                     'email'=>$request->email,
                      'phone'=>$request->phone,
                   'nom_reg'=>$request->nom_reg,
                    'fk_wilaya'=>$request->fk_wilaya,
                    'fk_commune'=>$request->fk_wilaya,
                    'description'=>$request->description,
                  ]);
                }
        
     
         return back();
    }
    public function edit_organisme (Request $request,$id)
    {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->first();
      $organisme_enr = DB::table('b_organismes')->where('id',$id)->first();
      $organismes=DB::table('b_organismes')->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_organismes.fk_wilaya')
    ->join('b_commune', 'b_commune.code_c', '=', 'b_organismes.fk_commune')
    ->get();


      return view ('tbase.organismes.organismeupdate',compact('privilege','organisme_enr','organismes'));
    }

    public function modifier_organisme (Request $request,$id)
    {
    
      $data=request()->all();

      $this->validate($request,[
        'nom'=>'required',
        'logo'=>'max:5120', 
         'email'=>'required',
                     //  'email' => 'required|between:3,64|email|unique:users|email:rfc,dns',
          'phone'=>'required|numeric',
         'nom_reg'=>'required',
        'fk_wilaya'=>'required',
        'fk_commune'=>'required',
        'description'=>'required',
        ]);
                   
        if ($request->hasFile('logo')) {
           
          $data = $request->input('logo');
          $photo = $request->file('logo')->getClientOriginalName();

          $destination = base_path() . '/public/storage/logoOrganisme';
           $request->file('logo')->move($destination, $photo);
       
       // $news->logo=$photo;
         
        
          DB::table('b_organismes')->where('id','like',$id)
          ->update([
          'nom'=>$request->nom,
           'logo'=>$photo,
           'email'=>$request->email,
            'phone'=>$request->phone,
         'nom_reg'=>$request->nom_reg,
          'fk_wilaya'=>$request->fk_wilaya,
          'fk_commune'=>$request->fk_wilaya,
          'description'=>$request->description,

          
        ]);
       
           

      }else{

          DB::table('b_organismes')->where('id','like',$id)
          ->update([
          'nom'=>$request->nom,
          //  'logo'=>$photo,
           'email'=>$request->email,
            'phone'=>$request->phone,
         'nom_reg'=>$request->nom_reg,
          'fk_wilaya'=>$request->fk_wilaya,
          'fk_commune'=>$request->fk_wilaya,
          'description'=>$request->description,
        ]);
      }


return back();
    }
    public function delete_organisme($id){
         
      DB::table('b_organismes')->where('id',$id)->delete();
      // $image_path = "/public/storage/logoorganisme/logo"; // Value is not URL but directory file path
      // //     if(File::exists($image_path)) {
      // //       File::delete($image_path);
      // //     }
      return redirect()->route("tbase.organisme");
    }
        ///////////////////////////////////////////////////////////////////////direction////////////////////////////////////////////

    public function direction ()
    {
        $privilege = DB::table('p_privileges')->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->first();
    // $directions = DB::table('b_direction')->get();
    $directions=DB::table('b_direction')->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_direction.fk_wilaya')
    ->join('b_commune', 'b_commune.code_c', '=', 'b_direction.fk_commune')
    ->get();
    $organismes = DB::table('b_organismes')->get();



    return view ('tbase.directions.direction',compact('privilege','directions','organismes'));
    }
    
    public function ajouter_direction (Request $request)
    {
    
      $data=request()->all();

        $this->validate($request,[
            'nom'=>'required',
            'logo'=>'max:5120', 
             'email'=>'required',
                         //  'email' => 'required|between:3,64|email|unique:users|email:rfc,dns',
              'phone'=>'required|numeric',
             'nom_reg'=>'required',
            'fk_wilaya'=>'required',
            'fk_commune'=>'required',
            'Nom_Org'=>'required',

                   ]);
                   if ($request->hasFile('logo')) {
           
                    $data = $request->input('logo');
                    $photo = $request->file('logo')->getClientOriginalName();
         
                    $destination = base_path() . '/public/storage/logoDirection';
                     $request->file('logo')->move($destination, $photo);
                 
                 // $news->logo=$photo;
                   
                   DB::table('b_direction')->insert([
                    'nom'=>$request->nom,
                     'logo'=>$photo,
                     'email'=>$request->email,
                      'phone'=>$request->phone,
                   'nom_reg'=>$request->nom_reg,
                    'fk_wilaya'=>$request->fk_wilaya,
                    'fk_commune'=>$request->fk_wilaya,
                    'Nom_Org'=>$request->Nom_Org,

                    
                  ]);
                 
                     

                }else{

                  DB::table('b_direction')->insert([
                    'nom'=>$request->nom,
                    //  'logo'=>$photo,
                     'email'=>$request->email,
                      'phone'=>$request->phone,
                   'nom_reg'=>$request->nom_reg,
                    'fk_wilaya'=>$request->fk_wilaya,
                    'fk_commune'=>$request->fk_wilaya,
                    'Nom_Org'=>$request->Nom_Org,
                  ]);
                }
        
     
         return back();

    }
    public function edit_direction (Request $request,$id)
    {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->first();
      $organismes = DB::table('b_organismes')->get();
      $direction_enr = DB::table('b_direction')->where('id',$id)->first();
      $directions=DB::table('b_direction')->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_direction.fk_wilaya')
      ->join('b_commune', 'b_commune.code_c', '=', 'b_direction.fk_commune')
      ->get();

      return view ('tbase.directions.directionupdate',compact('privilege','direction_enr','directions','organismes'));
    }

    public function modifier_direction (Request $request,$id)
    {
    
      $data=request()->all();

      $this->validate($request,[
        'nom'=>'required',
        'logo'=>'max:5120', 
         'email'=>'required',
                     //  'email' => 'required|between:3,64|email|unique:users|email:rfc,dns',
          'phone'=>'required|numeric',
         'nom_reg'=>'required',
        'fk_wilaya'=>'required',
        'fk_commune'=>'required',
        'Nom_Org'=>'required',
        ]);
                
                   
        if ($request->hasFile('logo')) {
           
          $data = $request->input('logo');
          $photo = $request->file('logo')->getClientOriginalName();

          $destination = base_path() . '/public/storage/logoDirection';
           $request->file('logo')->move($destination, $photo);
           
          //  $delete = DB::table('b_direction')->where('id',$id)->first();
          //  $image_path = "/public/storage/logoDirection/".$delete->logo;
          //  Storage::delete($image_path);

       // $news->logo=$photo;
      //  $image_path = "/public/storage/logoDirection/$photo"; // Value is not URL but directory file path
      //     if(storege::exists($image_path)) {
      //       stoerage::delete($image_path);
      //     }
     

      
      DB::table('b_direction')->where('id','like',$id)
      ->update([
          'nom'=>$request->nom,
           'logo'=>$photo,
           'email'=>$request->email,
            'phone'=>$request->phone,
         'nom_reg'=>$request->nom_reg,
          'fk_wilaya'=>$request->fk_wilaya,
          'fk_commune'=>$request->fk_wilaya,
          'Nom_Org'=>$request->Nom_Org,

          
        ]);
       
           

      }else{

        DB::table('b_direction')->where('id','like',$id)
      ->update([
          'nom'=>$request->nom,
          //  'logo'=>$photo,
           'email'=>$request->email,
            'phone'=>$request->phone,
         'nom_reg'=>$request->nom_reg,
          'fk_wilaya'=>$request->fk_wilaya,
          'fk_commune'=>$request->fk_wilaya,
          'Nom_Org'=>$request->Nom_Org,
        ]);
      }


return back();
    }
    public function delete_direction($id){
         
      DB::table('b_direction')->where('id',$id)->delete();
      // $image_path = "/public/storage/logoDirection/logo"; // Value is not URL but directory file path
      // //     if(File::exists($image_path)) {
      // //       File::delete($image_path);
      // //     }
      return redirect()->route("tbase.direction");
    }




    ///////////////////////////////////////////////////////////////////////structure////////////////////////////////////////////
    public function structure ()
    {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->first();
      $directions = DB::table('b_direction')->get();
      $structures = DB::table('b_structures')->get();
      return view ('tbase.structures.structure',compact('privilege','structures','directions'));
    }
    
    public function ajouter_structure (Request $request)
    {
    
      $data=request()->all();

        $this->validate($request,[
          'code_ag'=>'required|max:3',
          'nom_ag'=>'required',
           'Adresse'=>'required',
            'Tel'=>'required',
           'Fax'=>'required',
          'Telegraphe'=>'required',
          'Email'=>'required',
                      //  'email' => 'required|between:3,64|email|unique:users|email:rfc,dns',
          'RC'=>'required',
          'IA'=>'required',
          'NIF'=>'required',
           'Compte_bancaire'=>'required',
            'NSS'=>'required',
            'abreger'=>'required|max:10',

           'Sommeil'=>'required|numeric|max:1',
          'NumeroRef'=>'required|numeric',
          'LieuSortant'=>'required',
          'DateCourrier'=>'required|date',
          'NumeroSequentiel'=>'required|numeric',
          'VisibleGCPRO'=>'required|numeric|max:1',
           'GuichetUnique'=>'required|numeric|max:1',
            'fk_wilaya'=>'required',
           'fk_commune'=>'required',
          'DateModifConsolid'=>'required|date',
          'DateModif'=>'required|date',
          'Nom_DR'=>'required',
                   ]);

                
                   
                   DB::table('b_structures')->insert([
                    'code_ag'=>$request->code_ag,
                     'nom_ag'=>$request->nom_ag,
                     'Adresse'=>$request->Adresse,
                      'Tel'=>$request->Tel,
                   'Fax'=>$request->Fax,
                    'Telegraphe'=>$request->Telegraphe,
                    'Email'=>$request->Email,
                    'RC'=>$request->RC,
                    'IA'=>$request->IA,
                     'NIF'=>$request->NIF,
                     'Compte_bancaire'=>$request->Compte_bancaire,
                      'NSS'=>$request->NSS,
                      'abreger'=>$request->abreger,
                   'Sommeil'=>$request->Sommeil,
                    'NumeroRef'=>$request->NumeroRef,
                    'LieuSortant'=>$request->LieuSortant,
                    'DateCourrier'=>$request->DateCourrier,
                    'NumeroSequentiel'=>$request->NumeroSequentiel,
                     'VisibleGCPRO'=>$request->VisibleGCPRO,
                     'GuichetUnique'=>$request->GuichetUnique,
                      'fk_wilaya'=>$request->fk_wilaya,
                   'fk_commune'=>$request->fk_commune,
                    'DateModifConsolid'=>$request->DateModifConsolid,
                    'DateModif'=>$request->DateModif,
                    'Nom_DR'=>$request->Nom_DR,         
                  ]);

         return back();
    }
    public function edit_structure (Request $request,$id)
    {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->first();
      $directions = DB::table('b_direction')->get();

      $structure_enr = DB::table('b_structures')->where('id',$id)->first();
      $structures = DB::table('b_structures')->get();

      return view ('tbase.structures.structureupdate',compact('privilege','structure_enr','structures','directions'));
    }

    public function modifier_structure (Request $request,$id)
    {
    
      $data=request()->all();

        $this->validate($request,[
            'code_ag'=>'required|max:3',
            'nom_ag'=>'required',
             'Adresse'=>'required',
              'Tel'=>'required',
             'Fax'=>'required',
            'Telegraphe'=>'required',
            'Email'=>'required',
                        //  'email' => 'required|between:3,64|email|unique:users|email:rfc,dns',
            'RC'=>'required',
            'IA'=>'required',
            'NIF'=>'required',
             'Compte_bancaire'=>'required',
              'NSS'=>'required',
              'abreger'=>'required|max:10',

             'Sommeil'=>'required|numeric|max:1',
            'NumeroRef'=>'required|numeric',
            'LieuSortant'=>'required',
            'DateCourrier'=>'required|date',
            'NumeroSequentiel'=>'required|numeric',
            'VisibleGCPRO'=>'required|numeric|max:1',
             'GuichetUnique'=>'required|numeric|max:1',
              'fk_wilaya'=>'required',
             'fk_commune'=>'required',
            'DateModifConsolid'=>'required|date',
            'DateModif'=>'required|date',
            'Nom_DR'=>'required',
                   ]);

                
                   
                   DB::table('b_structures')->where('id','like',$id)
                   ->update([
                    'code_ag'=>$request->code_ag,
                     'nom_ag'=>$request->nom_ag,
                     'Adresse'=>$request->Adresse,
                      'Tel'=>$request->Tel,
                   'Fax'=>$request->Fax,
                    'Telegraphe'=>$request->Telegraphe,
                    'Email'=>$request->Email,
                    'RC'=>$request->RC,
                    'IA'=>$request->IA,
                     'NIF'=>$request->NIF,
                     'Compte_bancaire'=>$request->Compte_bancaire,
                      'NSS'=>$request->NSS,
                      'abreger'=>$request->abreger,
                   'Sommeil'=>$request->Sommeil,
                    'NumeroRef'=>$request->NumeroRef,
                    'LieuSortant'=>$request->LieuSortant,
                    'DateCourrier'=>$request->DateCourrier,
                    'NumeroSequentiel'=>$request->NumeroSequentiel,
                     'VisibleGCPRO'=>$request->VisibleGCPRO,
                     'GuichetUnique'=>$request->GuichetUnique,
                      'fk_wilaya'=>$request->fk_wilaya,
                   'fk_commune'=>$request->fk_commune,
                    'DateModifConsolid'=>$request->DateModifConsolid,
                    'DateModif'=>$request->DateModif,
                    'Nom_DR'=>$request->Nom_DR,         
                  ]);

         return back();
    }
    public function delete_structure($id){
         
      DB::table('b_structures')->where('id',$id)->delete();
     
      return redirect()->route("tbase.structure");
    }
    public function detaille_structure (Request $request,$id)
    {
        $privilege = DB::table('p_privileges') ->join('p_profiles', 'p_profiles.code', '=', 'p_privileges.profile_code')
      ->where('p_profiles.code','=', Auth::user()->profile)
      ->where('volet_app','=','organismes')
      ->first();
      $directions = DB::table('b_direction')->get();

      $structure_enr =DB::table('b_structures')->join('b_wilaya', 'b_wilaya.code_w', '=', 'b_structures.fk_wilaya')
      ->join('b_commune', 'b_commune.code_c', '=', 'b_structures.fk_commune')
      ->where('id',$id)->first();
      $structures = DB::table('b_structures')->get();
     
      return view ('tbase.structures.structuredetaille',compact('privilege','structure_enr','structures','directions'));
    }
}
