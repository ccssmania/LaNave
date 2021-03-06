<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tasks;

use Illuminate\Support\Facades\Notification;
use App\Notifications\SendMessage;
use App\In_order;

class NotificationController extends Controller
{

	public function __construct(){
		$this->middleware("auth");
	}
	
    public function index(){
    	$user = \Auth::user();
    	$notifications = $user->unreadNotifications->sortBy('created_at');
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
        $in_order = In_order::find($notification->data['in_order']['id']);
        $product = Product::find($in_order->product_id);
        return view('notifications.order', compact('notification','in_order','product'));
    }

    public function contact($id){
        $user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        $data = (object)$notification->data["data"];
        return view('notifications.response',compact("notification","data"));
    }

    public function message(Request $request, $id){
        $user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        Notification::route('mail', $request->email)
                    ->notify(new SendMessage($request));

        $notification->delete();
        \Session::flash("message", "Mensaje Enviado");
        return redirect("/notifications");
    }

    public function delete($id){
        $user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first()->delete();
        \Session::flash("message", "Notificación eliminada");
        return redirect("/notifications");
    }

    public function show($id){
        $user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        return view('notifications.show',compact('notification'));
    }
}
