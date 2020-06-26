<?php

namespace App\Http\Controllers;
use App\Adept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
use App\Skill;
use App\Course;
use App\Image;
class AdeptController extends Controller
{
    //
    
    public function index(){
        //brief of Profile Details
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

                    /////////////////////////////



                    $maximumPoints = 0;
                    $maximumColumn = "";

                    //retriving points for individual skill category
                    $programmingV = DB::table('skills')->select('Programming')->where('user_id', Auth::id())->value('Programming');
                    $databaseV = DB::table('skills')->select('Database')->where('user_id', Auth::id())->value('Database');
                    $cybersecurityV = DB::table('skills')->select('Cybersecurity')->where('user_id', Auth::id())->value('Cybersecurity');
                    $aiV = DB::table('skills')->select('AI_and_machine_learning')->where('user_id', Auth::id())->value('AI_And_Machine_Learning');
                    $networksV = DB::table('skills')->select('Networks')->where('user_id', Auth::id())->value('Networks');
                    $dataAnalysisV = DB::table('skills')->select('Data_Analysis')->where('user_id', Auth::id())->value('Data_Analysis');
                    $appDevelopmentV = DB::table('skills')->select('Application_Development')->where('user_id', Auth::id())->value('Application_Development');

                    $overalPoints= $programmingV + $networksV + $dataAnalysisV + $cybersecurityV + $appDevelopmentV + $aiV + $dataAnalysisV + $databaseV;
                    
                    $values = [
                        'Programming'=>$programmingV,
                        'Database'=>$databaseV,
                        'Cybersecurity'=>$cybersecurityV,
                        'AI'=>$aiV,
                        'Networks'=>$networksV,
                        'Data_Analysis'=>$dataAnalysisV,
                        'Application_Development'=>$appDevelopmentV,
                    ];

                    foreach($values as $key => $value){
                        if($value > $maximumPoints){
                            $maximumPoints = $value;
                            $maximumColumn = $key;
                        }

                    }
                    
            
                    $data =[
                        'maximumPoints'=>$maximumPoints,
                        'maximumColumn'=> $maximumColumn,
                        'overalPoints'=> $overalPoints,
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
    }
    public function addSkills(Request $request){
        
        $course = new Course;
        $image = new Image;
       
        $proof = $request->file('proof');
        $extension = $proof->getClientOriginalExtension();
        Storage::disk('public')->put($proof->getFilename().'.'.$extension,  File::get($proof));
    
        /* Store Skill Details*/ 
        $available = Course::where('user_id',Auth::id())->get();
        foreach($available as $avail){
            if( $avail->name === $request->name && $avail->category === $request->category && $avail->level===$request->level){
                return redirect()->back()->with('message','Skill already exist, You cannot duplicate a skill');
            }
        }
        
        $course->user_id = Auth::id();
        $course->name = $request->name;
        $course->category = $request->category;
        $course->level = $request->level;
        $course->status = false;
        $course->save();

        $image->link = $proof->getFilename().'.'.$extension;
        $image->course_id = $course->id;
        $image->save();

        return $this->index()->with('message','Susscessfully added skill');
    }


    public function viewProfile(){
        return view('Adept.viewProfile');
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
