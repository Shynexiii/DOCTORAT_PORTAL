@extends('layouts.master')
@section('title','Users')

@section('content')
<div class="card">
    <div class="card-header">
    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add a new user</a>
    <a href="{{ route('users.pdf') }}" class="btn btn-success"><i class="fas fa-download"></i> Download users</a>
        </div>
        <div class="card-body">
            <table id="usersTable" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Speciality</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->speciality->name ?? 'Undifined' }}</td>
                            <td>{{ implode($user->roles()->get()->pluck('name')->toArray())}}</td>
                            <td><a href="{{ route('users.edit',$user->id) }}" class="btn btn-success"><i class="fas fa-edit"></i>  Edit</a>
                            <button type="button" {{ Auth::user()->id == $user->id ? 'disabled' : '' }} id="{{ $user->id }}" class="btn btn-danger userDeleteBtn"><i class="fas fa-trash-alt"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
            
        </div>
    </div> 
@include('users.modal')
@endsection