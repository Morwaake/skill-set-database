<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StakeholderController extends Controller
{
    //
    public function index(){
        return view('Stakeholder.index');
    }
}
