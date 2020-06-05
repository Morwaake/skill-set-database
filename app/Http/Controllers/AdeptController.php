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




    public function addDetailsForm()
    {
        return view('Adept.addDetails');
    }
    public function addDetails(Request $request)
     {
        $adept = new Adept;
        /* Store Property Details*/
        $adept->first_name = $request->firstname;
        $adept->last_name = $request->lastName;
        $adept->phone = $request->phoneNumber;
        $adept->address = $request->address;
        $adept->city = $request->city;
        $adept->date_of_birth = $request->dob;
        $adept->email = $request->email;
        $adept->save();
        
        return view("home");
     }
}
