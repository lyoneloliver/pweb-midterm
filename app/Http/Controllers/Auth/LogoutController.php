<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle user logout process.
     */
    public function logout(Request $request)
    {
        // Simpan log aktivitas logout (opsional, kalau LogActivity middleware kamu aktif)
        activity()
            ->causedBy(Auth::user())
            ->withProperties(['ip' => $request->ip()])
            ->log('User logout');

        // Logout user
        Auth::logout();

        // Hapus session dan regenerasi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
