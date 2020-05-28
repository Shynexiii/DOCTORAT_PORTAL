@extends('layouts.master')

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

            </div>
            
            <div class="card-body">
                <table id="studentsTable" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="">Registration number</th>
                            <th style="">Name Fr</th>
                            <th style="">Name Fr</th>
                            <th style="">Speciality</th>
                            <th style="">Secrete code</th>
                            <th style="">Action</th>
                        
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->register_number }}</td>
                                <td>{{ $student->first_name_fr }} {{ $student->last_name_fr }}</td>
                                <td>{{ $student->first_name_ar }} {{ $student->last_name_ar }}</td>
                                <td>{{ $student->speciality->name }}</td>
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
                    </tbody> --}}
                </table>            
                
            </div>
        </div>    
    </div>
</div>
@endsection
