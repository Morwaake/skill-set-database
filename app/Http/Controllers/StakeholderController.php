<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use DB;
use Auth;

class StakeholderController extends Controller
{
    //
    public function index(){
        return view('Stakeholder.index');
    }

    public function viewDetails(){
        return view('Stakeholder.addDetails');
    }

    public function viewResults(){
        return view('Stakeholder.searchResults');
    }

    public function addDetails(Request $request)
     {
        $stakeholder = new Stakeholder;
        /* Store Adept Details*/
        $stakeholder->user_id =Auth::id();
        $stakeholder->s_name = $request->s_name;
        $stakeholder->email = $request->email;
        $stakeholder->code = $request->country_code;
        $stakeholder->address = $request->address;
        $stakeholder->city = $request->city;
        $stakeholder->number = $request->number;
        $stakeholder->save();
        
        return view("Stakeholder.index")->with('message','details successfully added !!!!');
     }


    public function redirectTo(){
        switch (Auth::user()->role) {
            case 1:
                $this->redirectTo = '/adept';
                return view('Adept.index');;
                break;

            case 2:
                $this->redirectTo = '/stakeholder';
                return view('Stakeholder.index');
                break;
            
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }






     public function searchBySkill(Request $request){
        $name = $request->name;
        $category = $request->category;
        $level = $request->level;
        if($name === null && $category === null && $level === null){
            return redirect()->back()->with('message','you need to have at least one field entered !!!!');
        }
        else{
            if($level === null && $category === null){
            $searchResults = DB::table('skills')
                        ->join('adepts','skills.user_id','=','adepts.user_id')
                        ->where('name','LIKE','%'.$name.'%')
                        ->select('skills.id', 'skills.name', 'skills.category','skills.work_experience_on_skill','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();
                    
    
                    if(count($searchResults) > 0)
                    
                    return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                    else
                        return view('Stakeholder.searchResults')->with('message','No Properties found matching criteria. Try to search again !');
            }
            if($name === null && $category === null){
                $searchResults = DB::table('skills')
                            ->join('adepts','skills.user_id','=','adepts.user_id')
                            ->where('level','LIKE','%'.$level.'%')
                            ->select('skills.id', 'skills.name', 'skills.category','skills.work_experience_on_skill','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                            ->get();
        
                        if(count($searchResults) > 0)
                        return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                        else
                            return view('Stakeholder.searchResults')->with('message','No Properties found matching criteria. Try to search again !');
                }
                if($level === null && $name === null){
                    $searchResults = DB::table('skills')
                                ->join('adepts','skills.user_id','=','adepts.user_id')
                                ->where('category','LIKE','%'.$category.'%')
                                ->select('skills.id', 'skills.name', 'skills.category','skills.work_experience_on_skill','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                                ->get();
            
                            if(count($searchResults) > 0)
                            return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                            else
                                return view('Stakeholder.searchResults')->with('message','No Properties found matching criteria. Try to search again !');
                    }
            else{
                $searchResults = DB::table('deeds')
                        ->join('adepts','skills.user_id','=','adepts.user_id')
                        ->where('level','LIKE','%'.$level.'%')
                        ->where('category','LIKE','%'.$category.'%')
                        ->where('name','LIKE','%'.$name.'%')
                        ->select('skills.id', 'skills.name', 'skills.category','skills.work_experience_on_skill','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();
    
                    if(count($searchResults) > 0)
                    return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                    else
                    return view('Stakeholder.searchResults')->with('message','No Properties found matching criteria. Try to search again !');
            }
                        
        }
    }


}
