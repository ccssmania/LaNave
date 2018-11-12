<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderCanceledFromUser;
use App\Notifications\OrderChangedFromUser;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }



    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();
        return view('tasks.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task($request->all());
        if($task->save()){
            \Session::flash("message", "Tarea Guardada");
            return redirect('/tasks');
        }else{
            \Session::flash("errorMessage", "Algo salió mal");
            return redirect('/tasks');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', compact("task"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if(isset($request->title)){
            $task->title = $request->title;
        }

        if(isset($request->description)){
            $task->description = $request->description;
        }
        if(isset($request->date)){
            $task->date = $request->date;
        }
        if(isset($request->end)){
            $task->end = $request->end;
        }

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
        }else{
            \Session::flash("errorMessage", "Algo salió mal");
            return redirect('/tasks');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if(isset($task->order_id)){
            $order = $task->order;
            $in_order = $order->in_order;
            $product = $in_order->product;
            Notification::route('mail', $in_order->email)
                    ->notify(new OrderCanceledFromUser($in_order,$product));
            $order->status = env("ORDER_STATUS_CANCELED_FROM_USER"); //status 1 = cancelada Por el usuario
            if($order->save()){
                $task->status = 1;
                $task->save();
                \Session::flash("message", "Tarea Cancelada Exitosamente");
                return redirect("/tasks");
            }else{
                \Session::flash("errorMessage", "Algo Salió mal");
                return redirect("/tasks");
            }
        }
        $task->status = 1;
        $task->save();
        \Session::flash("message", "Tarea Cancelada Exitosamente");
        return redirect("/tasks");
        
    }
}
