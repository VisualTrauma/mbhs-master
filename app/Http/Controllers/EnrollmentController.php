<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\BulkEnroll;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Student;
use App\Enrollment;
use App\Section;

class EnrollmentController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('enrollments/index');
	}

	public function enroll() {
		Enrollment::truncate();
		$gradeLevels = ['Grade 7'];

		foreach($gradeLevels as $gradeLevel) {
			//get students to be enrolled
			$grade = Student::where('grade_level', $gradeLevel)
								->where('enrolled', 1)->get()
								// ->orWhere(function ($query) use($gradeLevel) {
								// 			$query->where('grade_level', $gradeLevel)
								// 					->Where('status', 'Retained');
								// 		})->get()
								->sortBy('general_average');

			//count result
			$gradeCount = count($grade);

			//divide *count result by 60 to get number of sections
			$sectionCount = floor($gradeCount / 60);

			//compute for excess students
			$remainder = $gradeCount % 60;

			//compute for students that have been successfully enrolled
			$totalEnrolled = $gradeCount - $remainder;
			
			$counter = 0;
			//actual sectioning of students
			for($i = 0; $i < $sectionCount; $i++){
				for($j = 0; $j < 60; $j++){
					set_time_limit(0); //prevent page from timing out
					$enroll = $grade->pop();
					$assignSection = new Enrollment();
					$assignSection->student_id = $enroll->id;
					$assignSection->printed = 0;
					$assignSection->section_id = $i+1;
					$assignSection->grade_level = $enroll->grade_level;
					$assignSection->registration_code = $enroll->registration_code;
					$assignSection->general_average = $enroll->general_average;
					$assignSection->save();
					$counter++;
				} 
			}
		}
    } 


	public function summary() {
		return count(Enrollment::where('grade_level', 'Grade 7')->where('section_id', 16)->get());
		if(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 7')->where('enrolled', 1)->get()) != 0) {
			$grade = 7;
		} elseif(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 8')->where('enrolled', 1)->get()) != 0) {
			$grade = 8;
		} elseif(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 9')->where('enrolled', 1)->get()) != 0) {
			$grade = 9;
		} elseif(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 10')->where('enrolled', 1)->get()) != 0) {
			$grade = 10;
		}

		$totalStudents = count(Student::where('grade_level', 'Grade ' . $grade)->doesntHave('enrollments')->get());
		$totalEnrolled = count(Student::with('enrollments')->where('grade_level', 'Grade ' . $grade)->get());
		return count(Student::where('grade_level', 'Grade ' . $grade)->get());

		return view('enrollments.summary', compact('totalEnrolled', 'grade', 'totalStudents'));
	}

	public function checkInserted($date) {
		return $enrolled = count(Enrollment::where('created_at', 'like', '%' . $date . '%')->get());
	}

	public function singleEnroll($grade) {
		if($grade == 7) $gradeLevel = 'Grade 7';

		return $unEnrolled = Student::doesntHave('enrollments')->where('grade_level', $gradeLevel)->where('enrolled', 1)->paginate(1);
	}
}
