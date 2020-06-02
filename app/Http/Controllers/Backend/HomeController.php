<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Student;
use App\Teacher;
use App\Speciality;
use App\Charts\StudentChart;
use Illuminate\Http\Request;
use App\Charts\SpecialityChart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chartAdmission = new Studentchart;
        $chartSpeciality = new SpecialityChart;

        $speciality = Speciality::all()->loadCount('students')->pluck('students_count','name');
        
        $studentAdmitted = Student::where('moyenne_doctorat','>',10)->count();
        $studentNonAdmitted = Student::where('moyenne_doctorat','<',10)->count();
        
        $chartAdmission->labels(['Admitted','Non Admitted']);
        $chartAdmission->dataset('Admission', 'bar', [$studentAdmitted,$studentNonAdmitted])
        ->backgroundcolor(['green','red']);
        $chartAdmission->title('Admission');

        $chartSpeciality->title('Specialities');
        $chartSpeciality->labels($speciality->keys());
        $chartSpeciality->dataset('Specialities', 'doughnut',$speciality->values())
        ->backgroundcolor(['green','red','#FF5733','#EBAE34','#6BEB34','purple','GRAY','brown']);
        $chartSpeciality->displayAxes(false);

        $users = User::all()->count();
        $teachers = Teacher::all()->count();
        $staff = ($users + $teachers);
        return view('home',compact('chartAdmission','chartSpeciality','studentAdmitted','studentNonAdmitted','speciality','staff'));
    }
}
