<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;

class PageController extends Controller
{
    public function login()
	{
		return view('pages/login');
	}

    public function logout() {
        Auth::logout();
        return redirect('login');
    }

	public function auth()
	{   
                $rules = array('username' => 'required', 'password' => 'required');
                $this->validate(request(), $rules);

                if( ! auth()->attempt(request(   [  'username', 'password'    ])) ) {
                     return view('pages/login')->withErrors(array('Invalid credentials'));
                 }
                
                return redirect('dashboard');
        	}

            public function dashboard(){
                $unenrolled[0] = Student::where('status', '!=', 'Enrolled')->where('grade_level', 7)->get();
                $unenrolled[1] = Student::where('status', '!=', 'Enrolled')->where('grade_level', 8)->get();
                $unenrolled[2] = Student::where('status', '!=', 'Enrolled')->where('grade_level', 9)->get();
                $unenrolled[3] = Student::where('status', '!=', 'Enrolled')->where('grade_level', 10)->get();
                $color = ['tile-info', 'tile-warning', 'tile-success', 'tile-danger'];
                return view('pages/dashboard', ['unenrolled' => $unenrolled, 'color' => $color]);
            }
}
