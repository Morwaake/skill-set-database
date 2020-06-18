<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pending_Course;
use Auth;
use Validator,Redirect,Response,File;
Use App\Image;

class SkillController extends Controller
{
    //
    public function addSkills(Request $request){
        $pending_course = new Pending_Course;
        /* Store Skill Details*/
        $pending_course->user_id = Auth::id();
        $pending_course->name = $request->name;
        $pending_course->category = $request->category;
        $pending_course->level = $request->level;
        
        request()->validate([
            'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       if ($files = $request->file('fileUpload')) {
           $destinationPath = 'public/image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $insert['image'] = "$profileImage";
        }
        $check = Image::insertGetId($insert);
        $pending_course->save();
 
        

        return view('Adept.index')->with('success', 'Skill added');;
    }

    public function addSkill(){
        return view('Adept.addSkill');
    }
}
