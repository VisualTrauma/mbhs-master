<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Enrollment;
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
                $grades = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10'];
                $grade[0] = count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 7')->where('enrolled', 1)->get());
                $grade[1] = count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 8')->where('enrolled', 1)->get());
                $grade[2] = count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 9')->where('enrolled', 1)->get());
                $grade[3] = count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 10')->where('enrolled', 1)->get());
                $unenrolled[0] = Student::where('grade_level', 'Grade 7')->take(1)->get();
                $unenrolled[1] = Student::where('grade_level', 'Grade 8')->take(1)->get();
                $unenrolled[2] = Student::where('grade_level', 'Grade 9')->take(1)->get();
                $unenrolled[3] = Student::where('grade_level', 'Grade 10')->take(1)->get();
                
                $latest[0] = Student::latest('updated_at')->where('grade_level', 'Grade 7')->take(1)->get();
                $latest[1] = Student::latest('updated_at')->where('grade_level', 'Grade 8')->take(1)->get();
                $latest[2] = Student::latest('updated_at')->where('grade_level', 'Grade 9')->take(1)->get();
                $latest[3] = Student::latest('updated_at')->where('grade_level', 'Grade 10')->take(1)->get();
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
                return view('pages/dashboard', compact(['grade', 'grades' ,'unenrolled', 'latest', 'teachers', 'students', 'male', 'female', 'color', 'average']));
            }

    public function zero() {
        return view('pages.zero-unenrolled');
    }
}
