@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table id="notesTable" class="table table-bordered table-striped table-sm" align="center">
                    <thead>
                        <tr>
                            <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Secrete code</th>
                            <th colspan="4" scope="col" >Speciality field </th>
                            <th colspan="4" scope="col" >General knowledge field</th>
                            <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Overall average</th>
                            <th rowspan="2" scope="col" style="vertical-align : middle;text-align:center;">Action</th>
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