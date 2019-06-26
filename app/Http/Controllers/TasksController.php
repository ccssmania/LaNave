<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderCanceledFromUser;
use App\Notifications\OrderChangedFromUser;
use App\Product;
use App\ProductCategory;
use App\In_order;
use App\Order;
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
        $products = Product::allActive();
        $categories = ProductCategory::allActive();
        $tasks = Task::all();
        return view('tasks.index', compact('tasks','products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::allActive();
        $categories = ProductCategory::allActive();
        $task = new Task();
        return view('tasks.create', compact('task','products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->product_id) and $request->product_id != ''){
            $in = new In_order($request->all());
            $product = Product::find($request->product_id);
            if(isset($product->price)){
                $in->price = $product->price;
            }else{
                $price = $product->prices()->where('product_category_id', $request->product_category_id)->first()->price;
                $in->price = $price;
            }
            $in->name = \Auth::user()->name;
            $in->email = \Auth::user()->email;
            $in->number = 0;
            $in->car_model = (ProductCategory::find($request->product_category_id) != null) ? ProductCategory::find($request->product_category_id)->name : $product->name;
            if($in->save()){
                $task = new Task($request->all());
                $description = str_replace(array("\r\n", "\n\r", "\r", "\n"),'<br />', $request->description);
                $task->description = $description;
                if($task->save()){
                    $order = new Order();
                    $order->in_order_id = $in->id;
                    $order->status = env("ORDER_STATUS_CREATED"); // Status 0 = activo
                    $token = bin2hex(random_bytes(50));
                    $order->order_cancel = $token;
                    if($order->save()){
                        
                        $task->order_id = $order->id;
                        $task->save();
                        $in_order = $order->in_order;
                        \Session::flash("message", "Ordern Guardada");
                        return redirect('/tasks');
                    }else{
                        $task->status = 1;
                        $task->save();
                        \Session::flash("errorMessage", "Algo salió mal");
                        return redirect('/tasks');
                    }
                }else{
                    \Session::flash("errorMessage", "Algo salió mal");
                    return redirect('/tasks');
                }
            }
            else{
                \Session::flash("errorMessage", "Algo salio mal, Intentarlo mas tarde");
                return redirect("/");
            }
        }else{
            $task = new Task($request->all());
            $description = str_replace(array("\r\n", "\n\r", "\r", "\n"),'<br />', $request->description);
            $task->description = $description;
            if($task->save()){
                \Session::flash("message", "Tarea Guardada");
                return redirect('/tasks');
            }else{
                \Session::flash("errorMessage", "Algo salió mal");
                return redirect('/tasks');
            }   
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
        $products = Product::allActive();
        $categories = ProductCategory::allActive();
        $task = Task::find($id);

        return view('tasks.edit', compact("task", 'products', 'categories'));
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

        if(isset($request->product_id) and $request->product_id != ''){
            if(isset($task->order) and $task->order->in_order->product_id != $request->product_id){
                $in = $task->order->in_order;
                $product = Product::find($request->product_id);
                if(isset($product->price)){
                    $in->price = $product->price;
                    $in->product_category_id = null;
                }else{
                    $price = $product->prices()->where('product_category_id', $request->product_category_id)->first()->price;
                    $in->price = $price;
                }
                
                $in->car_model = (ProductCategory::find($request->product_category_id) != null) ? ProductCategory::find($request->product_category_id)->name : $product->name;
                $in->save();
                if($in->update($request->all())){
                    $order = $task->order;

                    $dateNow = new DateTime();
                    $dateCompare = new DateTime($task->date);
                    if($dateCompare > $dateNow){
                        $order->status = env('ORDER_STATUS_CREATED');
                    }
                    $order->save();
                }
            }else{
                $in = new In_order($request->all());
                $product = Product::find($request->product_id);
                if(isset($product->price)){
                    $in->price = $product->price;
                }else{
                    $price = $product->prices()->where('product_category_id', $request->product_category_id)->first()->price;
                    $in->price = $price;
                }
                $in->name = \Auth::user()->name;
                $in->email = \Auth::user()->email;
                $in->number = 0;
                $in->car_model = (ProductCategory::find($request->product_category_id) != null) ? ProductCategory::find($request->product_category_id)->name : $product->name;
                if($in->save()){
                    
                    $order = new Order();
                    $order->in_order_id = $in->id;
                    $order->status = env("ORDER_STATUS_CREATED"); // Status 0 = activo
                    $token = bin2hex(random_bytes(50));
                    $order->order_cancel = $token;
                    if($order->save()){
                        
                        $task->order_id = $order->id;
                        $in_order = $order->in_order;
                    }else{
                        $task->status = 1;
                    }
                }
                    
            }
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
            Notification::route('mail', $in_order->email)->notify(new OrderCanceledFromUser($in_order,$product));
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
