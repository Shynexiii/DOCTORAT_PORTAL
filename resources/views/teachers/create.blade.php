@extends('layouts.master')

@section('content')
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{route('teachers.store')}}" method="POST">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >First name</label>
              <input type="text" class="form-control " value="{{ old('first_name') ?? "" }}" name="first_name" placeholder="First name">
              
            </div>
            <div class="form-group col-md-6">
              <label >Last name</label>
              <input type="text" class="form-control " value="{{ old('last_name') ?? "" }}" name="last_name" placeholder="Last name">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Speciality</label>
              <select class="form-control" name="speciality">
                <option selected disabled>Choose...</option>
                @foreach ($specialities as $speciality)
                  <option value="{{$speciality->id ?? @old('speciality')}}">{{$speciality->name}}</option>
                @endforeach
              </select>            
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-3">Create</button>
        </form>
      </div>
    </div>
  </div>
@stop

