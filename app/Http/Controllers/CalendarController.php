<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class CalendarController extends Controller
{
    public function events(){
    	$tasks = Task::all();

    	return json_encode($tasks);
    }
}
