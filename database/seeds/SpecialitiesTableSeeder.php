<?php

use App\Speciality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('DELETE FROM specialities');
        Speciality::create(['name' => 'Artificial Intelligence']);
        Speciality::create(['name' => 'Biocomputation']);
        Speciality::create(['name' => 'Computer and Network Security']);
        Speciality::create(['name' => 'Human-Computer Interaction']);
        Speciality::create(['name' => 'Information Management and Analytics']);
        Speciality::create(['name' => 'Real-World Computing']);
        Speciality::create(['name' => 'Software Theory']);
        Speciality::create(['name' => 'Systems']);
        Speciality::create(['name' => 'Theoretical Computer Science']);
    }
}
