<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationController extends Controller
{
    public function index() {
        auth()->user()->unreadNotifications->markAsRead();
        $notifications = auth()->user()->notifications()->get();


        // if(Auth::user()->user_type == 'admin') {
        //     return view('backend.notification.index', compact('notifications'));
        // }

        // if(Auth::user()->user_type == 'seller') {
        //     return view('frontend.user.seller.notification.index', compact('notifications'));
        // }

        // if(Auth::user()->user_type == 'customer') {
            // return view('frontend.user.customer.notification.index', compact('notifications'));
        // }

        return view('frontend.user.customer.notification.index', compact('notifications'));
    }

    public function view($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            flash(translate('Notification marked as read'))->success();
        } else {
            flash(translate('Something went wrong'))->success();
        }
        return redirect()->route('all-notifications');
    }
}
