<?php

namespace App\Http\Controllers;

use App\Models\surveyCovid;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class surveyUsuariosController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        surveyCovid::create([
            'user_id' => auth()->user()->id,
            'question1' => $request['question1'],
            'question2' => $request['question2'],
            'question3' => $request['question3'],
            'question4' => $request['question4'],
            'question5' => $request['question5'],
        ]);

        return view('home');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('UserGeneral.surveyUser.servey');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataUser = surveyCovid::Where('user_id','=',$id)->get();
        $count = surveyCovid::Where('user_id','=',$id)->count();

        return view('UserGeneral.surveyUser.index', compact('dataUser','count'));
    }
}
