<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;

class ReportController extends Controller
{
    public function studentEnrollment() {

        $students = Student::initialize();

        if($gradeLevel = request('grade_level')) {
            $students->gradeLevel($gradeLevel);
        }

        if($status = request('status')) {
            $students->status($status);
        }

        $students = $students->get();

        return view('reports.student-enrollment', compact('students'));
    }

    public function teacherList() {
        $teachers = Teacher::all();
        return view('reports.teacher-list', compact('teachers'));
    }

    public function printStudentEnrollment() {
        $students = Student::initialize();

        if($gradeLevel = request('grade_level')) {
            $students->gradeLevel($gradeLevel);
        }

        if($status = request('status')) {
            $students->status($status);
        }

        $students = $students->get();

        return view('reports.print-student-enrollment', compact('students'));
    }
}
