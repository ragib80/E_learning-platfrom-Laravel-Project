<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        
           return view('course.list');
       
    }
    public function verify(){
        echo "posted";
    }
    public function details()
    {
        
  
        return view('course.details')->with('course', $course);
    }
    public function create(){
        return view('course.create');
    }
    public function edit()
    {
       
        return view('course.edit');
    }
    public function delete()
    {
    
        return view('course.delete');
    }
    public function search(){
        return view('course.search');
    }
}
