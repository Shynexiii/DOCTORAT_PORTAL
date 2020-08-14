@extends('layouts.master')

@section('content')
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{route('teachers.update',$teacher)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >First name</label>
              <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') ?? $teacher->first_name }}" name="first_name" placeholder="First name">
            </div>
            <div class="form-group col-md-6">
              <label >Last name</label>
              <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') ?? $teacher->last_name }}" name="last_name" placeholder="Last name">
            </div>
          </div>
          <div class="form-row">
            @can('admin')
            <div class="form-group col-md-6">
              <label >Speciality</label>
              <select class="form-control @error('speciality') is-invalid @enderror" name="speciality">
                <option selected disabled>Choose...</option>
                @foreach ($specialities as $speciality)
                  <option value="{{$speciality->id }}" @if($speciality->name == $teacher->speciality->name)  {{'selected="selected"'}}@endif>{{ $speciality->name }}</option>
                @endforeach
              </select>            
            </div>
            @endcan
            <div class="form-group col">
              <label >Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="0" @if($teacher->status == 0) checked @endif>
                <label class="form-check-label">Unavailable</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" @if($teacher->status == 1) checked @endif>
                <label class="form-check-label">Available</label>
              </div>
            </div>
          </div>
            
          <button type="submit" class="btn btn-primary w-3">Save</button>
        </form>
      </div>
    </div>
  </div>
@stop