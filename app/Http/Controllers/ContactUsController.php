<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ContactUs;
use App\Contact;
use Illuminate\Support\Facades\Notification;
use App\User;
class ContactUsController extends Controller
{
    public function message(Request $request){
    	$users = User::all();
    	Notification::send($users, new ContactUs($request));
    	return Response('OK',200);

    }
}
