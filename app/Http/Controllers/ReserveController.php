<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
class ReserveController extends Controller
{
	public function index(){
		$products = Product::allActive();
		$product_categories = ProductCategory::allActive();
		return view('reserves.index',compact('products', 'product_categories'));
	}
    public function reserve($id = null){
    	$product_categories = ProductCategory::allActive();
    	return view('reserves.reserve',compact('product_categories'));
    }
}
