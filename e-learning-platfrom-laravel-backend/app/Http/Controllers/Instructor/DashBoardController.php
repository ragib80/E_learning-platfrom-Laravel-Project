<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        
           return view('instructor.dashboard.index');
       
    }
    public function verify(){
        echo "posted";
    }
}
