@extends('layouts.master')
@section('title','Teachers')

@section('content')
<div class="card">
    <div class="card-header">
    <a href="{{ route('teachers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add a new teacher</a>
        </div>
        <div class="card-body">
            <table id="teachersTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Speciality</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $teacher->first_name }}</td>
                            <td>{{ $teacher->last_name }}</td>
                            <td>{{ $teacher->speciality->name }}</td>
                            <td><span class="badge badge-pill {{$teacher->status == 1 ? 'badge-success' : 'badge-danger'  }}">{{ $teacher->status == 1 ? 'Available' : 'Unavailable'}}</span></td>
                            <td><a href="{{ route('teachers.edit',$teacher->id) }}" class="btn btn-success"><i class="fas fa-edit"></i>  Edit</a>
                            <button type="button" id="{{ $teacher->id }}" class="btn btn-danger teacherDeleteBtn"><i class="fas fa-trash-alt"></i> Delete</button>
                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
            {{-- <nav aria-label="Page navigation">
                <div class="my-3">
                    <ul class="pagination justify-content-end">
                        {{ $teachers->links() }}
                    </ul>
                </div>
            </nav> --}}
        </div>
    </div>    
@include('teachers.modal')
@endsection