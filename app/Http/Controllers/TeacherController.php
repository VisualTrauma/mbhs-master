<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Teacher;

class TeacherController extends Controller
{
	public function index()
	{
		$teachers = Teacher::paginate(10);

		return view('teachers/index', compact('teachers'));
	}

	public function store(Request $request) {
		$rules = [	'first-name' => 'required|min:2',
			  	'last-name' => 'required|min:2',
			  	'contact-number' => 'required|min:7'];

		$this->validate($request, $rules);

		$teacher = new Teacher();
		$teacher->first_name = $request->input('first-name');
		$teacher->last_name = $request->input('last-name');
		$teacher->teaching_area = $request->input('teaching-area');
		if($request->input('middle-name') != null) $teacher->middle_name = $request->input('middle-name'); 
		if($request->input('contact-number') != null) $teacher->contact_number = $request->input('contact-number'); 
		$teacher->save();

		return 'successfully added';
	}

	public function fetchAll() {
		$q = request('keyword');
		$teachers = Teacher::where('first_name', 'like', '%'. $q . '%')
						->orWhere('middle_name', 'like', '%' . $q . '%')
						->orWhere('last_name', 'like', '%'. $q . '%')
						->orWhere('teaching_area', 'like', '%'. $q . '%')
						->orWhere('contact_number', 'like', '%'. $q . '%')->paginate(10);

		return view('teachers/index', compact('teachers'));  
	}

	public function destroy(Teacher $teacher) {
		$teacher->delete();

		return 'success';
	}

	public function update(Request $request, Teacher $teacher) {
		$rules = [	'first-name' => 'required|min:2',
			  	'last-name' => 'required|min:2',
			  	'contact-number' => 'required|min:7'];

		$this->validate($request, $rules);

		$teacher->first_name = $request->input('first-name');
		$teacher->last_name = $request->input('last-name');
		$teacher->teaching_area = $request->input('teaching-area');
		if($request->input('middle-name') != null) $teacher->middle_name = $request->input('middle-name'); 
		if($request->input('contact-number') != null) $teacher->contact_number = $request->input('contact-number'); 
		$teacher->save();

		session(['success' => 'teacher information successfully updated!']);

		return  redirect('teachers');
	}
}
