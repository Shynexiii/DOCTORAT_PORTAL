@extends('layouts.master')
@section('title','Students')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table id="studentsListTable" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Registration number</th>
                            <th>Secrete code</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Module 1</th>
                            <th>Module 2</th>
                            <th>Average</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialities as $student)
                            <tr>
                                <td>{{ $student->register_number }}</td>
                                <td>{{ $student->secrete_code }}</td>
                                <td>{{ $student->first_name_fr }}</td>
                                <td>{{ $student->last_name_fr }}</td>
                                <td>{{ $student->note_final_module_1 }}</td>
                                <td>{{ $student->note_final_module_2 }}</td>
                                <td>{{ $student->moyenne_doctorat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
                
            </div>
        </div>    
    </div>
</div>
@endsection
