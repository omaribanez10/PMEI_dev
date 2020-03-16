<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Rol;
use App\TipoDocumento;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
   // use RegistersUsers;
     use RedirectsUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('roles:1');
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
            'name' => ['required', 'string', 'max:50'],
            'nombre_2' => ['nullable', 'string', 'max:50'],
            'apellido_1' => ['required', 'string', 'max:50'],
            'apellido_2' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nombre_login' => ['required', 'string', 'max:20','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'direccion' => ['nullable', 'string', 'max:50'],
            'telefono_1' => ['nullable', 'integer', ''],
            'telefono_2' => ['required', 'integer', ''],
            'fecha_nacimiento' => ['required', 'date', ''],
            'genero' => ['required', 'string', 'max:10'],
            'tipo_documento' => ['required', 'string', 'max:4'],
            'numero_documento' => ['required', 'integer', 'unique:users'],
            'id_rol' => ['required', 'integer', 'max:2'],

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
            'nombre_2' => $data['nombre_2'],
            'apellido_1' => $data['apellido_1'],
            'apellido_2' => $data['apellido_2'],
            'email' => $data['email'],
            'nombre_login' => $data['nombre_login'],
            'password' => $data['password'],
            'direccion' => $data['direccion'],
            'telefono_1' => $data['telefono_1'],
            'telefono_2' => $data['telefono_2'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'genero' => $data['genero'],
            'tipo_documento' => $data['tipo_documento'],
            'numero_documento' => $data['numero_documento'],
            'id_rol' => $data['id_rol'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
       $roles = Rol::all();
       $tipos_documentos = TipoDocumento::all();
       return view('auth.register', compact('roles','tipos_documentos'));
   }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }



}
