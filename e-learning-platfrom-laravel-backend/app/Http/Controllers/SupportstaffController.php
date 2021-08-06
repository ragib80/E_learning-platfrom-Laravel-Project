<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportstaffController extends Controller
{
    public function index(){
        
           return view('supportstaff.Staffindex');
       
    }
    public function verify(){
        echo "posted";
    }
}
