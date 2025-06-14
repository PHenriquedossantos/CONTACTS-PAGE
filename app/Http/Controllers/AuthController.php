<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function showLogin()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{
		$request->validate([
				'email'    => 'required|email',
				'password' => 'required',
		]);

		if (! Auth::attempt($request->only('email','password'))) {throw ValidationException::withMessages(['email' => ['Credenciais inválidas.'],]);}

		$request->session()->regenerate();

		return redirect()->intended('contacts');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('login');
	}
}
