<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;
use App\Teacher;

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
                $unenrolled[0] = Student::where('status', '!=', 'Enrolled')->where('grade_level', 'Grade 7')->get();
                $unenrolled[1] = Student::where('status', '!=', 'Enrolled')->where('grade_level', 'Grade 8')->get();
                $unenrolled[2] = Student::where('status', '!=', 'Enrolled')->where('grade_level', 'Grade 9')->get();
                $unenrolled[3] = Student::where('status', '!=', 'Enrolled')->where('grade_level', 'Grade 10')->get();
                $latest[0] = Student::latest()->where('grade_level', 'Grade 7')->take(1)->get();
                $latest[1] = Student::latest()->where('grade_level', 'Grade 8')->take(1)->get();
                $latest[2] = Student::latest()->where('grade_level', 'Grade 9')->take(1)->get();
                $latest[3] = Student::latest()->where('grade_level', 'Grade 10')->take(1)->get();
                $teachers = Teacher::all()->count();
                $students = Student::all();
                global $average;
                foreach($students as $student) {
                    $average = $average + $student->general_average;
                }
                $average = $average / $students->count();
                $male = Student::where('gender', 'Male')->get();
                $female = Student::where('gender', 'Female')->get();

                $color = ['tile-info', 'tile-warning', 'tile-success', 'tile-danger'];
                return view('pages/dashboard', compact(['unenrolled', 'latest', 'teachers', 'students', 'male', 'female', 'color', 'average']));
            }
}
