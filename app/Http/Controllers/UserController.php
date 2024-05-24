<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
public function register(Request $request){
  return view ('register');
}

public function registerUser (Request $request){
  User::create([
    'name' => $request->name,
    'gender' => $request->gender,
    'age'=>$request->age,
    'email'=>$request->email,
    'password'=> Hash::make($request->password),
    'address'=>$request->address,
    'birth'=>$request->birth
  ]);
  
  $user = User::where('email',$request->email)->first();
$user->assignRole('user');

  return redirect()->route('login');
}

public function login(Request $request){
  return  view ('login');
}

public function loginUser(Request $request)
{
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Check user role and redirect accordingly
        if ($user->hasRole('superadmin')) {
            return redirect()->route('dashboard'); // Replace 'admin.dashboard' with your admin route
        } else if ($user->hasRole('user')) {
            return redirect()->route('dashboard'); // Replace 'products' with your products route
        } else {
            // Handle unexpected role scenario (optional)
            return back()->withErrors(['error' => 'Unrecognized user role']);
        }
    } else {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

public function dashboard(Request $request){
  $user = Auth::user();
  return view('dashboard',['user' => $user]);
}

public function logout(Request $request){
  Auth::logout();
  return redirect()->route('login');
}

}

