<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Validator;
class ProductController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$products = Product::where('status',0)->paginate(15);
    	return view('product.index',compact('products'));
    }

    public function create(){
    	$product = new Product;
    	return view('product.create', compact('product'));
    }

    public function store(Request $request){

    	$product = new Product($request->all());
    	$hasFile = $request->hasFile('file') && $request->file->isValid();
        if(isset($request->file)){
            $this->validate($request,[
                'file' => 'mimes:jpg,png,jpeg',
            ]);
            
        }
    	if($product->save()){
    		if($hasFile){
                $image = Image::make($request->file)->resize(700,400)->encode('jpg')->save(storage_path('app/images/p_'.$product->id.'.jpg'));
                Session::flash('message', 'Producto guardado');
                return redirect('/products');
    		}
            Session::flash('message', 'Producto guardado');
            return redirect('/products');
    	}else{
            Session::flash('errorMessage', 'Halgo salio mal');
            return redirect('/products');
        }
    }

    public function edit($id){
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $hasFile = $request->hasFile('file') && $request->file->isValid();
        if(isset($request->file)){
            $this->validate($request,[
                'file' => 'mimes:jpg,png,jpeg',
            ]);
        }
        isset($request->name) ? $product->name = $request->name : '';
        isset($request->price) ? $product->price = $request->price : '';
        isset($request->description) ? $product->description = $request->description : '';

        if($product->save()){
            if($hasFile){
                $image = Image::make($request->file)->resize(700,400)->encode('jpg')->save(storage_path('app/images/p_'.$product->id.'.jpg'));
                Session::flash('message', 'Producto Editado');
                return redirect('/products');
            }
            Session::flash('message', 'Producto Editado');
            return redirect('/products');
        }else{
            Session::flash('errorMessage', 'Halgo salio mal');
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
            Session::flash('errorMessage', 'Halgo salio mal');
            return redirect('/products');
        }
    }
}
