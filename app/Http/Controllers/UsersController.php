<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Client;
use App\Project;
use App\ActivityStatus;
use App\User;

use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->user_role == 1 || auth()->user()->user_role == 2) { 
            $users = User::all();
            return view('users.index', compact('users'));
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
        if (auth()->user()->user_role == 1 || auth()->user()->user_role == 2) {
            $user = User::find($id);
            return view('users.edituser', compact('user'));
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
                'name' => 'required'
             ]);

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->user_role = $request->input('user_role');
            $user->save();

            return redirect('/users')->with('success', 'Changes Has Been Saved to ' .$user->name);
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
        //
    }
}
