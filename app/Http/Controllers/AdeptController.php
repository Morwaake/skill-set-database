<?php

namespace App\Http\Controllers;
use App\Adept;
use Illuminate\Http\Request;
use Auth;
use App\Skill;
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
        
        $adept = new Adept();
        $skill = new Skill();
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

        $skill ->Programming=0;
        $skill ->Networks=0;
        $skill ->Web_Design=0;
        $skill ->Database=0;
        $skill ->Data_Analysis=0;
        $skill ->Cybersecurity=0;
        $skill ->AI_and_machine_learning=0;
        $skill ->Application_development=0;
        $skill ->user_id = Auth::id();
        $skill->save();

        return view("Adept.index");
     }
}
