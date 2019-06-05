<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$product_categories = ProductCategory::allActive();
    	return view('product_category.index',compact('product_categories'));
    }

    public function create(){
    	$product_category = new ProductCategory;
    	return view('product_category.create', compact('product_category'));
    }

    public function store(Request $request){

    	$product_category = new ProductCategory($request->all());
    	
    	if($product_category->save()){
    		
            \Session::flash('message', 'Categoría guardado');
            return redirect('/product_category');
    	}else{
            \Session::flash('errorMessage', 'Algo salio mal');
            return redirect('/product_category');
        }
    }

    public function edit($id){
        $product_category = ProductCategory::find($id);
        return view('product_category.edit',compact('product_category'));
    }
    public function update(Request $request, $id){
        $product_category = ProductCategory::find($id);
        if($product_category->update($request->all())){
            \Session::flash('message', 'Categoría Editada');
            return redirect('/product_category');
        }else{
            \Session::flash('errorMessage', 'Algo salio mal');
            return redirect('/product_category');
        }
        
    }

    public function destroy($id){
        $product_category = ProductCategory::find($id);
        $product_category->status = 1;
        if($product_category->save()){
            \Session::flash('message', 'Producto eliminado');
            return redirect('/product_category');
        }else{
            \Session::flash('errorMessage', 'Algo salio mal');
            return redirect('/product_category');
        }
    }
}
