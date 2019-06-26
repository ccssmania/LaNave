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
use App\Http\Models\OrderModel;
use App\Product;
class OrderController extends Controller
{
	public function __construct(){
		$this->middleware("auth", ["except" => ['order']]);
	}


    public function index(Request $request){
        $orders = OrderModel::getOrders($request->status,$request->start,$request->end);
        return view('orders.index', compact("orders", 'request'));
    }
	public function order(Request $request){
		$in = new In_order($request->all());
        $product = Product::find($request->product_id);
        if(isset($product->price)){
            $in->price = $product->price;
        }else{
            $price = $product->prices()->where('product_category_id', $request->product_category_id)->first()->price;
            $in->price = $price;
        }
		if($in->save()){
			$users = User::all();
			Notification::send($users, new OrderCreated($in));
			\Session::flash("message", "Cita pedida satisfactoriamente, por favor esperar el mensaje de aceptación");
			return Response("OK",200);
		}
		else{
			\Session::flash("errorMessage", "Algo salio mal, Intentarlo mas tarde");
			return redirect("/");
		}
	}

	public function store(Request $request){
		$task = new Task($request->all());
		$description = str_replace(array("\r\n", "\n\r", "\r", "\n"),'<br />', $request->description);
		$task->description = $description;
		if($task->save()){
			$order = new Order();
			$order->in_order_id = $request->in_order_id;
        	$order->status = env("ORDER_STATUS_CREATED"); // Status 0 = activo
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
        		$task->status = 1;
                $task->save();
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
        \Session::flash("message", "Orden Rechazada");
        return redirect('/notifications');
    }
}
