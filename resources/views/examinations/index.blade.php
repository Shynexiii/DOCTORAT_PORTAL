@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('examinations.create') }}" class="btn btn-primary">Add a new examination</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="">#id</th>
                            <th ></th>
                            <th style=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($examinations as $examination)
                            <tr>
                                <td></td>
                                <td></td>
                                <td><a href="{{ route('examination.edit',$examination->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{route('examination.delete',$examination->id)}}" method="POST" class="d-inline">
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
                            {{ $examinations->links() }}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>    
    </div>
</div>
@endsection