@extends('layouts.master')
@section('title', 'Download')

@section('content')

<div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{route('students.download')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label >Speciality name</label>
            <select class="form-control @error('name') is-invalid @enderror" name="speciality">
              <option selected disabled>Choose...</option>
              @foreach ($specialities as $speciality)
                <option value="{{$speciality->id ?? @old('speciality')}}">{{$speciality->name}}</option>
              @endforeach
              </select>
              {{-- @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span> --}}
              @enderror            
          </div>    
          <button type="submit" class="btn btn-primary w-3"><i class="fas fa-file-download"></i> Download</button>
        </form>
      </div>
    </div>
  </div>

@stop