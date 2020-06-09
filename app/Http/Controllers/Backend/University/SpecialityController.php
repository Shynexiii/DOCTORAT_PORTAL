<?php

namespace App\Http\Controllers\Backend\University;

use App\Http\Controllers\Controller;
use App\Speciality;
use Illuminate\Http\Request;
use App\Student;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::paginate(15);
        // $students = Speciality::all()->first();
        
        // dd($students->loadCount('students')->students_count);
        return view('specialities.index',compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required'],
        ]);

        $data = array(
            'name' => request()->name,
        );

        $speciality = Speciality::create($data);
        $speciality->save();

        return redirect()->route('specialities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function showStudents(Speciality $speciality)
    {
        $specialities = $speciality->students()->paginate(15);
        //dd($speciality);
        return view('specialities.students',compact('specialities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        return view('specialities.edit',compact('speciality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $speciality)
    {
        request()->validate([
            'speciality' => ['required'],
        ]);

        $speciality = Speciality::find($speciality->id);
        $speciality->name = request()->speciality;
        $speciality->save();

        return redirect()->route('specialities.index');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
