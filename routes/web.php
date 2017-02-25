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
	Route::resource('students.enrollments', 'StudentEnrollmentController');	});

Route::get('/', 'PageController@login');
Route::get('login', ['as' => 'login', 'uses' => 'PageController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'PageController@logout']);
Route::get('filter-section/{section?}', ['as' => 'filter.section', 'uses' => 'SectionController@filterSection']);
Route::get('all-users', ['as' => 'users.all', 'uses' => 'UserController@fetchAll']);
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'PageController@dashboard']);
Route::get('all-subjects', ['as' => 'subjects.all', 'uses' => 'SubjectController@fetchAll']);
Route::get('all-teachers', ['as' => 'teachers.all', 'uses' => 'TeacherController@fetchAll']);
Route::get('all-sections', ['as' => 'sections.all', 'uses' => 'SectionController@fetchAll']);
Route::get('all-tve-subjects', ['as' => 'tvesubjects.all', 'uses' => 'SubjectController@fetchAllTve']);

Route::post('show-student', 'StudentController@showStudent');
Route::post('students/editButton', 'StudentController@editStudent');
Route::post('login', ['as' => 'login.auth', 'uses' => 'PageController@auth']);

Route::get('home', function() {
	return Student::latest()->where('grade_level', 'Grade 10')->take(1)->get();
});

Route::group(['prefix' => 'reports'], function() {
	Route::get('student-enrollment', 'ReportController@studentEnrollment');
	Route::get('teachers-list', 'ReportController@teacherList');

	Route::group(['prefix' => 'print'], function() {
		Route::get('student-enrollment', 'ReportController@printStudentEnrollment');
	});
});
