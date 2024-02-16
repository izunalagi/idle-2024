<?php

namespace App\Http\Controllers\Auth;
use App\Ormawa;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Ormawa as AppOrmawa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use PhpParser\Node\Stmt\TryCatch;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
    public function index()
    {
        $ormawas = Ormawa::all();
        return view('auth.register', compact('ormawas'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(Request $request)
    {
        try {
            User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'id_ormawa' => $request['id_ormawa'],
            'password' => Hash::make($request['password']),
            ]);

            return redirect('/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
