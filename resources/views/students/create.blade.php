@extends('layouts.master')

@section('content')

  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label >Speciality</label>
            <select class="form-control" name="speciality">
              <option selected disabled>Choose...</option>
              @foreach ($specialities as $speciality)
                <option value="{{$speciality->id ?? @old('speciality')}}">{{$speciality->name}}</option>
              @endforeach
              </select>            
          </div>
          <div class="form-group">
              <label >Upload students list</label>
            <div class="input-group">
              <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="inputFile01">
                  <label class="custom-file-label">Choose excel file...</label>                  
              </div>
            </div>            
          </div>        
          <button type="submit" class="btn btn-primary w-3">Create</button>
        </form>
      </div>
    </div>
  </div>
@stop