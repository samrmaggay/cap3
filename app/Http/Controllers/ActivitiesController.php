<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Client;
use App\Project;
use App\ActivityStatus;

use DB;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->user_role == 3) {
        $activities = DB::select('SELECT * FROM activities WHERE user_id
                            ='.auth()->user()->id.
                            ' AND status = "Open"
                             ORDER BY due_date,due_time DESC');
        return view('activities.index')->with('activities', $activities);
        }

        else {
            return view('home');
        }

         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->user_role == 3) {        
        $clients = Client::all();
        $projects = Project::all();
        $activityStats = ActivityStatus::all();
        return view('activities.newtask', compact('clients', 'projects', 'activityStats'));
        }

        else {
            return view('home');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->user_role == 3) {
        $this->validate($request, [
            'project_name' => 'required',
            'client_name' => 'required',
            'subject' => 'required',
            'due_date' => 'required',
            'time_due' => 'required',
            'details' => 'required',
            'status' => 'required'

         ]);

            $activity = new Activity;
            $activity->client_name = $request->input('client_name');
            $activity->project_name = $request->input('project_name');
            $activity->status = $request->input('status');
            $activity->subject = $request->input('subject');
            $activity->due_date = $request->input('due_date');
            $activity->due_time = $request->input('time_due');
            $activity->details = $request->input('details');
            $activity->user_id = auth()->user()->id;
            $activity->save();

            return redirect('/activities')->with('success', $activity->subject.' Has Been Created');
        }

        else {
            return view('home');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $activities = Activity::find($id);
        // return view('activities.index')->with('activities', $activities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->user_role == 3) {
            $activity = Activity::find($id);
            $clients = Client::all();
            $projects = Project::all();
            $activityStats = ActivityStatus::all();
            return view('activities.edit', compact('clients','projects', 'activityStats'))->with('activity', $activity);
        }

        else {
            return view('home');
        }

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
        if(auth()->user()->user_role == 3) {
        $this->validate($request, [
            'project_name' => 'required',
            'client_name' => 'required',
            'subject' => 'required',            
            'due_date' => 'required',
            'time_due' => 'required',
            'details' => 'required',
            'status' => 'required'

         ]);

            $activity = Activity::find($id);
            $activity->client_name = $request->input('client_name');
            $activity->project_name = $request->input('project_name');
            $activity->status = $request->input('status');
            $activity->subject = $request->input('subject');            
            $activity->due_date = $request->input('due_date');
            $activity->due_time = $request->input('time_due');
            $activity->details = $request->input('details');
            $activity->save();

            return redirect('/activities')->with('success', 'Changes on '.$activity->subject. ' has been Saved');
        }

        else {
            return view('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();

        return redirect('/activities')->with('success', $activity->subject. ' has been Deleted Successfully');
    }

   public function __construct()
    {
       $this->middleware('auth');
     }

}
