@extends('layouts.master')
@section('title','Roles')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            {{-- <div class="card-header">
                <button  type="button" name="createRoleBtn" id="createRoleBtn" class="d-inline btn btn-primary">
                    <i class="fas fa-plus"></i> Add a new role
                </button>    
            </div> --}}
            <div class="card-body">
                <table class="table table-bordered table-striped data-table" id="rolesTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>            
            </div>
        </div>    
    </div>
</div>

@include('roles.modal')
@include('roles.deleteModal')
@endsection