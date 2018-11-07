<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\In_order;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderCreated;
use App\Notifications\OrderAcepted;
use App\Order;
use App\Task;
class OrderController extends Controller
{
	public function __construct(){
		$this->middleware("auth", ["except" => ['order']]);
	}

	public function order(Request $request, $id){
		$in = new In_order($request->all());
		$in->product_id = $id;
		if($in->save()){
			$users = User::all();
			Notification::send($users, new OrderCreated($in));
			\Session::flash("message", "Cita pedida satisfactoriamente, por favor esperar el mensaje de aceptación");
			return redirect("/product/$id");
		}
		else{
			\Session::flash("errorMessage", "Algo salio mal, Intentarlo mas tarde");
			return redirect("/product/$id");
		}
	}

	public function store(Request $request){
		$task = new Task($request->all());
		$description = str_replace(array("\r\n", "\n\r", "\r", "\n"),'<br />', $request->description);
		$task->description = $description;
		if($task->save()){
			$order = new Order();
			$order->in_order_id = $request->in_order_id;
        	$order->status = 0; // Status 0 = activo
        	$token = bin2hex(random_bytes(50));
        	$order->order_cancel = $token;
        	if($order->save()){
        		$user = \Auth::user();
        		$notification = $user->notifications()->where('id',$request->notification_id)->first()->delete();

        		$task->order_id = $order->id;
        		$task->save();
        		$in_order = $order->in_order;
        		Notification::route('mail', $in_order->email)
                    ->notify(new OrderAcepted($order,$task,$in_order));
        		\Session::flash("message", "Ordern Guardada");
        		return redirect('/notifications');
        	}else{
        		$task->delete();
        		\Session::flash("errorMessage", "Algo salió mal");
        		return redirect('/notifications');
        	}
        }else{
        	\Session::flash("errorMessage", "Algo salió mal");
        	return redirect('/tasks');
        }   
    }

    public function reject(Request $request, $id){
    	$user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first()->delete();
        \Session::flash("message", "Ordern Rechazada");
        return redirect('/notifications');
    }
}
