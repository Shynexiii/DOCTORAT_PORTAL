@extends('layouts.master')
@section('title','Specialities')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('specialities.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add a new speciality</a></a>   
            </div>
            
            <div class="card-body">
                <table id="specialitiesTable" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Number of students</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialities as $speciality)
                            <tr>
                                <td>{{ $speciality->name }}</td>
                                <td>{{ $speciality->loadCount('students')->students_count }}</td>
                                <td><a href="{{ route('specialities.edit',$speciality->id) }}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                                <a href="{{ route('students.list',$speciality->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i> Students</a>
                                <button type="button" id="{{ $speciality->id }}" class="btn btn-danger specialityDeleteBtn"><i class="fas fa-trash-alt"></i> Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>
        </div>    
    </div>
</div>
@include('specialities.modal')
@endsection
