<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employe;
use App\Order;
use App\Task;
class AdminController extends Controller
{
    /**
	 * Just Users Logged in
	 *
	 * @return void
	 */
	public function __construct(){
		$this->middleware("auth");
	}

	/**
	 * Show the dashboard view
	 *
	 * @return dashboard view
	 */
    public function dashboard(){
    	$usersCount = User::all()->count();
    	$employeesCount = Employe::allActive()->count();
    	$notificationsCount = \Auth::user()->notifications()->count();
    	$from = date('Y-m-01', strtotime(date('Y-m-d')));
    	$to = date('Y-m-d');
    	$tasks = Task::where("status",0)->whereBetween('date', [$from, $to])->get()->count();
    	$ordersCanceled = Order::where('status', env('ORDER_STATUS_CANCELED_FROM_USER'))->get()->count() + Order::where('status',env('ORDER_STATUS_CANCELED_FROM_CLIENT'))->get()->count();
    	$orders = Order::where('status', env('ORDER_STATUS_CREATED'))->get()->count() + Order::where('status',env('ORDER_STATUS_PASSED'))->get()->count();
    	return view('dashboard.index',compact('usersCount','employeesCount','notificationsCount', 'tasks' , 'orders', 'ordersCanceled'));
    }
}
