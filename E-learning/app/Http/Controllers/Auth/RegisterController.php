<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\http\Requests\RegistrationRequest;
use App\Models\Instructor;
use App\Models\Student;

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
            'type' => ['required', 'string', 'max:20'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
        ]);
    }
    public function register(RegistrationRequest $req)
    {
        if ($req->type == 1) {
            $instructor = new Instructor;
            $instructor->username = $req->username;
            $instructor->fullname = $req->fullname;
            $instructor->password = $req->password;
            $instructor->email = $req->email;
            $instructor->address = $req->address;
            $instructor->country = $req->country;
            $instructor->dob =  $req->dob;
            $instructor->p_num =  "0192345678912";
            $instructor->c_id =  "1";
            // $instructor->type =  $req->type;
            // $user->profile_img = '';
            $instructor->save();

            $user = new User;
            $user->username = $req->username;
            $user->password = $req->password;
            $user->email = $req->email;
            $user->type =  $req->type;
            // $user->profile_img = '';
            $user->save();
            return redirect()->route('login');
        } else if ($req->type == 2) {
            $student = new Student;
            $student->username = $req->username;
            $student->fullname = $req->fullname;
            $student->password = $req->password;
            $student->email = $req->email;
            $student->address = $req->address;
            $student->country = $req->country;
            $student->dob =  $req->dob;
            $student->p_num =  "0192345678912";
            $student->c_id =  "1";
            // $instructor->type =  $req->type;
            // $user->profile_img = '';
            $student->save();

            $user = new User;
            $user->username = $req->username;
            $user->password = $req->password;
            $user->email = $req->email;
            $user->type =  $req->type;
            // $user->profile_img = '';
            $user->save();
            return redirect()->route('login');
        }
    }
}