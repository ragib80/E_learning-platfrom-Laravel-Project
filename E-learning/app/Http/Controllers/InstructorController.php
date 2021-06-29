<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(){
        
           return view('instractor.list');
       
    }
    public function verify(){
        echo "posted";
    }
    public function details()
    {
        
  
        return view('instractor.details');
    }
    public function create(){
        return view('instractor.create');
    }
    public function edit()
    {
       
        return view('instractor.edit');
    }
    public function delete()
    {
    
        return view('instractor.delete');
    }
    public function search(){
        return view('instractor.search');
    }
}
