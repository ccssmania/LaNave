<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 0)->paginate(15);
        return view('home', compact('products'));
    }
    public function about(){
        return view('public.about');
    }

    public function services(){
        return view('public.services');
    }
    public function contact(){
        return view('public.contact');
    }


    public function showProduct($id){
        $product = Product::find($id);
        return view('product.show', compact("product"));
    }
}
