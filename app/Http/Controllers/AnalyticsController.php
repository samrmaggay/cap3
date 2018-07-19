<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Client;
use App\Project;
use App\ActivityStatus;

use DB;

class AnalyticsController extends Controller
{

   public function __construct()
    {
       $this->middleware('auth');
     }

    public function inProgress()
    {
    	if(auth()->user()->user_role == 3) {
        $activities = DB::select('SELECT * FROM activities WHERE user_id
                            ='.auth()->user()->id.
                            ' AND status = "In-progress"
                             ORDER BY due_date,due_time DESC');
        return view('analytics.inprogress')->with('activities', $activities);
        }

        else {
        	return view('home');
        }

    }

    public function completed()
    {
    	if(auth()->user()->user_role == 3) {
        $activities = DB::select('SELECT * FROM activities WHERE user_id
                            ='.auth()->user()->id.
                            ' AND status = "Completed"
                             ORDER BY due_date,due_time DESC');
        return view('analytics.completed')->with('activities', $activities);
    	}

        else {
        	return view('home');
        }
         
    }    


    public function setup()
    {
    	if(auth()->user()->user_role == 1 || auth()->user()->user_role == 2) {
	        $clients = Client::all();
	        $projects = Project::all();
	        $activityStats = ActivityStatus::all();
	        return view('setup.index', compact('clients', 'projects', 'activityStats'));
    	}

        else {
        	return view('home');
        }
         
    } 


}
