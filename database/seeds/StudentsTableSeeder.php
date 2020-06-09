<?php

use App\Student;
use App\Speciality;
use App\Imports\StudentsImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        Excel::import(new StudentsImport, 'Student list.xlsx', 'local');

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
            
            //$student->save();
        }

        
    }
}
