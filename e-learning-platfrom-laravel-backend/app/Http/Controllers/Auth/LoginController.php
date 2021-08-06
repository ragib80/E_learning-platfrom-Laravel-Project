<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function index()
    {

        return view('login.index');
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    /**
     * Obtain the user information from provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider, Request $req)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider, $req);
        Auth::login($authUser, true);
        $req->session()->put('email', $user->email);
        return redirect()->route('home');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider, Request $req)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'avatar' => $user->avatar
        ]);
        $req->session()->put('email', $user->email);
    }
    public function authenticate(LoginRequest $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {

            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
    public function login(LoginRequest $req)
    {
        $user = User::where('email', $req->email)
            ->where('password', $req->password)
            ->first();
        $user->save();


        if ($user->count() > 0) {
            $req->session()->put('email', $req->email);
            $req->session()->put('id', $user->id);
            $req->session()->put('type', $user->type);
            $req->session()->flash('msg', 'Login Successful');
            return redirect()->route('home');
        } else {
            $req->session()->flash('msg', 'invaild username or password');
            return redirect('/login');
        }
    }
}