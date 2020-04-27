@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add a new role</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped data-table" id="myTable">
                    <thead>
                        <tr>
                            <th style="width: 10%">#id</th>
                            <th >Name</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td><a href="{{ route('roles.edit',$role->id) }}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{route('roles.delete',$role->id)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
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