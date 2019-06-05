<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employe;
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
    	return view('dashboard.index',compact('usersCount','employeesCount','notificationsCount'));
    }
}
