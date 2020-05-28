<?php

namespace App\Http\Controllers\backend\Student;

use App\Student;
use App\Speciality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        if(request()->ajax()){
            $data = Student::latest()->get();
            return DataTables::of($data)
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);

        }
        return view('students.index');
    }
    protected function getColumns()
    {
        return [
            'register_number',
            'first_name_fr',
            'last_name_fr',
            'speciality',
            'secrete_code',
            'action',
        ];
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
        //
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
        $specialities = $speciality->students()->paginate(15);
        //dd($specialities);
        return view('students.list',compact('specialities'));
    }

    public function editModule1(Speciality $speciality, Student $student){
        return view('students.editModule1',compact('speciality','student'));
    }

    public function addNote(Speciality $speciality, Student $student)
    {

        $notes = request()->validate([
            'module_1_note1' => ['min:0','max:20'],
            'module_1_note2' => ['min:0','max:20'],
            'module_1_note3' => ['min:0','max:20'],
            'module_2_note1' => ['min:0','max:20'],
            'module_2_note2' => ['min:0','max:20'],
            'module_2_note3' => ['min:0','max:20'],
        ]);
        
        if(isset($notes['module_1_note1'])){
            $student->note_final_module_1 = $notes['module_1_note1'];

        }
        
        
        if(isset($notes['module_1_note1']) and isset($notes['module_1_note2'])){
            $student->module_1_note_1 = $notes['module_1_note1'];
            $student->module_1_note_2 = $notes['module_1_note2'];

            if(abs($notes['module_1_note1'] - $notes['module_1_note2']) <= 3){
                $note_module_1 = $notes['module_1_note2'];
                $student->note_final_module_1 = $notes['module_1_note2'];

            }else{
                $note_module_1 = $notes['module_1_note3'];
                $student->module_1_note_3 = $notes['module_1_note3'];
                $student->note_final_module_1 = $notes['module_1_note3'];

            }
        }
        if(isset($notes['module_2_note1'])){
            $student->note_final_module_2 = $notes['module_2_note1'];

        }

        if(isset($notes['module_2_note1']) and isset($notes['module_2_note2'])){
            $student->module_2_note_1 = $notes['module_2_note1'];
            $student->module_2_note_2 = $notes['module_2_note2'];

            if(abs($notes['module_2_note1'] - $notes['module_2_note2']) <= 3){
                $note_module_2 = $notes['module_2_note2'];
                $student->note_final_module_2 = $notes['module_2_note2'];

            }else{
                $note_module_2 = $notes['module_2_note3'];
                $student->module_2_note_3 = $notes['module_2_note3'];
                $student->note_final_module_2 = $notes['module_2_note3'];


            }
        }
        $moyenne = ($note_final_module_1 + $note_final_2)/2;
        $student->moyenne_doctorat = $moyenne;
        $student->save();
        return redirect()->route('students.list',['speciality' => $speciality->id]);
    }


    
}
