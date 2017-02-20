<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Subject; 
use App\TveSubject;

class SubjectController extends Controller
{
	public function index() {
		return view('subjects/index');
	}

	public function store(Request $request) {
		if($request->input('tve-subject')) { 
			$rules = [    'description' => 'required|min:2'    ];

			$this->validate($request, $rules);	

			$tvesubject = new TveSubject();
			$tvesubject->description = $request->input('description');								
			$tvesubject->grade_level = $request->input('grade-level');					
			$tvesubject->added_by = $request->input('added-by');
			$tvesubject->save();	

			return 'successfully added';
		 } else { 
			$rules = [    'code' => 'required|min:2',
			      		  'description' => 'required|min:2'    ];

			$this->validate($request, $rules);	

			$subject = new Subject();
			$subject->code = $request->input('code');					
			$subject->description = $request->input('description');								
			$subject->added_by = $request->input('added-by');
			$subject->save();	

			return 'successfully added';
		 }
	}

	public function fetchAll() {
		$subjects = Subject::all();
		return Response::json($subjects);  
	}

	public function destroy(Subject $subject) {
		$subject->delete();

		return 'success';
	}

	public function update(Request $request, Subject $subject) {
		$grade;
		if ($request->input('grade-level') == 'Grade 7') $grade = 7;
		else if ($request->input('grade-level') == 'Grade 8') $grade = 8;
		else if ($request->input('grade-level') == 'Grade 9') $grade = 9;
		else $grade = 10;

		$rules = [    'code' => 'required|min:2',
			      'description' => 'required|min:2'    ];

		$this->validate($request, $rules);

		$subject->code = $request->input('code');					
		 $subject->description = $request->input('description');								
		 $subject->grade_level = $grade;					
		 $subject->added_by = $request->input('added-by');
		 $subject->save();	

		return 'successfully updated';
	}

	public function fetchAllTve() {
		$tveSubjects = TveSubject::all();
		return Response::json($tveSubjects);  
	}
}
