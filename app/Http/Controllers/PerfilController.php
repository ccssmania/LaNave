<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\Employe;
use Auth;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
class PerfilController extends Controller
{



	public function __construct()
    {
        $this->middleware('auth');
    }


    
	public function index(){
		$user = Auth::user(); 
		$contact = Contact::all()->first();
		$employees = Employe::all();
		return view('perfil.index', compact("contact", "employees", "user"));
	}

	//Edit user function
	public function edit($id){
		$user = User::find($id);
		return view('perfil.edit', compact("user"));
	}
	//Update user
	public function update(Request $request, $id){
		$user = User::find($id);

		if(isset($request->name)){
			$user->name = $request->name;
		}
		if(isset($request->email)){
			$user->email = $request->email;
		}
		$hasFile = $request->hasFile('file') && $request->file->isValid();
		if($user->save()){
			if($hasFile){
				$image = Image::make($request->file)->encode('jpg')->save(storage_path('app/images/u_'.$user->id.'.jpg'));
                Session::flash('message', 'Actualizado');
                return redirect('/perfil');
			}
			Session::flash('message', 'Actualizado');
            return redirect('/perfil');
		}else
		{
			Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/perfil');
		}
	}


	//Create employe
	public function createEmploye(){
		$employe = new Employe();
		return view('employees.create', compact("employe"));
	}
	//edit employ
	public function editEmploye($id){
		$employe = Employe::find($id);
		return view('employees.edit', compact("employe"));
	}

	//store employe
	public function storeEmploye(Request $request){
		$employe = new Employe($request->all());
    	$hasFile = $request->hasFile('file') && $request->file->isValid();
        if(isset($request->file)){
            $this->validate($request,[
                'file' => 'mimes:jpg,png,jpeg',
            ]);
            
        }
    	if($employe->save()){
    		if($hasFile){
                $image = Image::make($request->file)->resize(700,400)->encode('jpg')->save(storage_path('app/images/e_'.$employe->id.'.jpg'));
                Session::flash('message', 'Trabajador guardado');
                return redirect('/perfil');
    		}
            Session::flash('message', 'Trabajador guardado');
            return redirect('/perfil');
    	}else{
            Session::flash('errorMessage', 'Algo salio mal');
            return redirect('/perfil');
        }
	}

	//update employe
	public function updateEmploye(Request $request, $id){
		$employe = Employe::find($id);

		if(isset($request->name)){
			$employe->name = $request->name;
		}
		if(isset($request->email)){
			$employe->email = $request->email;
		}
		if(isset($request->number)){
			$employe->number = $request->number;
		}
		if(isset($request->position)){
			$employe->position = $request->position;
		}
		$hasFile = $request->hasFile('file') && $request->file->isValid();
		if($employe->save()){
			if($hasFile){
				$image = Image::make($request->file)->encode('jpg')->save(storage_path('app/images/e_'.$employe->id.'.jpg'));
                Session::flash('message', 'Actualizado');
                return redirect('/perfil');
			}
			Session::flash('message', 'Actualizado');
            return redirect('/perfil');
		}else
		{
			Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/perfil');
		}
	}

	//delete Employe

	public function deleteEmploye($id){
		$employe = Employe::find($id);
		if($employe->delete()){
			return redirect('/perfil');
		}else
			return false;
	}

	//contact edit
	public function editContact($id){
		$contact = Contact::find($id);
		return view('contact.edit',compact('contact'));
	}
	//contact update
	public function updateContact(Request $request, $id){
		$contact = Contact::find($id);
		isset($request->about) ? $contact->about = $request->about : false;
		isset($request->email) ? $contact->email = $request->email : false;
		isset($request->address) ? $contact->address = $request->address : false;
		isset($request->number) ? $contact->number = $request->number : false;
		isset($request->details) ? $contact->details = $request->details : false;
		if($contact->save()){
			Session::flash("message", "Actualizado");
			return redirect("/perfil");
		}
	}
	//Save Images
	public function images(Request $request){
		if(isset($request->banner_1)){
			$this->validate($request,[
				'banner_1' => 'mimes:jpg,png,jpeg',
			]);
			$image = Image::make($request->banner_1)->resize(1900,1080)->encode('jpg',100)->save(storage_path('app/images/banner_1.jpg'), 100);
		}
		if(isset($request->banner_2)){
			$this->validate($request,[
				'banner_2' => 'mimes:jpg,png,jpeg',
			]);
			$image = Image::make($request->banner_2)->resize(1900,1080)->encode('jpg',100)->save(storage_path('app/images/banner_2.jpg'), 100);
		}
		if(isset($request->banner_3)){
			$this->validate($request,[
				'banner_3' => 'mimes:jpg,png,jpeg',
			]);
			$image = Image::make($request->banner_3)->resize(1900,1080)->encode('jpg',100)->save(storage_path('app/images/banner_3.jpg'), 100);
		}
		if(isset($request->home_)){
			$this->validate($request,[
				'home_' => 'mimes:jpg,png,jpeg',
			]);
			$image = Image::make($request->home_)->resize(1900,1080)->encode('jpg',100)->save(storage_path('app/images/h_.jpg'), 100);
		}

		Session::flash("message", "Guardado");
		return redirect("/perfil");
	}

}
