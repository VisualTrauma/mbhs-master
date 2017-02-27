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
		$gradeLevels = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10'];

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
			$sectionCount = $gradeCount / 60;

			//compute for excess students
			$remainder = $gradeCount % 60;

			//compute for students that have been successfully enrolled
			$totalEnrolled = $gradeCount - $remainder;

			//round-off $sectionCount to int
			if(!is_int($sectionCount)) {
				$sectionCount = floor($sectionCount);
			}

			$counter = 0;
			$sectionCounter = 0;
			//actual sectioning of students
			for($i = 1; $i < $sectionCount; $i++){
				foreach($grade as $student){
					set_time_limit(0);
					if($counter < $i * 60){ 
						$counter++;
						$enroll = $grade->pop();
						$assignSection = new Enrollment();
						$assignSection->student_id = $enroll->id;
						$assignSection->printed = 0;
						$assignSection->section_id = $i;
						$assignSection->grade_level = $enroll->grade_level;
						$assignSection->registration_code = $enroll->registration_code;
						$assignSection->general_average = $enroll->general_average;
						$assignSection->save();
						$enroll->enrolled = 1;
						$enroll->save();
					} else break; //switch to the next section if current section has reached 60 students
				}
			}

			//list of students that was not automatically enrolled (needs to be manually enrolled)
			$excessStudents = $grade->values()->take($remainder);
		}
    } 


	public function summary() {
		$unEnrolledCount = [];
		$enrolledCount = [];
		$sectionCount = [];
		$section = [];

		if(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 7')->where('enrolled', 1)) != 0) {
			$unEnrolledGrade7 = Student::doesntHave('enrollments')->where('grade_level', 'Grade 7')->where('enrolled', 1)->paginate(1);
			$unEnrolledCount['Grade7'] = count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 7')->where('enrolled', 1)->get());
		} else $unEnrolled['Grade7'] = 0;

		if(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 8')->where('enrolled', 1)) != 0) {
			$unEnrolledGrade8 = Student::doesntHave('enrollments')->where('grade_level', 'Grade 8')->where('enrolled', 1)->paginate(1);
			$unEnrolledCount['Grade8'] = count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 8')->where('enrolled', 1)->get());
		} else $unEnrolled['Grade8'] = 0;

		if(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 9')->where('enrolled', 1)) != 0) {
			$unEnrolledGrade9 = Student::doesntHave('enrollments')->where('grade_level', 'Grade 9')->where('enrolled', 1)->paginate(1);
			$unEnrolledCount['Grade9'] = count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 9')->where('enrolled', 1)->get());
		} else $unEnrolled['Grade9'] = 0;

		if(count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 10')->where('enrolled', 1)) != 0) {
			$unEnrolledGrade10 = Student::doesntHave('enrollments')->where('grade_level', 'Grade 10')->where('enrolled', 1)->paginate(1);
			$unEnrolledCount['Grade10'] = count(Student::doesntHave('enrollments')->where('grade_level', 'Grade 10')->where('enrolled', 1)->get());
		} else $unEnrolled['Grade10'] = 0;

		$enrolledCount['Grade7'] = count(Enrollment::where('grade_level', 'Grade 7')->get());
		$sectionCount['Grade7'] = count(Section::where('grade_level', 'Grade 7')->take($enrolledCount['Grade7'] / 60)->get());
		$section['Grade7'] = Section::all()->take($sectionCount['Grade7']);
		$enrolledCount['Grade8'] = count(Enrollment::where('grade_level', 'Grade 8')->get());
		$sectionCount['Grade8'] = count(Section::where('grade_level', 'Grade 8')->take($enrolledCount['Grade8'] / 60)->get());
		$section['Grade8'] = Section::all()->take($sectionCount['Grade8']);
		$enrolledCount['Grade9'] = count(Enrollment::where('grade_level', 'Grade 9')->get());
		$sectionCount['Grade9'] = count(Section::where('grade_level', 'Grade 9')->take($enrolledCount['Grade9'] / 60)->get());
		$section['Grade9'] = Section::all()->take($sectionCount['Grade9']);
		$enrolledCount['Grade10'] = count(Enrollment::where('grade_level', 'Grade 10')->get());
		$sectionCount['Grade10'] = count(Section::where('grade_level', 'Grade 10')->take($enrolledCount['Grade10'] / 60)->get());
		$section['Grade10'] = Section::all()->take($sectionCount['Grade10']);

		return view('enrollments.summary', compact('enrolledCount', 'sectionCount', 'unEnrolledCount', 'unEnrolledGrade7', 'unEnrolledGrade8', 'unEnrolledGrade9', 'unEnrolledGrade10', 'section'));
	}

	public function checkInserted($date) {
		return $enrolled = count(Enrollment::where('created_at', 'like', '%' . $date . '%')->get());
	}
}
