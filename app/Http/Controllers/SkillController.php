<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pending_Course;
use App\Pending_Skill;
use Auth;
use DB;
use Validator,Redirect,Response,File;
Use App\Image;

class SkillController extends Controller
{
    
    public function addSkills(Request $request){
        $pending_course = new Pending_Course;
         $pending_skill = new Pending_Skill;
        /* Store Skill Details*/
        $category = $request->category;
        $current_id = Auth::id();
        $pending_course->user_id = Auth::id();
        $pending_course->name = $request->name;
        $pending_course->category = $request->category;
        $pending_course->level = $request->level;
         
        //validate incoming request
        $validate = Validator::make($request->all(), [
            //'category' => ['required', 'string', 'max:255'],
            //'name' => ['required', 'string', 'max:255'],
            $current_id => [ 'integer', 'max:255', 'unique:pending__skills']
        ]);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)
                                     ->withInput();
        }


        $pending_skill ->Programming=0;
        $pending_skill ->Networks=0;
        $pending_skill ->Web_Design=0;
        $pending_skill ->Database=0;
        $pending_skill ->Data_Analysis=0;
        $pending_skill ->Cybersecurity=0;
        $pending_skill ->AI_and_machine_learning=0;
        $pending_skill ->Application_development=0;
        $pending_skill ->user_id = Auth::id();
        $pending_skill->save();

        
        $addedSkill = Pending_Skill::where('name',$pending_course->name)
                                    ->where('category',$pending_course->category)
                                    ->where('level',$pending_course->level)
                                    ->where('user_id',$pending_course->user_id)
                                    ->first();
        if ($addedSkill)
        //FUCTION TO AVOID DUPLICATES
         {
            return veiw('Adept.index')->with('FAIL', 'Skill already added');
        }
        $columns=$pending_skill->getTableColumns();
        foreach ($columns  as  $column){
            if($column == $category && $column =="Database" ){
                 DB::table('pending__skills')
                                ->where([['user_id', '=', $current_id],])
                                ->update(['Database' => 5]);
            }
        }
        $pending_course->save();
        

        return view('Adept.index')->with('success', 'Skill added');
    }

    public function addSkill(){
        return view('Adept.addSkill');
    }
}
