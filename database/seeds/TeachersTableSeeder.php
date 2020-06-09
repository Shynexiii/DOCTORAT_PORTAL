<?php

use App\Teacher;
use App\Speciality;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::truncate();

        $teacher1 = Teacher::create([
            'first_name'    =>  'Markus',
            'last_name'     =>  'Jean Raul',
            'status'        =>  '1',
        ]);

        $teacher2 = Teacher::create([
            'first_name'    =>  'McCan',
            'last_name'     =>  'Isak Paul',
            'status'        =>  '0',
        ]);

        $teacher3 = Teacher::create([
            'first_name'    =>  'Fernandes',
            'last_name'     =>  'Paco Dimitri',
            'status'        =>  '1',
        ]);

        $speciality1 = Speciality::find(1);
        $speciality2 = Speciality::find(2);
        $speciality3 = Speciality::find(3);
         
        $teacher1->speciality()->associate($speciality1);
        $teacher2->speciality()->associate($speciality2);
        $teacher3->speciality()->associate($speciality3);

        $teacher1->save();
        $teacher2->save();
        $teacher3->save();
    }
}
