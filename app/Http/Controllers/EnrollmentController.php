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

	public function enroll() {
		$grade7 = Student::all()->where('grade_level', 'Grade 7')->Where('status', 'Enrolled')->sortBy('general_average');
		$grade7Count = count($grade7);
		$grade7Sections = $grade7Count / 60;
		$remainder = $grade7Count % 60;
		if(!is_int($grade7Sections)) {
			$grade7Sections = floor($grade7Sections);
		}
		$counter = 0;
		$sectionCounter = 0;
		for($i = 1; $i < $grade7Sections; $i++){
			foreach($grade7 as $student){
				if($counter < $i * 60){
					$counter++;
					$enroll = $grade7->pop();
					$assignSection = new Enrollment();
					$assignSection->student_id = $enroll->id;
					$assignSection->section_id = $i;
					$assignSection->registration_code = $enroll->registration_code;
					$assignSection->grade_level = $enroll->grade_level;
					$assignSection->general_average = $enroll->general_average;
					$assignSection->save();
				} else break;
			}
		}
		$excessStudents = $grade7->values()->take($remainder);
	}
}
