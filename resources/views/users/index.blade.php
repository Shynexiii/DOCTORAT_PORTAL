@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add a new user</a>
        </div>
        <div class="card-body">
            <table id="usersTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone number</th>
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
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ implode($user->roles()->get()->pluck('name')->toArray())}}</td>
                            <td><a href="{{ route('users.edit',$user->id) }}" class="btn btn-success"><i class="fas fa-edit"></i>  Edit</a>
                            <form action="{{route('users.delete',$user)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
            
        </div>
    </div>    
@endsection