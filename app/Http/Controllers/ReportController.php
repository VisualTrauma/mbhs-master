<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Enrollment;

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

        $teachers = Teacher::initialize();

        if($teachingArea = request('teaching_area')) {
            $teachers->teachingArea($teachingArea);
        }

        $teachers = $teachers->get();
        return view('reports.teacher-list', compact('teachers'));
    }

    public function enrollment() {
        // $student = Student::where('lrn', request('search'))
        //     ->orWhere('first_name', request('search'))
        //     ->orWhere('last_name', request('search'))
        //     ->get();
        //
        // if($student->count() > 0) {
        //     return $student;
        //     $enrollments = Enrollment::with(['student', 'section'])->where('lrn', $student->lrn)->get();
        // }

        if($search = request('search')) {
            $enrollments = Enrollment::with(['student', 'section'])->whereHas('student', function($q) {
                    $q->where('lrn', request('search'))->orWhere('first_name', request('search'))->orWhere('last_name', request('search'));
                })->get();
        } else {
            $enrollments = Enrollment::with(['student', 'section'])->get();
        }

        return view('reports.enrollment', compact('enrollments'));
    }

    public function printEnrollment($id) {
        $enrollment = Enrollment::with(['student', 'section'])->find($id);
        return view('reports.print-assessment', compact('enrollment'));
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

    public function printTeachersList() {
        $teachers = Teacher::initialize();

        if($teachingArea = request('teaching_area')) {
            $teachers->teachingArea($teachingArea);
        }

        $teachers = $teachers->get();
        return view('reports.print-teacher-list', compact('teachers'));
    }
}
