<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;

class LoginController extends Controller
{
     public function index(){
        
           return view('instructor.login.index');
       
    }

    function login(Request $req)
    {
        $data = Instructor::where("user_name",$req->user_name)
        ->where("password",$req->password)->first();
       
        return $data;
        //if(count($emp)>0) {
        //return$emp;
       // }
        return response()->json([
            'status'=>200,
            'data'=>$data,
 
         ]);
    } 
}
