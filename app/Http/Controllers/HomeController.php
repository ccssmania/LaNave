<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contact;
use App\Employe;
use App\Http\Services\Google;
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


    public function google(){
        $calendar = Google::getClient();
        $calendarId = 'primary';
        $optParams = array(
          'maxResults' => 10,
          'orderBy' => 'startTime',
          'singleEvents' => true,
          'timeMin' => date('c'),
      );
        $results = $calendar->events->listEvents($calendarId, $optParams);
        $events = $results->getItems();

        if (empty($events)) {
            print "No upcoming events found.\n";
        } else {
            print "Upcoming events:\n";
            foreach ($events as $event) {
                $start = $event->start->dateTime;
                if (empty($start)) {
                    $start = $event->start->date;
                }
                printf("%s (%s)\n", $event->getSummary(), $start);
            }
        }
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
        $employees = Employe::all();
        $contact = Contact::find(1);
        return view('public.about',compact('employees', 'contact'));
    }

    public function services(){
        return view('public.services');
    }
    public function contact(){
        $contact = Contact::find(1);
        return view('public.contact', compact("contact"));
    }


    public function showProduct($id){
        $product = Product::find($id);
        return view('product.show', compact("product"));
    }
}
