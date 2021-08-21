<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;

class DashBoardController extends Controller
{
    public function index()
    {

        return view('dashboard.index');
    }
    public function verify(Request $req)
    {
        $users = User::all();

        if ($req->session()->get('type') == 0) {
            $req->session()->flash('msg', 'Welcome to  Admin Dashboard');
            return redirect()->route('admin.index')->with('users', $users);;
        } else  if ($req->session()->get('type') == 1) {
            $req->session()->flash('msg', 'Welcome to  Instructor Dashboard');
            return redirect()->route('instructor.index');
        } else if ($req->session()->get('type') == 2) {
            $req->session()->flash('msg', 'Welcome to  Student Dashboard');
            return redirect()->route('student.index');
        } else if ($req->session()->get('type') == 3) {
            $req->session()->flash('msg', 'Welcome to  Stuff Dashboard');
            return redirect()->route('stuff.index');
        } else {
            $req->session()->flash('msg', 'you have to login to display dashboard');
            return redirect('/login');
        }
    }
}