<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ViewSupervisor;
use Illuminate\Http\Request;

class UserGeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get user
        $user = User::findOrFail($id);
        $supervisor = ViewSupervisor::all();

        return view('UserGeneral.index', compact('user','supervisor'));
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
        if(auth()->user()->role == "supervisor"){
            ViewSupervisor::create([
                'usuario_id' => $id,
                'supervisor_id' => auth()->user()->id,
                'nameSupervisor' => auth()->user()->name,
            ]);
        }
        
        // get user and update data
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect()->route('home');
    }
}
