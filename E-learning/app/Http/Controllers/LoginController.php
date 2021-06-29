<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;
use App\Models\Instructor;

class LoginController extends Controller
{
    public function index(){
        
           return view('login.index');
       
    }
    public function verify(LoginRequest $req){
        $user = Instructor::where('user_name', $req->uname)
        ->where('password', $req->password)
        ->first();
    $user->save();
    

    if ($user->count() > 0) {
        $req->session()->put('uname', $req->uname);
        $req->session()->flash('msg', 'Login Successful');
        return redirect('/dashboard');
    } else {
        $req->session()->flash('msg', 'invaild username or password');
        return redirect('/login');
    }
    }
}
