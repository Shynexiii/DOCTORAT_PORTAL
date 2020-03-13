@extends('layouts.master')

@section('content')
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{route('roles.store')}}" method="POST">
          @csrf
            <div class="form-group">
              <label >Name of role</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? "" }}" name="name" placeholder="Name">
              @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>        
          <button type="submit" class="btn btn-primary w-3">Create</button>
        </form>
      </div>
    </div>
  </div>
@stop