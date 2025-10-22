<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string ...$roles  // Menerima multiple roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Jika user belum login, redirect ke halaman login
        if (! Auth::check()) {
            return redirect('/login');
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Periksa apakah peran user ada di daftar peran yang diizinkan
        // Jika peran user ada di array $roles, izinkan akses
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika peran user tidak diizinkan, redirect kembali dengan pesan error
        // Atau Anda bisa mengarahkan ke halaman 403 (Forbidden)
        // abort(403, 'Unauthorized action.');
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }
}