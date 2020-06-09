@extends('layouts.master')
@section('title','Backup')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <form action="{{ route('backup.create') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create New Backup</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped data-table" id="backupsTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Size</th>
                            <th width="3%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($backup as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item['file_name'] }}</td>
                                <td>{{ $item['file_date'] }}</td>
                                <td>{{ $item['file_size'] }}</td>
                                <td><a href="{{ $item['file_path'] }}"><i class="fas fa-download"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>
        </div>    
    </div>
</div>

@stop