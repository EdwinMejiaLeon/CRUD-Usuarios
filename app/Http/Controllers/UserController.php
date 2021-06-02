<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ViewSupervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(10);
        $supervisor = ViewSupervisor::all();

        return view('UserAdmin.index', compact('users','supervisor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // get user
        $user = User::findOrFail($id);
        return view('UserAdmin.edit')->with('user', $user);
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
        $old = "";
        $new = "";
        // get user and update data
        $user = User::findOrFail($id);
       
        if ($user->name != $request->name){
            $old =  $old." -nombre: ".$user->name; 
            $new = $new." -nombre: ".$request->name;
        }
        if ($user->email != $request->email){
            $old = $old." -email: ".$user->email;
            $new = $new." -email: ".$request->email;
        }
        if($user->role != $request->role){
            $old = $old." -rol: ".$user->role;
            $new = $new." -rol: ".$request->role;
        }

        if(auth()->user()->role == "supervisor"){
            ViewSupervisor::create([
                'usuario_id' => $id,
                'supervisor_id' => auth()->user()->id,
                'nameSupervisor' => auth()->user()->name,
                'previousChange' => $old,
                'newChange' => $new,
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->update();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //  get user and delete
        $user =User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function active(Request $request, $id )
    {
        dd("entro");
        
        $user = User::findOrFail($id);
        if ($user->state == 1)
        {
            $user->state = 0;
        }
        else
        {
            $user->state = 1;
        }
        $user->update();

        return redirect()->back();
    }
}
