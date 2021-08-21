<?php

namespace App\Http\Controllers\Instructor;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\http\Requests\RegistrationRequest;

use App\Models\Instructor;

class RegistrationController extends Controller
{
    public function index(){
        
           return view('instructor.registration.index');
       
    }
    public function verify(Request $req){
        
            $user = new Instructor;
            $user->user_name = $req->username;
            $user->full_name = $req->full_name;
            $user->password = $req->password;
            $user->cpassword = $req->cpassword;
            $user->email = $req->email;
            $user->address = $req->address;
            $user->country = $req->country;
            $user->dob =  $req->dob;
            $user->type =  $req->type;
            // $user->profile_img = '';
            $user->save();
            return $user;
            $h='hello';
            return $s;
        
    }
}
