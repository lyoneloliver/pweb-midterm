<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLogs;

class LogActivity
{
    /**
     * Handle an incoming request and log user activity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        try {
            if (Auth::check()) {
                $user = Auth::user();
                $action = $this->detectAction($request);
                $modelInfo = $this->extractModelInfo($request);

                ActivityLogs::create([
                    'user_id' => $user->id,
                    'action' => $action,
                    'model' => $modelInfo['model'] ?? null,
                    'model_id' => $modelInfo['model_id'] ?? null,
                    'description' => sprintf("[%s] %s accessed %s", strtoupper($action), $user->role, $request->path()),
                    'old_values' => $modelInfo['old'] ?? null,
                    'new_values' => $modelInfo['new'] ?? null,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }
        } catch (\Exception $e) {
            // Jangan hentikan proses meskipun logging gagal
        }

        return $response;
    }

    /**
     * Deteksi jenis aksi berdasarkan HTTP method.
     */
    private function detectAction(Request $request)
    {
        return match ($request->method()) {
            'POST' => 'create',
            'PUT', 'PATCH' => 'update',
            'DELETE' => 'delete',
            default => 'view',
        };
    }

    /**
     * Coba ambil model dan id dari URL jika sesuai pola /{model}/{id}
     */
    private function extractModelInfo(Request $request)
    {
        $segments = $request->segments();
        $model = $segments[0] ?? null;
        $model_id = is_numeric($segments[1] ?? null) ? $segments[1] : null;

        return [
            'model' => $model ? ucfirst($model) : null,
            'model_id' => $model_id,
        ];
    }
}
