<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class NotificationController extends Controller
{
    public function index(){
    	$user = \Auth::user();
    	$notifications = $user->notifications;
    	return view('notifications.index', compact('notifications'));
    }

    public function mark($id){
    	$user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        $notification->markAsRead();
        return back();
    }
}
