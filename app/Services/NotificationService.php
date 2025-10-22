<?php

namespace App\Services;

use App\Models\Notifications;
use Illuminate\Support\Facades\Log;

class NotificationService
{

    public function send(int $userId, string $title, string $message, string $type = 'info', ?string $link = null)
    {
        try {
            return Notifications::create([
                'user_id' => $userId,
                'title' => $title,
                'message' => $message,
                'type' => $type,
                'link' => $link,
                'is_read' => false,
            ]);
        } catch (\Exception $e) {
            Log::error("Gagal mengirim notifikasi: " . $e->getMessage());
        }
    }


    public function markAsRead(int $notificationId)
    {
        $notification = Notifications::find($notificationId);
        if ($notification) {
            $notification->update(['is_read' => true]);
        }
    }

    public function getUserNotifications(int $userId)
    {
        return Notifications::where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();
    }
}
