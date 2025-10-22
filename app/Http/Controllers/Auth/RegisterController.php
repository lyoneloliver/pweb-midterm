<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $departments = \App\Models\Departments::all();
        return view('auth.register', compact('departments'));
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'student',
        ]);

        Students::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
            'student_id_number' => 'S' . now()->timestamp,
            'admission_year' => date('Y'),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful');
    }
}
