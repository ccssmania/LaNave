<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\Employe;
use Auth;
class PerfilController extends Controller
{
    public function index(){
    	$user = Auth::user(); 
    	$contact = Contact::all()->first();
    	$empoyees = Employe::all();
    	return view('perfil.index', compact("contact", "empoyees", "user"));
    }
}
