@extends('layouts.master')

@section('content')
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{route('users.store')}}" method="POST">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >First name</label>
              <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') ?? "" }}" name="first_name" placeholder="First name">
              @error('first_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label >Last name</label>
              <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') ?? "" }}" name="last_name" placeholder="Last name">
              @error('last_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? "" }}" name="email" placeholder="Email">
              @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label >Password</label>
              <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
              @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Date of Birth</label>
              <input type="text" class="form-control @error('Date_Of_Birth') is-invalid @enderror" value="{{ old('Date_Of_Birth') ?? "" }}" name="Date_Of_Birth" placeholder="eg: 01/01/2020">
              @error('Date_Of_Birth')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label >Phone number</label>
              <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') ?? "" }}" name="phone_number" placeholder="Phone number">
              @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >User role</label>
              <select class="form-control @error('role') is-invalid @enderror" name="role">
                <option selected disabled>Choose...</option>
                @foreach ($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
                </select>
              @error('role')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-3">Create</button>
        </form>
      </div>
    </div>
  </div>
@stop