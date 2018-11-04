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

    public function changeDate(Request $request){
    	$task = Task::find($request->id);
    	$task->date = $request->date;
    	$task->end = $request->end;
    	if($task->save()){
    		
    		return redirect('/task');
    	}
    }
}
