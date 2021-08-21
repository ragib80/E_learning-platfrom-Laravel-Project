<?php

namespace App\Http\Controllers\Instructor;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        
           return view('instructor.profile.index');
       
    }
    public function verify(){
        echo "posted";
    }
}
