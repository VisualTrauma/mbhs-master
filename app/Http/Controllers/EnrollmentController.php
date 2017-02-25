<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

	public function enroll($grade_level) {
		//get students to be enrolled
		$grade = count(Student::where('grade_level', $grade_level)
							   ->where('status', 'Enrolled')
							   ->orWhere(function ($query) use($grade_level) {
											$query->where('grade_level', $grade_level)
												  ->Where('status', 'Retained');
										})->get()
							   ->sortBy('general_average'));

		//count result
		$gradeCount = count($grade);

		//divide *count result by 60 to get number of sections
		$sectionCount = $gradeCount / 60;

		//compute for excess students
		$remainder = $gradeCount % 60;

		//round-off $sectionCount to int
		if(!is_int($sectionCount)) {
			$sectionCount = floor($sectionCount);
		}

		$counter = 0;
		$sectionCounter = 0;
		//actual sectioning of students
		for($i = 1; $i < $sectionCount; $i++){
			foreach($grade as $student){
				if($counter < $i * 60){ 
					$counter++;
					$enroll = $grade->pop();
					$assignSection = new Enrollment();
					$assignSection->student_id = $enroll->id;
					$assignSection->section_id = $i;
					$assignSection->registration_code = $enroll->registration_code;
					$assignSection->grade_level = $enroll->grade_level;
					$assignSection->general_average = $enroll->general_average;
					$assignSection->save();
				} else break; //switch to the next section if current section has reached 60 students
			}
		}

		//list of students that was not automatically enrolled (needs to manually enrolled)
		$excessStudents = $grade->values()->take($remainder);
	}

	public function summary() {
		return view('enrollments.summary');
	}
}
