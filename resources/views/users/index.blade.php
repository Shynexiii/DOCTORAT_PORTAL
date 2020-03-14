@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add a new user</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
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
                            <td><a href="{{ route('users.edit',$user->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{route('users.delete',$user)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
            <nav aria-label="Page navigation">
                <div class="my-3">
                    <ul class="pagination justify-content-end">
                        {{ $users->links() }}
                    </ul>
                </div>
            </nav>
        </div>
    </div>    
@endsection