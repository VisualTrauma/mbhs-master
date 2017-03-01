<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\BulkEnroll;
use Carbon\Carbon;
use App\Student;
use App\Enrollment;
use App\Section;

class EnrollmentController extends Controller
{
	public function index()
	{
		return view('enrollments/index');
	}

	public function enroll($gradeLevel) {
		//get students to be enrolled
		$students = Student::doesntHave('enrollments')->where('grade_level', 'Grade 7')
							->where('enrolled', 1)->get()
							->sortBy('general_average');

		//count all students
		$studentsCount = count($students);

		if($studentsCount == 0) {
			return response()->json(['error' => 'no available students to be enrolled'], 404);
		}

		//divide *count result by 60 to get number of sections
		$sectionCount = floor($studentsCount / 60);

		//actual sectioning of students from 1 - 3
		for($i = 0; $i < 3; $i++){
			for($j = 0; $j < 60; $j++){
				set_time_limit(0); //prevent page from timing out
				$enroll = $students->pop();
				$assignSection = new Enrollment();
				$assignSection->student_id = $enroll->id;
				$assignSection->printed = 0;
				$assignSection->section_id = $i+1;
				$assignSection->grade_level = $enroll->grade_level;
				$assignSection->registration_code = $enroll->registration_code;
				$assignSection->general_average = $enroll->general_average;
				$assignSection->save();
			} 
		} //end actual sectioning of students from 1 - 3

		//lower section
		$students = $students->shuffle();

		//compute for excess students
		$remainder = $studentsCount % 60;

		//actual sectioning of students from 4 onwards
		for($i = 0; $i < $sectionCount - 3; $i++){
			for($j = 0; $j < 60; $j++){
				set_time_limit(0); //prevent page from timing out
				$enroll = $students->pop();
				$assignSection = new Enrollment();
				$assignSection->student_id = $enroll->id;
				$assignSection->printed = 0;
				$assignSection->section_id = $i+1;
				$assignSection->grade_level = $enroll->grade_level;
				$assignSection->registration_code = $enroll->registration_code;
				$assignSection->general_average = $enroll->general_average;
				$assignSection->save();
			} 
		} //end actual sectioning of students from 4 onwards

		if($remainder > 50 && $sectionCount < 17) { /* if remainder is greater than 50 and section is less than 17 */
			$sectionCount += 1;

			for($j = 0; $j < $remainder; $j++){
				set_time_limit(0); //prevent page from timing out
				$enroll = $students->pop();
				$assignSection = new Enrollment();
				$assignSection->student_id = $enroll->id;
				$assignSection->printed = 0;
				$assignSection->section_id = $sectionCount;
				$assignSection->grade_level = $enroll->grade_level;
				$assignSection->registration_code = $enroll->registration_code;
				$assignSection->general_average = $enroll->general_average;
				$assignSection->save();
			}
		} elseif($remainder < 51) { /* remainder is less than 51 distribute them to existing sections */
			for($j = 0; $j < $remainder; $j++){
				set_time_limit(0); //prevent page from timing out
				$enroll = $students->pop();
				$assignSection = new Enrollment();
				$assignSection->student_id = $enroll->id;
				$assignSection->printed = 0;
				$assignSection->section_id = $sectionCount;
				$assignSection->grade_level = $enroll->grade_level;
				$assignSection->registration_code = $enroll->registration_code;
				$assignSection->general_average = $enroll->general_average;
				$assignSection->save();
			}
		} 
	return 'done';
	} 


	public function summary() {
		if(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 7')->where('enrolled', 1)->get()) != 0) {
			$grade = 7;
		} elseif(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 8')->where('enrolled', 1)->get()) != 0) {
			$grade = 8;
		} elseif(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 9')->where('enrolled', 1)->get()) != 0) {
			$grade = 9;
		} elseif(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 10')->where('enrolled', 1)->get()) != 0) {
			$grade = 10;
		} else {
			return view('pages.zero-unenrolled');
		}

		$totalStudents = count(Student::where('grade_level', 'Grade ' . $grade)->doesntHave('enrollments')->get());
		$totalEnrolled = count(Student::with('enrollments')->where('grade_level', 'Grade ' . $grade)->get());
		$student = Student::doesntHave('enrollments')->where('grade_level', 'Grade ' . $grade)->paginate(1);
		$section = Section::where('grade_level', 'Grade ' . $grade)->where('id', '>', 3)->get();

		return view('enrollments.summary', compact('totalEnrolled', 'grade', 'totalStudents', 'student', 'section'));
	}

	public function checkInserted($date, $gradeLevel) {
		return $enrolled = count(Enrollment::where('created_at', 'like', '%' . $date . '%')->where('grade_level', $gradeLevel)->get());
	}

	public function singleEnroll($gradeLevel, $level) {
		return $unEnrolled = Student::doesntHave('enrollments')->where('grade_level', $gradeLevel)->where('enrolled', 1)->paginate(1);
	}
}
