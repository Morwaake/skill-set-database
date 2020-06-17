<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use Auth;

class SkillController extends Controller
{
    //
    public function addSkills(Request $request){
        $skill = new Skill;
        /* Store Skill Details*/
        $skill->user_id = Auth::id();
        $skill->name = $request->name;
        $skill->category = $request->category;
        $skill->work_experience_on_skill = $request->experience;
        $skill->obtained = $request->obtained;
        $skill->level = $request->level;
    
        $skill->save();
 
        

        return view('Adept.index')->with('success', 'Skill added');;
    }

    public function addSkill(){
        return view('Adept.addSkill');
    }
}
