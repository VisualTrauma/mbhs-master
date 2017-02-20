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
		 $requirements = "";

		if ( (request('form138') !=  null) && ( request('birth-certificate') != null ) && ( request('picture') != null ) ) {
			$requirements = 'Complete';
		} else {
			$requirements = 'Incomplete';
		}

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

		$general_average = doubleval( $request->input('tel-num') );

	          	$rules = array(
		        	'first-name' => 'required|min:3',
		            'last-name' => 'required|min:2',
		            'gender' => 'required',
		            'birthdate' => 'required',
		            'status' => 'required',
		            'grade-level' => 'required',
		            'guardian-name' => 'required|min:3',
		            'address' => 'required|min:7',
		            'mobile-number' => 'required|min:11',
		            'gen-ave' => 'required|min:1',
	            ); 

	       	$this->validate(request(), $rules);
	       	$this->validate($request, $rules);


	      	$user = new Student();
        		$user->first_name = $request->input('first-name');
        		$user->middle_name = $request->input('middle-name');
        		$user->last_name = $request->input('last-name');
        		$user->address = $request->input('address');
        		$user->gender = $request->input('gender');
        		$user->status = $request->input('status');
        		$user->grade_level = $request->input('grade-level');
        		$user->form137 = $request->input('form137');
        		$user->birth_certificate = $request->input('birth-certificate');
        		$user->id_picture = $request->input('id_picture');
        		$user->birthdate = $request->input('birthdate');
        		$user->general_average = $request->input('gen-ave');
        		$user->last_school_attended = $request->input('school-last-attended');
        		$user->lrn = $request->input('lrn');
        		$user->guardian_name = $request->input('guardian-name');
        		$user->mobile_number = $request->input('mobile-number');
        		$user->tel_number = $request->input('tel-number');
        		$user->year_graduated = $request->input('year-graduated');
	        	$user->save();

	        return redirect('students');
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

	public function show($id)
	{
	        $student = Student::find($id);
	        return view('students/show', ['student' => $student]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

    public function editButton($id) {
        return redirect('students/'. $selectedId .'/edit');
//        return Input::all();
    }

    public function edit($id) {
        $student = Student::find($id);

        return view('students/edit', ['student' => $student]);
    }
}
