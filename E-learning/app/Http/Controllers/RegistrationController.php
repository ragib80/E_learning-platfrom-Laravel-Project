<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        
           return view('registration.index');
       
    }
    public function verify(Request $req){
        if($req->uname == $req->password){
            return redirect('/dashboard');
        }
    }
}
