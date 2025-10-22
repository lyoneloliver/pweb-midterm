<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        return view('student.profile', [
            'title' => 'Profil Mahasiswa',
            'student' => $student,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $student = Auth::user()->student;
        $student->update($request->only('phone', 'address'));

        return redirect()->route('student.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
