<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use App\ProductCategoryPrice;
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

    public function getPrice($product_id){
    	$product = Product::find($product_id);
    	if (isset($product->price)) {
    		return Response('OK',200);
    	}else
    		return Response("error",200);
    }

}
