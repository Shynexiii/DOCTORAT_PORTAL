<?php

namespace App\Http\Controllers\Backend\Pdf;

use PDF;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PdfController extends Controller
{
    public function UsersPdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('pdf.users', compact('users'));
        return $pdf->stream();
    }

    public function studentsCodePdf()
    {
        $students = Student::all();
        $pdf = PDF::loadView('pdf.studentsCode', compact('students'));
        return $pdf->stream();
    }

    public function studentsPdf()
    {
        $students = Student::all()->sortByDesc('moyenne_doctorat');
        $pdf = PDF::loadView('pdf.students', compact('students'));
        return $pdf->stream();
    }

}
