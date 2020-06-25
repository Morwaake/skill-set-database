<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Stakeholder;
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
        
        $stakeholder = new \App\Stakeholder();
        
        /* Store Adept Details*/
        $stakeholder->user_id =Auth::id();
        $stakeholder->s_name = $request->s_name;
        $stakeholder->email = $request->email;
        $stakeholder->address = $request->address;
        $stakeholder->location = $request->location;
        $stakeholder->city = $request->city;
        $stakeholder->number = $request->number;
        $stakeholder->status = false;
        $stakeholder->save();
        
        return view('Stakeholder.index')->with('message','details successfully added !!!!');
     }


    public function redirectTo(){
        switch (Auth::user()->role) {
            case 1:
                $this->redirectTo = '/adept';
                $profileBrief= DB::table('adepts')
                        ->where('user_id', Auth::id())
                        ->select('adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();

                        $numberOfProgramming = DB::table('courses')
                            ->where('status', 1)
                            ->where('Category','Programming')
                            ->count();

                        $numberOfDatabse = DB::table('courses')
                        ->where('status', 1)
                        ->where('Category','Database')
                        ->count();
                        $numberOfNetworks = DB::table('courses')
                        ->where('status', 1)
                        ->where('Category','Networks')
                        ->count();
                        $numberOfWeb = DB::table('courses')
                        ->where('status', 1)
                        ->where('Category','Web_Design')
                        ->count();
                        $numberOfAI = DB::table('courses')
                        ->where('status', 1)
                        ->where('Category','AI_and_machine_learning')
                        ->count();
                        $numberOfDataAnalysis = DB::table('courses')
                        ->where('status', 1)
                        ->where('Category','Data_Analysis')
                        ->count();
                        $numberOfCyber = DB::table('courses')
                        ->where('status', 1)
                        ->where('Category','Cybersecurity')
                        ->count();
                        $numberOfApp = DB::table('courses')
                        ->where('status', 1)
                        ->where('Category','Application_Development')
                        ->count();


                        $data =[

                            'profileBrief'=>$profileBrief,
                            'numberOfProgramming'=>$numberOfProgramming,
                            'numberOfDatabse'=>$numberOfDatabse,
                            'numberOfNetworks'=>$numberOfNetworks,
                            'numberOfWeb'=>$numberOfWeb,
                            'numberOfAI'=>$numberOfAI,
                            'numberOfDataAnalysis'=>$numberOfDataAnalysis,
                            'numberOfCyber'=>$numberOfCyber,
                            'numberOfApp'=>$numberOfApp,
                            

                        ];


                return view('Adept.index')->withDetails($profileBrief)->with($data);
                break;

            case 2:
                $this->redirectTo = '/stakeholder';
                return view('Stakeholder.index');
                break;

            case 3:
                $this->redirectTo = '/admin';
                $owners= DB::table('users')
                        ->join('adepts','users.id','=','adepts.user_id')
                        ->where('users.role',1)
                        ->select('users.id', 'adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();

                        
                        
                return view('Admin.index')->withDetails($owners);
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
            $searchResults = DB::table('courses')
                        ->join('adepts','courses.user_id','=','adepts.user_id')
                        ->where('name','LIKE','%'.$name.'%')
                        ->select('courses.id', 'courses.name', 'courses.category','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();
                    
    
                    if(count($searchResults) > 0)
                    
                    return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                    else
                        return view('Stakeholder.searchResults')->with('message','No Properties found matching criteria. Try to search again !');
            }
            if($name === null && $category === null){
                $searchResults = DB::table('courses')
                            ->join('adepts','courses.user_id','=','adepts.user_id')
                            ->where('level','LIKE','%'.$level.'%')
                            ->select('courses.id', 'courses.name', 'courses.category','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                            ->get();
        
                        if(count($searchResults) > 0)
                        return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                        else
                            return view('Stakeholder.searchResults')->with('message','No Properties found matching criteria. Try to search again !');
                }
                if($level === null && $name === null){
                    $searchResults = DB::table('courses')
                                ->join('adepts','courses.user_id','=','adepts.user_id')
                                ->where('category','LIKE','%'.$category.'%')
                                ->select('courses.id', 'courses.name', 'courses.category','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                                ->get();
            
                            if(count($searchResults) > 0)
                            return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                            else
                                return view('Stakeholder.searchResults')->with('message','No Properties found matching criteria. Try to search again !');
                    }
            else{
                $searchResults = DB::table('ourses')
                        ->join('adepts','courses.user_id','=','adepts.user_id')
                        ->where('level','LIKE','%'.$level.'%')
                        ->where('category','LIKE','%'.$category.'%')
                        ->where('name','LIKE','%'.$name.'%')
                        ->select('courses.id', 'courses.name', 'courses.category','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();
    
                    if(count($searchResults) > 0)
                    return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                    else
                    return view('Stakeholder.searchResults')->with('message','No Properties found matching criteria. Try to search again !');
            }
                        
        }
    }


}
