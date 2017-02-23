<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;

class StudentController extends Controller
{
    
	public function index()
	{
	        return view('students/index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	        $user = Auth::user();
	        return view('students/create', [ 'user'=> $user ]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tel_number = "";

		if ( $request->input('tel-num') == null ) { }
		else {
			$tel_num = 'none';
		}

		$year_graduate = "";

		if ( $request->input('year-graduated') == null ) { }
		else {
			$year_graduated = 'none';
		}

		$last_school = "";

		if ( $request->input('last-school') == null ) { }
		else {
			$last_school = 'none';
		}

		$general_average = doubleval( $request->input('general-average') );

	          	$rules = array(
		        	'first-name' => 'required|min:3',
		            'last-name' => 'required|min:2',
		            'guardian-name' => 'required|min:3',
		            'address' => 'required|min:7',
		            'general-average' => 'required|min:1|max:3',
	            ); 
			
	       	$this->validate($request, $rules);

	      	$student = new Student();
			$student->first_name = $request->input('first-name');
			$student->middle_name = $request->input('middle-name');
			$student->last_name = $request->input('last-name');
			$student->address = $request->input('address');
			$student->gender = $request->input('gender');
			$student->status = $request->input('status');
			$student->grade_level = $request->input('grade-level');
			$student->form137 = $request->input('form137');
			$student->birth_certificate = $request->input('birth-certificate');
			$student->id_picture = $request->input('id_picture');
			$student->birthdate = $request->input('birthdate');
			$student->general_average = $request->input('general-average');
			$student->last_school_attended = $request->input('school-last-attended');
			$student->lrn = $request->input('lrn');
			$student->guardian_name = $request->input('guardian-name');
			$student->mobile_number = $request->input('mobile-number');
			$student->tel_number = $request->input('tel-number');
			$student->year_graduated = $request->input('year-graduated');
			$student->save();

			session(['success' => 'Student successfully added!']);

	        return redirect('enrollments');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showStudent(Request $request)
	{
	        	return redirect('students/' . $request->input('selected-id'));
	}

	public function show(Student $student)
	{
	        return view('students/show', ['student' => $student]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, Student $student)
	{
		$tel_number = "";

		if ( $request->input('tel-num') == null ) { }
		else {
			$tel_num = 'none';
		}
		$year_graduate = "";

		if ( $request->input('year-graduated') == null ) { }
		else {
			$year_graduated = 'none';
		}

		$last_school = "";

		if ( $request->input('school-last-attended') == null ) { }
		else {
			$last_school = 'none';
		}

		$general_average = doubleval( $request->input('general-average') );

			$rules = array(
				'first-name' => 'required|min:3',
				'last-name' => 'required|min:2',
				'guardian-name' => 'required|min:3',
				'address' => 'required|min:7',
				'general-average' => 'required|min:1|max:3',
			); 

		$this->validate($request, $rules);
		
		$student->first_name = $request->input('first-name');
		$student->middle_name = $request->input('middle-name');
		$student->last_name = $request->input('last-name');
		$student->address = $request->input('address');
		$student->gender = $request->input('gender');
		$student->status = $request->input('status');
		$student->grade_level = $request->input('grade-level');
		$student->form137 = $request->input('form137');
		$student->birth_certificate = $request->input('birth-certificate');
		$student->id_picture = $request->input('id_picture');
		$student->birthdate = $request->input('birthdate');
		$student->general_average = $request->input('general-average');
		$student->last_school_attended = $request->input('school-last-attended');
		$student->lrn = $request->input('lrn');
		$student->guardian_name = $request->input('guardian-name');
		$student->mobile_number = $request->input('mobile-number');
		$student->tel_number = $request->input('tel-number');
		$student->year_graduated = $request->input('year-graduated');
		$student->save();

		session(['success' => 'Student successfully updated!']);

		return redirect('students/'. $student->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Student $student) {
		$student->delete();
		session(['success' => 'student information successfully deleted!']);
		
		return redirect('students');
	}

    public function editStudent() {
        return redirect('students/'. request('selected-id') .'/edit');
    }

    public function edit(Student $student) {

        return view('students/edit', ['student' => $student]);
    }
}
