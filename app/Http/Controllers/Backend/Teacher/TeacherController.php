<?php

namespace App\Http\Controllers\backend\Teacher;

use App\Teacher;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(request()->user()->speciality);
        if (Auth::user()->speciality_id != null) {
            $teachers = Teacher::where('speciality_id',Auth::user()->speciality_id)->paginate(15);
        }else {
            $teachers = Teacher::paginate(15);
        }

        //$teachers = Teacher::paginate(15);
        return view('teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        return view('teachers.create',compact('specialities'));
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
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'speciality'    => Rule::requiredIf(request()->user()->hasAnyRole(['admin'])),

        ]);

        $teacher = new Teacher;
        $teacher->first_name = request()->first_name;
        $teacher->last_name  = request()->last_name;
        if (request()->user()->hasAnyRole(['admin'])) {
            $teacher->speciality()->associate(request()->speciality);
        }else{
            $teacher->speciality()->associate(request()->user()->speciality);
        }
        $teacher->save();

        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $specialities = Speciality::all();
        return view('teachers.edit',compact('teacher','specialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        request()->validate([
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'speciality'    => Rule::requiredIf(request()->user()->hasAnyRole(['admin'])),
            'status'        => ['required'],
        ]);

        $teacher_update = Teacher::find($teacher->id);
        $teacher_update->first_name = request()->first_name;
        $teacher_update->last_name  = request()->last_name;
        $teacher_update->status     = request()->status;
        if (request()->user()->hasAnyRole(['admin'])) {
            $teacher_update->speciality()->associate(request()->speciality);
        }else{
            $teacher_update->speciality()->associate(request()->user()->speciality);
        }
        $teacher_update->save();

        return redirect()->route('teachers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);

    }
}
