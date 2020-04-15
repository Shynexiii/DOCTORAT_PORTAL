@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('students.create') }}" class="btn btn-primary d-inline p-2"><i class="fas fa-plus"></i> Add list of students</a>   
                <form action="{{ route('students.secrete_code') }}" method="POST" class="d-inline ">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Generate a secret code</button>
                </form>

            </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="width: 11%">Registration number</th>
                            <th style="width: 10%">Name Fr</th>
                            <th style="width: 10%">Name Ar</th>
                            <th style="width: 10%">Speciality</th>
                            <th style="width: 10%">Date of Birth</th>
                            <th style="width: 12%">Place of Birth</th>
                            <th style="width: 12.3%">Secrete code</th>
                            <th style="width: 8.6%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->register_number }}</td>
                                <td>{{ $student->first_name_fr }} {{ $student->last_name_fr }}</td>
                                <td>{{ $student->first_name_ar }} {{ $student->last_name_ar }}</td>
                                <td>{{ $student->speciality->name }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->place_of_birth }}</td>
                                <td>{{ $student->secrete_code }}</td>
                                <td><a href="{{ route('students.edit',$student->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{route('students.delete',$student->id)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
                <nav aria-label="Page navigation">
                    <div class="my-3">
                        <ul class="pagination justify-content-end">
                            {{ $students->links() }}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>    
    </div>
</div>
@endsection
