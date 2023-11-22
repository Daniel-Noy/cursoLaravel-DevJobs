<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'rol.recruiter']);
    }
    
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
