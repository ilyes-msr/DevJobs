<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  public function create() {
    return view('users.register');
  }

  public function store(Request $request) {
    $formFields = $request->validate([
      'name' => ['required', 'min:4'],
      'email' => ['required', 'email', Rule::unique('users', 'email')],
      'password' => 'required|min:6|confirmed'
    ]);
    // Hash the password
    $formFields['password'] = bcrypt($formFields['password']);

    // Store user
    $user = User::create($formFields);

    // Log in the user
    auth()->login($user);
    return redirect('/')->with('message', 'User Logged In');
  }

  public function logout(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'You have been logged out');
  }

  public function login() {
    return view('users.login');
  }

  public function authenticate(Request $request) {
    $formFields = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if(auth()->attempt($formFields)) {
      $request->session()->regenerate();
      return redirect('/')->with('message', 'You are now logged in');
    }
    return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
  }
}
