<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
use App\User;

class UserController extends Controller
{
    public function index()
	{
		$users = User::paginate(10);
		return view('users/index', compact('users'));
	}

	public function create()
	{
	        $user = Auth::user();
	        return view('users/create')->with('user', $user);
	}


	public function store(Request $request) {
		$rules = [	'first-name' => 'required|min:2',
			  	'last-name' => 'required|min:2',
			  	'contact-number' => 'required|min:7',	
			  	'designation' => 'required',
			  	'username' => 'required|min:3'	];

		$this->validate($request, $rules);

		$user = new User();
		$user->first_name = $request->input('first-name');
		$user->last_name = $request->input('last-name');
		$user->designation = $request->input('designation');
		$user->access_level = $request->input('access-level'); 
		$user->contact_number = $request->input('contact-number'); 
		$user->username = $request->input('username'); 
		$user->password = bcrypt($request->input('username')); 
		$user->save();

		return 'successfully added';
	}

	public function fetchAll() {
		$users = User::all();
		return Response::json($users);  
	}


	public function destroy(User $user) {
		$user->delete();

		return 'success';
	}

	public function update(Request $request, User $user) {
		$rules = [	'first-name' => 'required|min:2',
			  	'last-name' => 'required|min:2',
			  	'designation' => 'required',
			  	'contact-number' => 'required|min:7',
			  	'username' => 'required|min:3'	];

		$this->validate($request, $rules);

		$user->first_name = $request->input('first-name');
		$user->last_name = $request->input('last-name');
		$user->designation = $request->input('designation');
		$user->access_level = $request->input('access-level'); 
		$user->contact_number = $request->input('contact-number'); 
		$user->username = $request->input('username');
		$user->save();

		return 'successfully updated';
	}
}
