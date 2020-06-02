@extends('layouts.master')

@section('content')
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('specialities.update',$speciality) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label >Speciality name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="speciality" value="{{ $speciality->name ?? old('name') }}" placeholder="Speciality name">
          </div>    
          <button type="submit" class="btn btn-primary w-3">Update speciality</button>
        </form>
      </div>
    </div>
  </div>
@stop