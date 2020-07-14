<?php

namespace App\Http\Controllers;
use App\Adept;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Stakeholder;
use DB;

use Auth;

class StakeholderController extends Controller
{
    //
    public function profileDetails(){
        $stakeholder = Stakeholder::where('user_id', '=',  Auth::id())->first();
        if ($stakeholder === null) {
            return redirect()->back()->with('message','add details first');
        }else{
        $profile= DB::table('stakeholders')
                        ->where('user_id', Auth::id())
                        ->select('stakeholders.id','stakeholders.s_name','stakeholders.email', 'stakeholders.number','stakeholders.address','stakeholders.city','stakeholders.location')->paginate(5)
                        ->first();
                        $data =[
                            'profile'=>$profile,
                        ];

                        
        return view('Stakeholder.profile')->with($data);}

    }


    public function viewallskillholders(){
        $stakeholder = Stakeholder::where('user_id', '=',  Auth::id())->first();
        if ($stakeholder === null) {
            return redirect()->back()->with('message','add details first');
        }else{
        $profileBrief= DB::table('adepts')
                        ->select('adepts.id','adepts.first_name','adepts.last_name','adepts.rank_points', 'adepts.Phone','adepts.place_worked','adepts.languages','adepts.year_started_working','adepts.year_ended_working', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();
        return view('Stakeholder.allSkillsHolders')->withDetails($profileBrief);
        }
    }
    public function moreDetails($id){
        
        $profileBrief= DB::table('adepts')
                        ->where('id', $id)
                        ->select('adepts.first_name','adepts.last_name', 'adepts.rank_points','adepts.Phone','adepts.place_worked','adepts.languages','adepts.year_started_working','adepts.year_ended_working', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();
                        

        $allCourses = DB::table('courses')
                        ->join('adepts','courses.user_id','=','adepts.user_id')
                        ->where('adepts.id',$id)
                        ->where('status', 1)
                        ->select('courses.name','courses.category','courses.year','courses.obtained')
                        ->get();
                        

        $topSkills =  DB::table('courses')->where('status', 1)->select('category', DB::raw('COUNT(category) AS occurrences'))
                    ->groupBy('category')
                    ->orderBy('occurrences', 'DESC')
                    ->limit(4)
                    ->get();                        
                        $data =[
                            'allCourses'=>$allCourses,
                            'profileBrief'=> $profileBrief,
                            'topSkills'=> $topSkills,
                            
        
                        ];


        return view('Stakeholder.moredetails')->with($data);

    }
    public function index(){
        $recentlyApproved= DB::table('courses')
                            ->join('adepts','courses.user_id','=','adepts.user_id')
                            ->where('courses.status', 1)
                            ->orderByRaw('courses.updated_at DESC')
                            ->select('adepts.first_name','courses.category')->take(4)->get();
                            

        $numberOfProgramming = DB::table('courses')
                            ->where('status', 1)
                            ->where('Category','Programming')
                            ->count();

                        $numberOfDatabase = DB::table('courses')
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

                        $leaderboards =DB::table('adepts')->orderByRaw('rank_points DESC')->take(6)->get();

                        $data =[
                            'numberOfProgramming'=>$numberOfProgramming,
                            'numberOfDatabase'=>$numberOfDatabase,
                            'numberOfNetworks'=>$numberOfNetworks,
                            'numberOfWeb'=>$numberOfWeb,
                            'numberOfAI'=>$numberOfAI,
                            'numberOfDataAnalysis'=>$numberOfDataAnalysis,
                            'numberOfCyber'=>$numberOfCyber,
                            'numberOfApp'=>$numberOfApp,
                            'recentlyApproved'=>$recentlyApproved,
                            'leaderboards'=>$leaderboards,     

                        ];



        return view('Stakeholder.index')->with($data);
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
        /**AVOID DUPLICATE ENTRY */
        $available = Stakeholder::where('user_id',Auth::id())->get();
        foreach($available as $avail){
            if( $avail->s_name === $request->s_name && $avail->email === $request->email && $avail->address===$request->address && $avail->location===$request->location && $avail->city===$request->city && $avail->number===$request->number){
                return redirect()->back()->with('message','Skill already exist, You cannot duplicate a skill');
            }
        }
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:adepts|string|max:50',
        ]);
        if ($validator->fails()){
            return redirect('/adept')->with('message','details successfully added !!!!');
        }
        
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
        
        return redirect('/stakeholder')->with('message1','details successfully added !!!!');
    }

    public function showEditDetails($id)
    {
        $stakeholder = Stakeholder::find($id);
        return view('Stakeholder.editProfile', ['stakeholder' => $stakeholder]);
    }
    public function editProfileDetails(Request $request)
    {
        $stakeholder = Stakeholder::find($request->id);
        $stakeholder->s_name = $request->s_name;
        $stakeholder->email = $request->email;
        $stakeholder->address = $request->address;
        $stakeholder->location = $request->location;
        $stakeholder->city = $request->city;
        $stakeholder->number = $request->number;
        $stakeholder->save();

        return redirect('/stakeholder')->with('message1','details successfully updated !!!!');
    }



    public function redirectTo(){
        
        switch (Auth::user()->role) {
            case 1:
                $this->redirectTo = '/adept';
                $adepts = Adept::where('user_id', '=',  Auth::id())->first();
        if ($adepts === null) {
     

            return view('Adept.addDetails')->with('message','add details first');
        }else{
                $profileBrief= DB::table('adepts')
                        ->where('user_id', Auth::id())
                        ->select('adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
                        ->get();
                        

                        $numberOfProgramming = DB::table('courses')
                            ->where('status', 1)
                            ->where('Category','Programming')
                            ->count();

                        $numberOfDatabase = DB::table('courses')
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


                    //retriving points for individual skill category
                    $programmingV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Programming')->value('points');
                    $databaseV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Database')->value('points');
                    $cybersecurityV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Cybersecurity')->value('points');
                    $aiV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','AI_and_machine_learning')->value('points');
                   
                    $networksV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Networks')->value('points');
                    $dataAnalysisV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Data_Analysis')->value('points');
                    $appDevelopmentV = DB::table('skills')->select('points')->where('user_id', Auth::id())->where('category','Application_Development')->value('points');

                    $overalPoints= $programmingV + $networksV + $dataAnalysisV + $cybersecurityV + $appDevelopmentV + $aiV + $dataAnalysisV + $databaseV;
                    
                    $adept = Adept::where('user_id', Auth::id())->first();
                    $adept->rank_points=$overalPoints;
                    $adept->save();
                    ///////////////////////////////

                    $usersPosition =DB::table('adepts')->orderByRaw('rank_points DESC')
                                                        ->where('rank_points', '>=',$overalPoints)->count();

                    
                    $maximumPoints =  $maximumColumn = 0;

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
                            
                            'numberOfProgramming'=>$numberOfProgramming,
                            'numberOfDatabase'=>$numberOfDatabase,
                            'numberOfNetworks'=>$numberOfNetworks,
                            'numberOfWeb'=>$numberOfWeb,
                            'numberOfAI'=>$numberOfAI,
                            'numberOfDataAnalysis'=>$numberOfDataAnalysis,
                            'numberOfCyber'=>$numberOfCyber,
                            'numberOfApp'=>$numberOfApp,
                            'usersPosition'=>$usersPosition,   

                        ];


                return view('Adept.index')->withDetails($profileBrief)->with($data);
                    }
                break;

            case 2:
                $this->redirectTo = '/stakeholder';

                return redirect('/stakeholder');
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
        if($name === null && $category === null){
            return redirect()->back()->with('message','you need to have at least course name or category entered entered !!!!');
        }
        else{
            if($level === null && $category === null){
            $searchResults = DB::table('courses')
                        ->join('adepts','courses.user_id','=','adepts.user_id')
                        ->where('name','LIKE','%'.$name.'%')
                        ->select('adepts.id','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')->distinct()
                        ->get();
                    
    
                    if(count($searchResults) > 0){
                    
                    return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );}
                    else{
                        return redirect()->back()->with('message','sorry ,no individual matching the course name !!!!');}
            }
                if($level === null && $name === null){
                    $searchResults = DB::table('courses')
                                ->join('adepts','courses.user_id','=','adepts.user_id')
                                ->where('category','LIKE','%'.$category.'%')
                                ->select('adepts.id','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')->distinct()
                                ->get();
            
                            if(count($searchResults) > 0)
                            return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                            else
                                return redirect()->back()->with('message','sorry ,no individual matching your skill category');
                    }
            else{
                $searchResults = DB::table('courses')
                        ->join('adepts','courses.user_id','=','adepts.user_id')
                        ->where('level','LIKE','%'.$level.'%')
                        ->where('category','LIKE','%'.$category.'%')
                        ->where('name','LIKE','%'.$name.'%')
                        ->select('adepts.id','adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')->distinct()
                        ->get();
    
                    if(count($searchResults) > 0)
                    return view('Stakeholder.searchResults')->withDetails($searchResults)->withQuery ( $name,$category,$level );
                    else
                    return redirect()->back()->with('message','sorry ,no individual matching the details !!!!');
            }
                        
        }
    }


}
