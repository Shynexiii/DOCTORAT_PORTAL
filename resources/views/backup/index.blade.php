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
                                <td>
                                    <form action="{{ route('backup.download') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="file_name" value="{{ $item['file_path'] }}">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-download"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>
        </div>    
    </div>
</div>

@stop