@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Add a new role</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td><a href="{{ route('roles.edit',$role->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{route('roles.delete',$role->id)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
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
                            {{ $roles->links() }}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>    
    </div>
</div>
@endsection