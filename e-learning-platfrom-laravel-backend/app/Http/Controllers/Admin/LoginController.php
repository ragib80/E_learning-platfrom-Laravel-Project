<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Http\Requests\LoginRequest;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {

        return view('login.index');
    }
    public function verify(Request $req)
    {
        $user = User::where('email', $req->email)
            ->where('password', $req->password)
            ->first();
        // $user->save();
        return response()->json([
            'status' => 200,
            'user' =>   $user

        ]);

        // if ($user->count() > 0) {
        //     if ($user->type == 'admin') {
        //         $req->session()->put('email', $req->email);
        //         $req->session()->flash('msg', 'Login Successful');
        //         return redirect()->route('admin.index');
        //     } else if ($user->type == 'instructor') {
        //         $req->session()->put('email', $req->email);
        //         $req->session()->flash('msg', 'Login Successful');
        //         return redirect()->route('instructor.index');
        //     }
        // } else {
        //     $req->session()->flash('msg', 'invaild username or password');
        //     return redirect('/login');
        // }
    }
}