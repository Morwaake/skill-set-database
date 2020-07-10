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
                    $programmingV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Programming')->value('points');
                    $databaseV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Database')->value('points');
                    $cybersecurityV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Cybersecurity')->value('points');
                    $aiV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','AI_and_machine_learning')->value('points');
                    $networksV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Networks')->value('points');
                    $dataAnalysisV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Data_Analysis')->value('points');
                    $appDevelopmentV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Application_Development')->value('points');


                    $overalPoints= $programmingV + $networksV + $dataAnalysisV + $cybersecurityV + $appDevelopmentV + $aiV + $dataAnalysisV + $databaseV;
                    
                    ////////////////////////////
                    $adept = Adept::where('user_id', Auth::id())->first();
                    $adept->rank_points=$overalPoints;
                    $adept->save();
                    ///////////////////////////////

                    $usersPosition =DB::table('adepts')->orderByRaw('rank_points DESC')->where('user_id', Auth::id())->get();
                    dd($usersPosition);

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
        $skill = new Skill;
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
        $course->obtained = $request->obtained;
        $course->year = $request->year;
        $course->category = $request->category;
        $course->level = $request->level;
        $course->status = false;
        $course->save();

        $image->link = $proof->getFilename().'.'.$extension;
        $image->course_id = $course->id;
        $image->save();

        $skill ->category=$request->category;
        $skill ->points=0;
        $skill ->user_id = Auth::id();
        $skill->save();

        return $this->index()->with('message','Susscessfully added skill');
    }


    public function viewProfile(){

        $profileBrief= DB::table('adepts')
                        ->where('user_id', Auth::id())
                        ->select('adepts.first_name','adepts.last_name', 'adepts.Phone','adepts.place_worked','adepts.languages','adepts.year_started_working','adepts.year_ended_working', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();

        $allCourses = DB::table('courses')
                        ->where('user_id', Auth::id())
                        ->where('status', 1)
                        ->select('courses.name AS c_name','courses.category','courses.year','courses.obtained')
                        ->get();
                        
                        $data =[
                            'allCourses'=>$allCourses,
                            'profileBrief'=> $profileBrief,
                            
        
                        ];
                        


        return view('Adept.viewProfile') ->withDetails($profileBrief)->with($data);
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
        $adept->place_worked = $request->place_worked;
        $adept->year_started_working = $request->year_started_working;
        $adept->year_ended_working = $request->year_ended_working;
        $adept->languages = $request->languages;
        $adept->Phone = $request->phoneNumber;
        $adept->address = $request->address;
        $adept->city = $request->city;
        $adept->date_of_birth = $request->dob;
        $adept->email = $request->email;
        $adept ->rank_points=0;
        $adept->save();




        return view("welcome");
     }
}
