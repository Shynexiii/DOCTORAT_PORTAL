<?php

namespace App\Http\Controllers\backend\Student;

use App\Student;
use App\Speciality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $students = Student::all();
        return view('students.index',compact('students'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        return view('students.create',compact('specialities'));
    }

    public function downloadForm()
    {
        $specialities = Speciality::all();
        return view('students.downloadForm',compact('specialities'));
    }

    public function download(Request $request)
    {
        //dd($request);
        request()->validate([
            'name'    => ['required'],
        ]);
        return (new StudentsExport($request->speciality))->download('Students.xlsx');
        //return redirect()->route('students.downloadForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'speciality'    => ['required'],
            'file'          => ['required','file','max:5000','mimes:xls,xlsx'],
        ]);

        Excel::import(new StudentsImport, $data["file"]);  
        
        return redirect()->route('students.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student = Student::find($id);
        $student->delete();
    }

    public function secrete_code(Request $request)
    {
        $students = Student::all();
        
        foreach ($students as $student) {
            $student->secrete_code = strtoupper(substr($student->speciality->name,0 ,2)).'00'.$student->id;
            $student->save();
        }

        return redirect()->route('students.index');
    }
    
    /**
     * Student list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Speciality $speciality){
        $specialities = $speciality->students()->get();
        //dd($specialities);
        return view('students.list',compact('specialities'));
    }


    public function generateNotes(){
        $students = Student::all();
        
        foreach ($students as $student) {
            $student->secrete_code = strtoupper(substr($student->speciality->name,0 ,2)).'00'.$student->id;
            
            $student->module_1_note_1 = random_int (1,15);
            $student->module_1_note_2 = random_int (1,15);
            if( abs($student->module_1_note_1 - $student->module_1_note_2) >= 3){
                $student->module_1_note_3 = random_int (1,15);
            }
            
            $student->module_2_note_1 = random_int (1,15);
            $student->module_2_note_2 = random_int (1,15);
            if( abs($student->module_2_note_1 - $student->module_2_note_2) >= 3){
                $student->module_2_note_3 = random_int (1,15);
            }

            $note_1_1 = $student->module_1_note_1;
            $note_1_2 = $student->module_1_note_2;
            $note_1_3 = $student->module_1_note_3;
            $note_2_1 = $student->module_2_note_1;
            $note_2_2 = $student->module_2_note_2;
            $note_2_3 = $student->module_2_note_3;

            if( abs($note_1_1 - $note_1_2) >= 3){
                $note_finale_1_1 = ($note_1_3 == null) ? max($note_1_1,$note_1_2) :max($note_1_1,$note_1_2,$note_1_3);
                $status_1 = 1;   
            }else{
                $note_finale_1_1 = max($note_1_1,$note_1_2); 
                $status_1 = 0;
                $note_1_3 = 0;
            }

            if( abs($note_2_1 - $note_2_2) >= 3){
                $note_finale_2_1 = ($note_2_3 == null) ? max($note_2_1,$note_2_2) :max($note_2_1,$note_2_2,$note_2_3);
                $status_2 = 1;
            }else{
                $note_finale_2_1 = max($note_2_1,$note_2_2);
                $status_2 = 0;
                $note_2_3 = 0;
            }

            $module_1_status = $status_1;
            $module_2_status = $status_2;
            $note_final_module_1 = $note_finale_1_1;
            $note_final_module_2 = $note_finale_2_1;
            $moyenne_doctorat = ($note_final_module_1 + $note_final_module_2)/2;
            
            $data = array(
                'module_1_note_1' => $note_1_1,
                'module_1_note_2' => $note_1_2,
                'module_1_note_3' => $note_1_3,
                'module_2_note_1' => $note_2_1,
                'module_2_note_2' => $note_2_2,
                'module_2_note_3' => $note_2_3,
                'note_final_module_1' => $note_final_module_1,
                'note_final_module_2' => $note_final_module_2,
                'module_1_status' => $module_1_status,
                'module_2_status' => $module_2_status,
                'moyenne_doctorat' => $moyenne_doctorat,
            );
            $student->update($data);
        }

        return redirect()->route('students.index');
    }


    


    
}
