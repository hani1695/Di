<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'fonction' => $data['fonction'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function register (Request $request)
    {
        
        
        $data=$request->validate([
            'matricule' => ['required', 'digits:5', 'unique:b_users'],
            'nom' => ['required', 'string', 'max:20'],
            'prenom' => ['required', 'string', 'max:20'],
            'fonction' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:b_users'],
            'profile' => ['required', 'string',],
            'organisme' => ['required', 'string',],
            'nom_dr' => ['required', 'string',],
            'structure' => ['required', 'string'],
            'image' => ['image'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        $data['image']=(empty($request->image) )? null : $request->image->store('images/profil', 'public');
        $data['password'] = Hash::make($request->password);
        
        User::create($data);
        session()->flash('success',$request->nom.' '.$request->prenom.' a été ajouté avec succès');
        return redirect()->route('utilisateur.index');
    }
    
}