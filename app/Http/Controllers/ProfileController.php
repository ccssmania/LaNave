<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Contact;
use App\User;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Banner;
use App\BeforeAfter;
class ProfileController extends Controller
{

	/**
	 * Just Users Logged in
	 *
	 * @return void
	 */
	public function __construct(){
		$this->middleware("auth");
	}

	/**
	 *
	 * @return profile view
	 */
    public function index($flag = null){
    	$user = \Auth::user();
    	$employees = Employe::allActive();
    	$banners = Banner::all();
    	$contact = Contact::find(1);
        $beforeAfters = BeforeAfter::all();
    	return view('profile.index',compact('employees','user','contact','flag', 'banners', 'beforeAfters'));
    }

    /**
	 * function to edit the user account
	 */
    public function edit($id){
    	$user = User::find($id);
    	return view('profile.edit',compact('user'));
    }
    /**
	 * function to update the user account
	 */
    public function update(Request $request, $id){
    	$user = User::find($id);
    	$this->validate($request,[
            'image' => 'mimes:jpg,jpeg,png',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $request->email != $user->email ?  'unique' : ''],
        ]);
		if(isset($request->name)){
			$user->name = $request->name;
		}
		if(isset($request->email)){
			$user->email = $request->email;
		}
		$hasFile = $request->hasFile('image') && $request->image->isValid();
		if($user->save()){
			if($hasFile){
				$image = Image::make($request->image)->encode('webp')->save(storage_path('app/images/user_'.$user->id.'.webp'));
                \Session::flash('message', 'Perfil Actualizado!');
                return redirect('/profile/0');
			}
			\Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/0');
		}else
		{
			\Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/0');
		}
    }

    /**
	 * function to create a new employe
	 */

    public function employeCreate(){
    	$employe = new Employe;
    	return view('employe.create',compact('employe'));
    }


    /**
	 * function to store a new employe
	 */

    public function employeStore(Request $request){
    	$this->validate($request,[
            'image' => 'mimes:jpg,jpeg,png',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'number' => ['integer'],
        ]);
    	$employe = new Employe($request->all());
    	$hasFile = $request->hasFile('image') && $request->image->isValid();
		if($employe->save()){
			if($hasFile){
				$image = Image::make($request->image)->encode('webp')->save(storage_path('app/images/employe_'.$employe->id.'.webp'));
                \Session::flash('message', 'Perfil Actualizado!');
                return redirect('/profile/1');
			}
			\Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/1');
		}else
		{
			\Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/1');
		}

    }

    /**
	 * function to edit an employe
	 */

    public function employeEdit($id){
    	$employe = Employe::find($id);
    	return view('employe.edit', compact('employe'));
    }

    /**
	 * function to update an employe
	 */

    public function employeUpdate(Request $request, $id){
    	$this->validate($request,[
            'image' => 'mimes:jpg,jpeg,png',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'number' => ['integer'],
        ]);
        $employe = Employe::find($id);
        $hasFile = $request->hasFile('image') && $request->image->isValid();
        if ($employe->update($request->all())) {
         	if($hasFile){
				$image = Image::make($request->image)->encode('webp')->save(storage_path('app/images/employe_'.$employe->id.'.webp'));
                \Session::flash('message', 'Perfil Actualizado!');
                return redirect('/profile/1');
			}
			\Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/1');
		}else
		{
			\Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/1');
		}
    }

    /**
	 * function to delete an employe
	 */

    public function employeDestroy($id){
    	$employe = Employe::find($id);
    	$employe->status = 1;

    	if($employe->update()){
    		\Session::flash('message', 'Trabajador eliminado');
    		return redirect('/profile/1');
    	}else{
    		\Session::flash('errorMessage', 'Trabajador eliminado');
    		return redirect('/profile/1');
    	}
    }




     /**
	 * function to create a new banner
	 */

    public function bannerCreate(){
    	$banner = new Banner;
    	return view('banner.create',compact('banner'));
    }


    /**
	 * function to store a new banner
	 */

    public function bannerStore(Request $request){
    	$banner = new Banner($request->all());
        $this->validate($request,[
            'image' => 'mimes:jpg,jpeg,png',
        ]);
    	$hasFile = $request->hasFile('image') && $request->image->isValid();
		if($banner->save()){
			if($hasFile){
				$image = Image::make($request->image)->resize(1900,1080)->encode('webp')->save(storage_path('app/images/banner_'.$banner->id.'.webp'));
                \Session::flash('message', 'Perfil Actualizado!');
                return redirect('/profile/1');
			}
			\Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/1');
		}else
		{
			\Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/1');
		}

    }

    /**
	 * function to edit an banner
	 */

    public function bannerEdit($id){
    	$banner = banner::find($id);
    	return view('banner.edit', compact('banner'));
    }

    /**
	 * function to update an banner
	 */

    public function bannerUpdate(Request $request, $id){
        $banner = banner::find($id);
        $this->validate($request,[
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        $hasFile = $request->hasFile('image') && $request->image->isValid();
        if ($banner->update($request->all())) {
         	if($hasFile){
				$image = Image::make($request->image)->resize(1900,1080)->encode('webp')->save(storage_path('app/images/banner_'.$banner->id.'.webp'));
                \Session::flash('message', 'Perfil Actualizado!');
                return redirect('/profile/1');
			}
			\Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/1');
		}else
		{
			\Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/1');
		}
    }

    /**
	 * function to delete an banner
	 */

    public function bannerDestroy($id){
    	$banner = banner::find($id);

    	if($banner->delete()){
    		\Session::flash('message', 'Banner eliminado');
    		return redirect('/profile/1');
    	}else{
    		\Session::flash('errorMessage', 'Banner eliminado');
    		return redirect('/profile/1');
    	}
    }

    /**
     * function to create a new beforeAfter
     */

    public function beforeAfterCreate(){
        $beforeAfter = new BeforeAfter;
        return view('before_after.create',compact('beforeAfter'));
    }


    /**
     * function to store a new beforeAfter
     */

    public function beforeAfterStore(Request $request){
        $beforeAfter = new beforeAfter($request->all());
        $this->validate($request,[
            'image' => 'mimes:jpg,jpeg,png',
            'imageAfter' => 'mimes:jpg,jpeg,png',
        ]);
        $hasFile = $request->hasFile('image') && $request->image->isValid();
        $hasFileAfter = $request->hasFile('imageAfter') && $request->imageAfter->isValid();
        if($beforeAfter->save()){
            if($hasFile){
                $image = Image::make($request->image)->encode('webp')->save(storage_path('app/images/before_'.$beforeAfter->id.'.webp'));
            }
            if($hasFileAfter){
                $imageAfter = Image::make($request->imageAfter)->encode('webp')->save(storage_path('app/images/after_'.$beforeAfter->id.'.webp'));
            }
            \Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/1');
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/1');
        }

    }

    /**
     * function to edit an beforeAfter
     */

    public function beforeAfterEdit($id){
        $beforeAfter = beforeAfter::find($id);
        return view('before_after.edit', compact('beforeAfter'));
    }

    /**
     * function to update an beforeAfter
     */

    public function beforeAfterUpdate(Request $request, $id){
        $beforeAfter = beforeAfter::find($id);
        $this->validate($request,[
            'image' => 'mimes:jpg,jpeg,png',
            'imageAfter' => 'mimes:jpg,jpeg,png',
        ]);
        $hasFile = $request->hasFile('image') && $request->image->isValid();
        $hasFileAfter = $request->hasFile('imageAfter') && $request->imageAfter->isValid();
        if ($beforeAfter->update($request->all())) {
            if($hasFile){
                $image = Image::make($request->image)->encode('webp')->save(storage_path('app/images/before_'.$beforeAfter->id.'.webp'));
            }
            if($hasFileAfter){
                $imageAfter = Image::make($request->imageAfter)->encode('webp')->save(storage_path('app/images/after_'.$beforeAfter->id.'.webp'));
            }
            \Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/1');
        }else
        {
            \Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/1');
        }
    }

    /**
     * function to delete an beforeAfter
     */

    public function beforeAfterDestroy($id){
        $beforeAfter = beforeAfter::find($id);

        if($beforeAfter->delete()){
            \Session::flash('message', 'beforeAfter eliminado');
            return redirect('/profile/1');
        }else{
            \Session::flash('errorMessage', 'beforeAfter eliminado');
            return redirect('/profile/1');
        }
    }

    //-----------------------------------------------------------
    /**
	 * function to create a contact
	 */

    public function contactCreate(){
    	$contact = new Contact;
    	return view('contact.create',compact('contact'));
    }

    /**
	 * function to edit the contact information
	 */ 

    public function contactEdit($id){
    	$contact = Contact::find($id);
    	return view('contact.edit',compact('contact'));
    }

    /**
	 * function to store the contact
	 */

    public function contactStore(Request $request){
    	$contact = new Contact($request->all());
		if($contact->save()){
			\Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/1');
		}else
		{
			\Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/1');
		}

    }

    /**
	 * function to update the contact information
	 */

    public function contactUpdate(Request $request, $id){
    	$contact = Contact::find($id);
		if($contact->update($request->all())){
			\Session::flash('message', 'Perfil Actualizado');
            return redirect('/profile/1');
		}else
		{
			\Session::flash('errorMessage', 'Algo salió mal');
            return redirect('/profile/1');
		}

    }
}
