<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class HomeController extends Controller
{
    public function index() 
    {
        $contacts = Contact::all();

        //dd($contacts);

        return view('home', ['contacts' => $contacts]);
    }

    public function contact()
    {
        return view('.form');
    }
    

    public function single($id)
    {
        //dd($id);
        $contact = Contact::find($id);
        return view('pages.single', ['contact' => $contact]);
    }

    public function ender($id)
    {
        $contact = Contact::find($id);
        Contact::destroy($id);
        $contacts = Contact::all();

        //dd($contacts);

        //return view('home', ['contacts' => $contacts, 'msg'=>'Contact Deleted']);
        
        return back()->with('msg', 'Contact Deleted');
    }

         public function store(Request $request)
            {
                $validData = $request->validate([
                    'name' => 'required|min:3',
                    'phone' => 'required|max:11|min:11',
                ]);
                /*dd($validData);
                $cont = App\cont::create(['name'=>'Full Name', 'phone'=>'Phone Number']);*/

                $contact = new Contact;
                $contact->name = $request->name;
                $contact->phone = $request->phone;
                $contact->save();

                $contacts = Contact::all();

                return view('home', ['contacts'=>$contacts]);


            }

            public function update(Request $request, $id)
            {
                $validData = $request->validate([
                    'name' => 'required|min:3',
                    'phone' => 'required|max:11|min:11',
                ]);

                $contact = Contact::find($id);
                $contact->name = $request->name;
                $contact->phone = $request->phone;
                $contact->save();

                $contacts = Contact::all();

                return redirect()->route('home')->with('msg','Contact updated');
            }
}