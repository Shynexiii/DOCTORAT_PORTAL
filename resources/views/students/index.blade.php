@extends('layouts.master')
@section('title','Students')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                @can('admin')
                <a href="{{ route('students.create') }}" class="btn btn-primary d-inline p-2"><i class="fas fa-plus"></i> Add list of students</a>   
                @endcan  
                <form action="{{ route('students.secrete_code') }}" method="POST" class="d-inline ">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Generate a secret code</button>
                </form>
                @can('admin')
                <form action="{{ route('students.generateNotes') }}" method="POST" class="d-inline ">
                    @csrf
                    <button type="submit" class="btn btn-warning"><i class="fas fa-plus"></i> Generate notes</button>
                </form>
                @endcan
                @can('admin')
                <a href="{{ route('students.downloadForm') }}" class="btn btn-info"><i class="fas fa-download"></i> Download</a>
                @endcan

            </div>
            <div class="card-body">
                <table id="studentsTable" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Registration number</th>
                            <th>Secrete code</th>
                            <th>First name</th>
                            <th>Last name</th>
                            @can('adminOrSecretariat')
                                <th>Module 1</th>
                                <th>Module 2</th>
                                <th>Average</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->register_number }}</td>
                                <td>{{ $student->secrete_code }}</td>
                                <td>{{ $student->first_name_fr }}</td>
                                <td>{{ $student->last_name_fr }}</td>
                            @can('adminOrSecretariat')
                                <td>{{ $student->note_final_module_1 }}</td>
                                <td>{{ $student->note_final_module_2 }}</td>
                                <td>{{ $student->moyenne_doctorat }}</td>
                                <td style="display:none;">{{ $student->speciality->name }}</td>
                            @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
                
            </div>
        </div>    
    </div>
</div>
@endsection
