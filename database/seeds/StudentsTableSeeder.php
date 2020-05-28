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


        
    }
}
