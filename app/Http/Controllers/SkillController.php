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
        $course->user_id = Auth::id();
        $course->name = $request->name;
        $course->category = $request->category;
        $course->level = $request->level;
        $course->status = false;
        $course->save();

        $image->link = $proof->getFilename().'.'.$extension;
        $image->user_id = Auth::id();
        $image->save();

        return view('Adept.index')->with('success', 'Skill added');
    }

    public function addSkill(){
        return view('Adept.addSkill');
    }
    public function approve($id){
        $course = Course::find($id)->get();
        $course->status = true;
        $course->save();
        
        $skill = Skill::where('user_id',$course->user_id)->get();
        if($course->category == 'Programming'){
            $skill->Programming += 5;
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
    }
}
