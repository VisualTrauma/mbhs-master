<?php
use App\Student;
use Carbon\Carbon;

Route::group(['middleware' => 'auth'], function() {
	Route::resource('users', 'UserController');
	Route::resource('search', 'SearchController');
	Route::resource('subjects', 'SubjectController');
	Route::resource('sections', 'SectionController');
	Route::resource('students', 'StudentController');
	Route::resource('teachers', 'TeacherController');
	Route::resource('schedules', 'ScheduleController');
	Route::resource('enrollments', 'EnrollmentController');
	Route::resource('students.enrollments', 'StudentEnrollmentController');
	Route::get('enroll/{gradeLevel}', ['as' => 'enroll', 'uses' => 'EnrollmentController@enroll']);	
	Route::get('single-enroll', ['as' => 'single.enroll', 'uses' => 'EnrollmentController@singleEnroll']);	
	Route::get('summary', ['as' => 'summary','uses' => 'EnrollmentController@summary']);
	Route::get('zero-unenrolled', ['as' => 'zero','uses' => 'PageController@zero']);	});

Route::get('/', 'PageController@login');
Route::get('login', ['as' => 'login', 'uses' => 'PageController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'PageController@logout']);
Route::get('filter-section/{section?}', ['as' => 'filter.section', 'uses' => 'SectionController@filterSection']);
Route::get('all-users', ['as' => 'users.all', 'uses' => 'UserController@fetchAll']);
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'PageController@dashboard']);
Route::get('all-subjects', ['as' => 'subjects.all', 'uses' => 'SubjectController@fetchAll']);
Route::get('search-teachers', ['as' => 'teachers.all', 'uses' => 'TeacherController@fetchAll']);
Route::get('all-sections', ['as' => 'sections.all', 'uses' => 'SectionController@fetchAll']);
Route::get('all-tve-subjects', ['as' => 'tvesubjects.all', 'uses' => 'SubjectController@fetchAllTve']);

Route::post('show-student', 'StudentController@showStudent');
Route::post('students/editButton', 'StudentController@editStudent');
Route::post('login', ['as' => 'login.auth', 'uses' => 'PageController@auth']);
Route::get('load/{grade}', function($grade) {
	return view('pages.load', ['grade' => $grade]);
});
Route::get('checkinserted/{time}/{grade}', 'EnrollmentController@checkInserted');

Route::group(['prefix' => 'reports'], function() {
	Route::get('student-enrollment', 'ReportController@studentEnrollment');
	Route::get('teachers-list', 'ReportController@teacherList');
	Route::get('enrollment', 'ReportController@enrollment');
	Route::get('enrollment/{id}', 'ReportController@printEnrollment');

	Route::group(['prefix' => 'print'], function() {
		Route::get('student-enrollment', 'ReportController@printStudentEnrollment');
		Route::get('teachers-list', 'ReportController@printTeachersList');
	});
});
