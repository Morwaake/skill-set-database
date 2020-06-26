<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Skill;
use Auth;
use DB;
use Validator,Redirect,Response;
Use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class SkillController extends Controller
{
    
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
        
        $course->user_id = Auth::id();
        $course->name = $request->name;
        $course->category = $request->category;
        $course->level = $request->level;
        $course->status = false;
        $course->save();

        $image->link = $proof->getFilename().'.'.$extension;
        $image->course_id = $course->id;
        $image->save();
                
        $profileBrief= DB::table('adepts')
                        ->where('user_id', Auth::id())
                        ->select('adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();
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
                    
            
                    if($maximumPoints < $programmingV){
                        $maximumPoints = $programmingV ;
                        $maximumColumn="Programming";
                    }
                  
                    elseif($maximumPoints < $databaseV){
                        $maximumPoints = $databaseV ;
                        $maximumColumn="Database";
                       
                    }
                    elseif($maximumPoints < $cybersecurityV){
                        $maximumPoints = $cybersecurityV ;
                        $maximumColumn="Cybersecurity";
            
                    }
                    elseif($maximumPoints < $aiV){
                        $maximumPoints = $aiV ;
                        $maximumColumn="AI_And_Machine_Learning";
            
                    }
                    elseif($maximumPoints < $webDesignV){
                        $maximumPoints = $webDesignV ;
                        $maximumColumn="Web_Design";
            
                    }
                    elseif($maximumPoints < $networksV){
                        $maximumPoints = $networksV ;
                        $maximumColumn="Networks";
            
                    }
                    elseif($maximumPoints < $dataAnalysisV){
                        $maximumPoints = $dataAnalysisV ;
                        $maximumColumn="Data_Analysis";
            
                    }
                    elseif($maximumPoints < $appDevelopmentV){
                        $maximumPoints = $appDevelopmentV ;
                        $maximumColumn="Application_Development";
            
                    }
                    else{
                        $maximumPoints = 0;
                        $maximumColumn = "No Skill";
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
}

    public function addSkill(){
        return view('Adept.addSkill');
    }





    public function approve($id){
        
        $course = Course::find($id);

        if($course->status === 0){
            $course->status = 1;
            $course->save();
        }
        
        $skill = Skill::where('user_id',$course->user_id)->first();
        
        if($course->category == 'Programming'){
            $skill->Programming +=5;
            $skill->save();
            
        }  
        
        else if($course->category == 'Database'){
            $skill->Database += 3;
            $skill->save();
        } 

        else if($course->category == 'Data_Analysis'){
            $skill->Data_Analysis += 5;
            $skill->save();
        } 

        else if($course->category == 'Network'){
            $skill->Network += 4;
            $skill->save();
        }
        
        else if($course->category == 'Cybersecurity'){
            $skill->Cybersecurity += 5;
            $skill->save();
        }  

        else if($course->category == 'AI_and_machine_learning'){
            $skill->AI_and_machine_learning += 5;
            $skill->save();
        } 

        else if($course->category == 'Application_Development'){
            $skill->Application_development += 4;
            $skill->save();
        } 

        else if($course->category == 'Web_Design'){
            $skill->Web_Design += 3;
            $skill->save();
        } 

        $pendingcourses= DB::table('courses')
                        ->where('status',0)
                        ->select('courses.id', 'courses.name','courses.category', 'courses.level')
                        ->get();

        return view('Admin.pendingCourses') ->withDetails($pendingcourses);
    }
}
