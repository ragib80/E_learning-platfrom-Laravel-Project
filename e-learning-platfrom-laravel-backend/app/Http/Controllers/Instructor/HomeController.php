<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
           return view('instructor.home.index');
       
    }
    public function verify(){
        echo "posted";
    }
}
