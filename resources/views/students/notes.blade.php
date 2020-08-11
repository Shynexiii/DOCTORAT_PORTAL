@extends('layouts.master')
@section('title','Notes')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            {{-- <div class="card-header">
                <small id="emailHelp" class="form-text font-weight-bold text-danger">* The red boxes require a third correction.</small>
            </div> --}}
            <div class="card-body">
                <table id="notesTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th rowspan="2" scope="col" class="text-center">Secrete code</th>
                            <th colspan="4" scope="col" >Speciality field </th>
                            <th colspan="4" scope="col" >General knowledge field</th>
                            <th rowspan="2" scope="col" class="text-center">Overall average</th>
                            <th rowspan="2" scope="col" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th>Note 1</th>
                            <th>Note 2</th>
                            <th class="oui">Note 3</th>
                            <th>Average</th>
                            <th>Note 1</th>
                            <th>Note 2</th>
                            <th>Note 3</th>
                            <th>Average</th>
                        </tr>
                    </thead>
                </table>            
                </nav>
            </div>
        </div>    
    </div>
</div>
@include('students.noteModal')
@stop