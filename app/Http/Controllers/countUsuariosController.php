<?php

namespace App\Http\Controllers;

use App\Models\User;

class countUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //count of users
        $countUsers = User::count();

        return view('UserAdmin.count', compact('countUsers'));
    }
}
