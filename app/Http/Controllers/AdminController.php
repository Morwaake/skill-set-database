<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stakeholder;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $owners= DB::table('users')
        ->join('adepts','users.id','=','adepts.user_id')
        ->where('role',1)
        ->select('users.id', 'adepts.first_name','adepts.last_name', 'adepts.Phone', 'adepts.address', 'adepts.city', 'adepts.email','adepts.date_of_birth')
        ->get();
       
        //$data = [0*''firs]
        return view('Admin.index')->withDetails($owners);
    }

    public function pendingStakeholder(){
        $pendings= DB::table('stakeholders')
        ->where('status',0)
        ->select('stakeholders.id', 'stakeholders.s_name','stakeholders.email', 'stakeholders.number')
        ->get();


        return view('Admin.pendingStakeholder')->withDetails($pendings);
    }

    public function viewPendingCourses(){
        $pendingcourses= DB::table('courses')
                        ->where('status',0)
                        ->select('courses.id', 'courses.name','courses.category', 'courses.level')
                        ->get();


        return view('Admin.pendingCourses')->withDetails($pendingcourses);
    }


    public function approveStakeholder($id){
        $stakeholder = Stakeholder::find($id)->first();
        if($stakeholder->status == 0){
            $stakeholder->status = 1;
        }
        else{
            $stakeholder->status = 0; 
        }
        $stakeholder->save();

        return view('Admin.pendingStakeholder')->with('message','stakeholder succefully approved!');

    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
