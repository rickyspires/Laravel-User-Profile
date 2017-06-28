<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{  

	public function __construct()
	{
		$this->middleware('guest:admin');
	}

	//SHOW LOGIN FORM
	public function showLoginForm()
	{
	    return view('auth.admin-login');
	}
	
	//LOGIN
	public function login(Request $request)
	{
		// Validate form data
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);
		// attampt to login
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
			// if successful redirect to admin
			return redirect()->intended(route('admin.dashboard'));
		}
		
		// not redirect back 
	    return redirect()->back()->withInput($request->only('email','remember'));
	}
}
