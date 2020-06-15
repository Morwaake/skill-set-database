<?php

namespace App\Http\Controllers;
use App\Adept;
use Illuminate\Http\Request;

class AdeptController extends Controller
{
    //
    public function index(){
        return view('Adept.index');
    }
    //
    




    public function addDetailsForm()
    {
        return view('Adept.addDetails');
    }
    public function addDetails(Request $request)
     {
        $adept = new Adept;
        /* Store Adept Details*/
        $adept->user_id =Auth::id();
        $adept->first_name = $request->firstname;
        $adept->last_name = $request->lastName;
        $adept->Phone = $request->phoneNumber;
        $adept->address = $request->address;
        $adept->city = $request->city;
        $adept->date_of_birth = $request->dob;
        $adept->email = $request->email;
        $adept->save();
        
        return view("Adept.index")->with('message','details successfully added !!!!');
     }
}
