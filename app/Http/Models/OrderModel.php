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
            $order->whereHas('in_order_id',function($query) use ($start,$end){
                $query->whereBetween('create_at', [$start, $end]);
            });
        }elseif(isset($start)){
            $order->whereHas('in_order_id',function($query) use ($start,$end){
                $query->whereBetween('create_at', [$start, $today]);
            });
        }

        return $order->paginate(15);
    }
}
