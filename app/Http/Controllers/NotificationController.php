<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $notifications = auth()->user()->unreadNotifications;
        $notifications->markAsRead();
        
        return view('notifications.index', [
            'notifications' => $notifications
        ]);
    }
}
