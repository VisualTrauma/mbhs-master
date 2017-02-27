<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Student;
use App\Enrollment;

class BulkEnroll implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		$gradeLevels = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10'];

		foreach($gradeLevels as $gradeLevel) {

				//get students to be enrolled
				$grade = Student::where('grade_level', $gradeLevel)
									->where('status', 'Enrolled')->get()
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
}
