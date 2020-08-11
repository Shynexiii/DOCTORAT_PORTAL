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

}
