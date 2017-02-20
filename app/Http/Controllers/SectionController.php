<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Section;

class SectionController extends Controller
{
    public function index() {
    	return view('sections/index');
    }

    public function store(Request $request) {
		$rules = [	'name' => 'required|min:2'   ];

		$this->validate($request, $rules);

		$section = new Section();
		$section->name = $request->input('name');
		$section->section_order = $request->input('section-order');
		$section->level = $request->input('grade-level');
		$section->added_by = $request->input('added-by');  
		$section->save();

		return 'successfully added';
	}

    public function fetchAll() {
		$section = Section::all();
		return Response::json($section);  
	}

	public function destroy(Section $section) {
		$section->delete();

		return 'success';
	}

	public function update(Request $request, Section $section) {
		$rules = [	'name' => 'required|min:2'    ];

		$this->validate($request, $rules);

		$section->name = $request->input('name');
		$section->section_order = $request->input('section-order');
		$section->level = $request->input('grade-level');
		$section->added_by = $request->input('added-by'); 
		$section->save();

		return 'successfully updated';
	}

	public function filterSection(Request $request = null) {
		return $section = Section::where('grade_level', $request->input('grade7'))
							->orWhere('grade_level', $request->input('grade8'))
							->orWhere('grade_level', $request->input('grade9'))
							->orWhere('grade_level', $request->input('grade10'))->get();
						  
		return Response::json($section);
	}
}
