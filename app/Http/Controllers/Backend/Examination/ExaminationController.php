<?php

namespace App\Http\Controllers\Backend\Examination;

use App\Examination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Examination::paginate(15);
        return view('examinations.index',compact('examinations'));
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
     * @param  \App\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function show(Examination $examination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function edit(Examination $examination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examination $examination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examination $examination)
    {
        //
    }
}
