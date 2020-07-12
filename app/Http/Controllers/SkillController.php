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
        
        //$proof = $request->file('proof');
        //$extension = $proof->getClientOriginalExtension();
        //Storage::disk('public')->put($proof->getFilename().'.'.$extension,  File::get($proof));
    
        /* Store Skill Details*/ 
        $available = Course::where('user_id',Auth::id())->get();
        foreach($available as $avail){
            if( $avail->name === $request->name && $avail->category === $request->category && $avail->level===$request->level){
                return redirect()->back()->with('message','Skill already exist, You cannot duplicate a skill');
        }

        $validator = Validator::make($request->all(),[
            'name.*' => 'required|string|max:50',
            'obtatined.*'=>'required|string',
            'year.*'=>'required',
            'category.*'=>'required|string|max:50',
            'level.*'=>'required|string|max:50'
        ]);
        if ($validator->fails()){
            return redirect('/addSkills')->withErrors($validator)->withInput();
        }
        else {
            for ($count = 0; $count < count($request->name); $count++) {

                $course->user_id = Auth::id();
                $course->name = $request->name[$count];
                $course->obtained = $request->obtained[$count];
                $course->year = $request->year[$count];
                $course->category = $request->category[$count];
                $course->level = $request->level[$count];
                $course->status = false;
                
                
                $proof = $request->file('proof')[$count];
                $extension = $proof->getClientOriginalExtension();
                Storage::disk('public')->put($proof->getFilename().'.'.$extension,  File::get($proof));
            
                $course->link = $proof->getFilename().'.'.$extension;
                $course->course_id = $course->id;
                $course->save();
        
                $skill ->category=$request->category[$count];
                $skill ->points=0;
                $skill ->user_id = Auth::id();
                $skill->save();
            }
        }         
        /*$course->user_id = Auth::id();
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
        $skill->save();*/
                
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
                    $programmingV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Programming')->value('points');
                    $databaseV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Database')->value('points');
                    $cybersecurityV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Cybersecurity')->value('points');
                    $aiV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','AI_and_machine_learning')->value('points');
                    $networksV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Networks')->value('points');
                    $dataAnalysisV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Data_Analysis')->value('points');
                    $appDevelopmentV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Application_Development')->value('points');

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

                        else{
                            $maximumPoints = 0;
                            $maximumColumn = "No Skill";
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
        
        if($skill->category == 'Programming'){
            $skill->points +=5;
            if($course->level == 'fundamental awarness'){
                $skill->points +=1;
            }
            else if($course->level == 'limited experience'){
                $skill->points +=2;
            }
            else if($course->level == 'intermediate'){
                $skill->points +=3;
            }
            else if($course->level == 'advanced'){
                $skill->points +=4;
            }
            else if($course->level == 'expert'){
                $skill->points +=5;
            }
            
            $skill->save();   
        }  
        
        else if($skill->category == 'Database'){
            $skill->points += 3;
            if($course->level == 'fundamental awarness'){
                $skill->points +=1;
            }
            else if($course->level == 'limited experience'){
                $skill->points +=2;
            }
            else if($course->level == 'intermediate'){
                $skill->points +=3;
            }
            else if($course->level == 'advanced'){
                $skill->points +=4;
            }
            else if($course->level == 'expert'){
                $skill->points +=5;
            }
            
            $skill->save();
        } 

        else if($skill->category == 'Data_Analysis'){
            $skill->points += 5;
            if($course->level == 'fundamental awarness'){
                $skill->points +=1;
            }
            else if($course->level == 'limited experience'){
                $skill->points +=2;
            }
            else if($course->level == 'intermediate'){
                $skill->points +=3;
            }
            else if($course->level == 'advanced'){
                $skill->points +=4;
            }
            else if($course->level == 'expert'){
                $skill->points +=5;
            }
            
            $skill->save();
        } 

        else if($skill->category == 'Network'){
            $skill->points += 4;
            if($course->level == 'fundamental awarness'){
                $skill->points +=1;
            }
            else if($course->level == 'limited experience'){
                $skill->points +=2;
            }
            else if($course->level == 'intermediate'){
                $skill->points +=3;
            }
            else if($course->level == 'advanced'){
                $skill->points +=4;
            }
            else if($course->level == 'expert'){
                $skill->points +=5;
            }
            $skill->save();
        }
        
        else if($skill->category == 'Cybersecurity'){
            $skill->points += 5;
            if($course->level == 'fundamental awarness'){
                $skill->points +=1;
            }
            else if($course->level == 'limited experience'){
                $skill->points +=2;
            }
            else if($course->level == 'intermediate'){
                $skill->points +=3;
            }
            else if($course->level == 'advanced'){
                $skill->points +=4;
            }
            else if($course->level == 'expert'){
                $skill->points +=5;
            }
            $skill->save();
        }  

        else if($skill->category == 'AI_and_machine_learning'){
            $skill->points += 5;
            if($course->level == 'fundamental awarness'){
                $skill->points +=1;
            }
            else if($course->level == 'limited experience'){
                $skill->points +=2;
            }
            else if($course->level == 'intermediate'){
                $skill->points +=3;
            }
            else if($course->level == 'advanced'){
                $skill->points +=4;
            }
            else if($course->level == 'expert'){
                $skill->points +=5;
            }
            $skill->save();
        } 

        else if($skill->category == 'Application_Development'){
            $skill->points += 4;
            if($course->level == 'fundamental awarness'){
                $skill->points +=1;
            }
            else if($course->level == 'limited experience'){
                $skill->points +=2;
            }
            else if($course->level == 'intermediate'){
                $skill->points +=3;
            }
            else if($course->level == 'advanced'){
                $skill->points +=4;
            }
            else if($course->level == 'expert'){
                $skill->points +=5;
            }
            $skill->save();
        } 

        else if($skil->category == 'Web_Design'){
            $skill->points += 3;
            if($course->level == 'fundamental awarness'){
                $skill->points +=1;
            }
            else if($course->level == 'limited experience'){
                $skill->points +=2;
            }
            else if($course->level == 'intermediate'){
                $skill->points +=3;
            }
            else if($course->level == 'advanced'){
                $skill->points +=4;
            }
            else if($course->level == 'expert'){
                $skill->points +=5;
            }
            $skill->save();
        } 

        $pendingcourses= DB::table('courses')
                        ->where('status',0)
                        ->select('courses.id', 'courses.name','courses.category', 'courses.level')
                        ->get();

        return view('Admin.pendingCourses') ->withDetails($pendingcourses);
    }
}
