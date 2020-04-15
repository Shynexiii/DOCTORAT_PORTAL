@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">  
                <form action="{{ route('students.secrete_code') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Generate a secret code</button>
                </form>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="width: 11%">Registration number</th>
                            <th style="width: 10%">First name</th>
                            <th style="width: 10%">Last name</th>
                            <th style="width: 10%">Date of Birth</th>
                            <th style="width: 10%">Module 1</th>
                            <th style="width: 10%">Module 2</th>
                            <th style="width: 10%">Average</th>
                            <th style="width: 10%">Secrete code</th>
                            <th style="width: 17.5%">Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialities as $student)
                            <tr>
                                <td>{{ $student->register_number }}</td>
                                <td>{{ $student->first_name_fr }}</td>
                                <td>{{ $student->last_name_fr }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->note_final_module_1 }}</td>
                                <td>{{ $student->note_final_module_2 }}</td>
                                <td>{{ $student->moyenne_doctorat }}</td>
                                <td>{{ $student->secrete_code }}</td>
                                <td>
                                <a href="{{ route('students.editModule1',['speciality'=>$student->speciality->id,'student'=>$student->id]) }}" class="btn btn-success">Module</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
                <nav aria-label="Page navigation">
                    <div class="my-3">
                        <ul class="pagination justify-content-end">
                            {{ $specialities->links() }}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>    
    </div>
</div>
@endsection
