<?php

namespace App\Http\Models;
use App\User;
use App\Order;
use App\In_order;
use Carbon\Carbon;
use Illuminate\Support\Collection;
class OrderModel {
    
    
    public static function getOrders($status = null, $start = null, $end = null){
        $order = Order::query();
        $today = Carbon::now();
        if(isset($status)){
            $order->where("status", $status);
        }
        if (isset($end)) {
            $order->whereHas('task',function($query) use ($start,$end){
                $query->whereBetween('date', [$start, $end]);
            })->get();
        }elseif(isset($start)){
            $order->whereHas('task',function($query) use ($start,$end){
                $query->whereBetween('date', [$start, $today]);
            });
        }

        return $order->paginate(15);
    }
}
