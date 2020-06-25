<?php

namespace App\Http\Controllers;
use App\Adept;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Skill;
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
