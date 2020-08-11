<?php

namespace App\Http\Controllers\Backend\Student;

use App\Note;
use App\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($data);
        if (Auth::user()->speciality_id != null) {
            $data = Student::where('speciality_id',Auth::user()->speciality_id)->latest()->get();
        }else {
            $data = Student::latest()->get();
        }

        if(request()->ajax()){
            //$data = Student::latest()->get();
            return DataTables::of($data)
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="editNote btn btn-primary">Add note</button>';
                //$button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="deleteNote btn btn-danger">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);

        }
            
        return view('students.notes');
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(request()->ajax()){
            $data = Student::findOrFail($id);

            $module_1_note_1 = $data->module_1_note_1;
            $module_1_note_2 = $data->module_1_note_2;
            $module_2_note_1 = $data->module_2_note_1;
            $module_2_note_2 = $data->module_2_note_2;
            
            
            return response()->json([
                'result' => $data,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'module_1_note_1'    => ['numeric','between:0,20'],
            'module_1_note_2'    => ['numeric','between:0,20'],
            'module_1_note_3'    => ['numeric','between:0,20'],
            'module_2_note_1'    => ['numeric','between:0,20'],
            'module_2_note_2'    => ['numeric','between:0,20'],
            'module_2_note_3'    => ['numeric','between:0,20'],
        );
        
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $note_1_1 = $request->module_1_note_1;
        $note_1_2 = $request->module_1_note_2;
        $note_1_3 = $request->module_1_note_3;
        $note_2_1 = $request->module_2_note_1;
        $note_2_2 = $request->module_2_note_2;
        $note_2_3 = $request->module_2_note_3;

        if( abs($note_1_1 - $note_1_2) >= 3){
            $note_finale_1_1 = max($note_1_1,$note_1_2,$note_1_3);
            $status_1 = 1;   
        }else{
            $note_finale_1_1 = max($note_1_1,$note_1_2); 
            $status_1 = 0;
            $note_1_3 = 0;
        }

        if( abs($note_2_1 - $note_2_2) >= 3){
            $note_finale_2_1 = max($note_2_1,$note_2_2,$note_2_3);
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

        Student::whereId($request->hidden_id)->update($data);
        
        return response()->json(['success' => 'Data is successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }

}
