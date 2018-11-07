<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderChangedFromUser;
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
    		if(isset($task->order_id)){
                $in_order = $task->order->in_order;
                Notification::route('mail', $in_order->email)
                    ->notify(new OrderChangedFromUser($task->order,$task,$in_order));
                \Session::flash("message", "Tarea Cambiada");
                return redirect('/tasks'); 
            }
            \Session::flash("message", "Tarea Cambiada");
    		return redirect('/tasks');
    	}
    }
}
