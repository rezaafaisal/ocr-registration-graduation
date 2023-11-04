<?php

namespace App\Http\Controllers;

use App\Models\Student;

class NotificationController extends Controller
{
    public function read(string $guard, string $id)
    {
        $user = $this->get_user($guard);
        $notification = $user->notifications->sole('id', '==', $id);
        $notification->markAsRead();
        if (isset($notification->data['route'])) {
            return to_route($notification->data['route']);
        }

        return back();
    }

    public function delete(string $guard, string $id)
    {
        $user = $this->get_user($guard);
        $notification = $user->notifications->sole('id', '==', $id);
        $notification->delete();

        return back();
    }

    public function mark_all(string $guard)
    {
        $this->get_user($guard)->notifications->markAsRead();

        return back();
    }

    public function delete_all(string $guard)
    {
        $this->get_user($guard)->notifications()->delete();

        return back();
    }

    /** @return Student */
    protected function get_user(string $guard)
    {
        return auth($guard)->user();
    }
}
