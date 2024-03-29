@extends('layouts.master')

@section('content')
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('students.addNote',['speciality'=>$speciality->id,'student'=>$student->id])}}" method="POST">
          @csrf
          @method('PATCH')
          <label>Module 1</label>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Note 1</label>
              <input type="text" class="form-control" name="module_1_note1" value="{{ $student->module_1_note_1 ?? old('note1') }}" placeholder="Note 1">
            </div>  
            <div class="form-group col-md-6">
              <label >Note 2</label>
              <input type="text" class="form-control" name="module_1_note2" value="{{ $student->module_1_note_2 ?? old('note2') }}" placeholder="Note 2">
            </div>
          </div> 
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Note 3</label>
              <input type="text" class="form-control" name="module_1_note3" value="{{ $student->module_1_note_3 ?? old('note3') }}" placeholder="Note 3" >
            </div>
          </div>
          <hr>
          <label>Module 2</label>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Note 1</label>
              <input type="text" class="form-control" name="module_2_note1" value="{{ $student->module_2_note_1 ?? old('note1') }}" placeholder="Note 1">
            </div>  
            <div class="form-group col-md-6">
              <label >Note 2</label>
              <input type="text" class="form-control" name="module_2_note2" value="{{ $student->module_2_note_2 ?? old('note2') }}" placeholder="Note 2">
            </div>
          </div> 
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Note 3</label>
              <input type="text" class="form-control" name="module_2_note3" value="{{ $student->module_2_note_3 ?? old('note3') }}" placeholder="Note 3">
            </div>
          </div>     
          <button type="submit" class="btn btn-primary w-3">Save note</button>
        </form>
      </div>
    </div>
  </div>
@stop