<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Validator;
use App\ProductCategory;
use App\ProductCategoryPrice;
class ProductController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$products = Product::allActive();
    	return view('product.index',compact('products'));
    }

    public function create(){
    	$product = new Product;
        $product_categories = ProductCategory::allActive();
    	return view('product.create', compact('product','product_categories'));
    }

    public function store(Request $request){

    	$product = new Product($request->all());
    	$hasFile = $request->hasFile('image') && $request->image->isValid();
        if(isset($request->checkPrice)){
            $product->price = $request->price;
            if(isset($product->prices) and $product->prices()->count() >0){
                foreach ($product->prices as $price) {
                    $price->delete();
                }
            }
        }
        if(isset($request->image)){
            $this->validate($request,[
                'image' => 'mimes:jpg,png,jpeg',
            ]);
            
        }
    	if($product->save()){
    		if($hasFile){
                $image = Image::make($request->image)->encode('webp')->save(storage_path('app/images/product_'.$product->id.'.webp'));
    		}
            if (isset($request->checkPrices)) {
                foreach ($request->prices as $key => $price) {
                    $product_category_price = new ProductCategoryPrice;
                    $product_category_price->product_id = $product->id;
                    $product_category_price->product_category_id = $key;
                    $product_category_price->price = $price;
                    $product_category_price->save();
                }
                if(isset($product->price)){
                    $product->price = null;
                    $product->save();
                }
            }
            Session::flash('message', 'Producto guardado');
            return redirect('/products');
    	}else{
            Session::flash('errorMessage', 'Algo salio mal');
            return redirect('/products');
        }
    }

    public function edit($id){
        $product = Product::find($id);
        $product_categories = ProductCategory::allActive();
        return view('product.edit',compact('product','product_categories'));
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $hasFile = $request->hasFile('image') && $request->image->isValid();
        if(isset($request->checkPrice)){
            $product->price = $request->price;
            if(isset($product->prices) and $product->prices()->count() >0){
                foreach ($product->prices as $price) {
                    $price->delete();
                }
            }
        }
        if(isset($request->image)){
            $this->validate($request,[
                'image' => 'mimes:jpg,png,jpeg',
            ]);
        }
        if($product->update($request->all())){
            if($hasFile){
                $image = Image::make($request->image)->encode('webp')->save(storage_path('app/images/product_'.$product->id.'.webp'));
            }
            if (isset($request->checkPrices)) {
                foreach ($request->prices as $key => $price) {
                    $product_category_price = new ProductCategoryPrice;
                    $product_category_price->product_id = $product->id;
                    $product_category_price->product_category_id = $key;
                    $product_category_price->price = $price;
                    $product_category_price->save();
                }
                if(isset($product->price)){
                    $product->price = null;
                    $product->save();
                }
            }
            Session::flash('message', 'Producto Editado');
            return redirect('/products');
        }else{
            Session::flash('errorMessage', 'Algo salio mal');
            return redirect('/products');
        }
        
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->status = 1;
        if($product->save()){
            Session::flash('message', 'Producto eliminado');
            return redirect('/products');
        }else{
            Session::flash('errorMessage', 'Algo salio mal');
            return redirect('/products');
        }
    }
}
