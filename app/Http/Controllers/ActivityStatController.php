<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Client;
use App\Project;
use App\ActivityStatus;

use DB;

class ActivityStatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->user_role == 1 || auth()->user()->user_role == 2) { 
            return view('setup.addstatus');
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
        if(auth()->user()->user_role == 1 || auth()->user()->user_role == 2) {
            $this->validate($request, [
                'status_name' => 'required'
             ]);

            $status = new ActivityStatus;
            $status->status_name = $request->input('status_name');
            $status->save();

            return redirect('/setup')->with('success', $status->status_name.' Status Has Been Added');
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
        if (auth()->user()->user_role == 1 || auth()->user()->user_role == 2) {
            $activityStat = ActivityStatus::find($id);
            return view('setup.editstatus', compact('activityStat'));
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
        if (auth()->user()->user_role == 1 || auth()->user()->user_role == 2) {
            $this->validate($request, [
                'status_name' => 'required'
             ]);

            $activityStat = ActivityStatus::find($id);
            $activityStat->status_name = $request->input('status_name');
            $activityStat->save();

            return redirect('/setup')->with('success', 'Changes Has Been Saved');
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
        $activityStat = ActivityStatus::find($id);
        $activityStat->delete();

        return redirect('/setup')->with('success', $activityStat->status_name. ' Has Been Deleted Successfully');
    }


   public function __construct()
    {
       $this->middleware('auth');
     }    
}
