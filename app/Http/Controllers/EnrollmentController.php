<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

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
}
