<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\In_order;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderCreated;
class OrderController extends Controller
{
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
}
