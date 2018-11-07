<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tasks;
class NotificationController extends Controller
{

	public function __construct(){
		$this->middleware("auth");
	}
	
    public function index(){
    	$user = \Auth::user();
    	$notifications = $user->unreadNotifications;
    	return view('notifications.index', compact('notifications'));
    }

    public function mark($id){
    	$user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        $notification->markAsRead();
        return back();
    }

    public function order($id){
    	$user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        $in_order = (object)$notification->data['in_order'];
        $product = Product::find($in_order->product_id);
        return view('notifications.order', compact('notification','in_order','product'));
    }
}
