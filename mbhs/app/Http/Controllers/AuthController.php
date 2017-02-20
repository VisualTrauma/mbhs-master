<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    **
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function login()
    {
        return View::make('pages/login');
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::to('login');
    }

    public function post()
    {
        return 'sample';
        $rules = array('username' => 'required', 'password' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return view('pages/login')->withErrors($validator);
        }

        $auth = Auth::attempt(array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        ), false);

        if (!$auth) {
            return view('pages/login')->withErrors(array('Invalid credentials'));
        }

        return redirect('dashboard');
    }
}
