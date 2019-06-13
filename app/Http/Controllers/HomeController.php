<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contact;
use App\Employe;
use App\Banner;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderCanceledFromClient;
use App\BeforeAfter;
use App\ProductCategory;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function google(){
        $calendar = Google::getClient();
        
        dd($calendar->calendarList->get("primary"));

        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 0)->paginate(15);
        $contact = Contact::find(1);
        $banners = Banner::all();
        $employees = Employe::allActive();
        $products = Product::allActive();
        $before_after = BeforeAfter::all();
        $product_categories = ProductCategory::allActive();
        return view('public.home',compact('banners','employees','products','contact','before_after','product_categories'));
    }
    public function about(){
        $employees = Employe::all();
        $contact = Contact::find(1);
        return view('public.about',compact('employees', 'contact'));
    }

    public function services(){
        return view('public.services');
    }
    public function contact(){
        $contact = Contact::find(1);
        return view('public.contact', compact("contact"));
    }


    public function showProduct($id){
        $product = Product::find($id);
        return view('product.show', compact("product"));
    }

    public function cancelOrder($id,$token){
        $order = Order::find($id);

        if($order->order_cancel == $token){
            $order->status = env("ORDER_STATUS_CANCELED_FROM_CLIENT"); //order canceled by client
            if($order->save()){
                $task = $order->task;
                $task->status = 1;
                $task->save();
                Notification::send(User::all(), new OrderCanceledFromClient($order->in_order));
                \Session::flash("message", "Cita Eliminada, lo esperamos pronto en ".env("APP_NAME"));
                return redirect("/");
            }else{
                \Session::flash("errorMessage", "Algo salió mal.");
                return redirect("/");
            }
        }else{
            \Session::flash("errorMessage", "El Token no corresponde!.");
            return redirect("/");
        }
    }
}
