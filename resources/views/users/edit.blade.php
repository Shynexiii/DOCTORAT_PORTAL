@extends('layouts.master')

@section('content')
  <div class="col-md-10 mx-auto">
    <div class="card">
      <div class="card-body">
        <form action="{{route('users.update',$user)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >First name</label>
              <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') ?? $user->first_name }}" name="first_name" placeholder="First name">
              
            </div>
            <div class="form-group col-md-6">
              <label >Last name</label>
              <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('last_name') ?? $user->last_name }}" name="last_name" placeholder="Last name">
              
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}" name="email" placeholder="Email">
              
            </div>
            <div class="form-group col-md-6">
              <label >Password</label>
              <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
              
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Date of Birth</label>
              <input type="text" class="form-control @error('Date_Of_Birth') is-invalid @enderror" value="{{ old('Date_Of_Birth') ?? $user->Date_Of_Birth }}" name="Date_Of_Birth" placeholder="eg: 01/01/2020">
              
            </div>
            <div class="form-group col-md-6">
              <label >Phone number</label>
              <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') ?? $user->phone_number }}" name="phone_number" placeholder="Phone number">
              
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >User role</label>
                @foreach ($roles as $role)
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" @if($user->roles->pluck('id')->contains($role->id)) checked @endif value="{{$role->id}}">
                        <label class="form-check-label">{{ $role->name }}</label>
                      
                      </div>
                @endforeach
            </div>
            <div class="form-group col-md-6">
              <label >Speciality</label>
              <select class="form-control @error('speciality') is-invalid @enderror" name="speciality">
                <option selected disabled>Choose...</option>
                @foreach ($specialities as $speciality)
                  <option value="{{$speciality->id}}" @if($user->speciality) {{ ( $user->speciality_id == $speciality->id) ? 'selected' : '' }} @endif>{{$speciality->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-3">Save</button>
        </form>
      </div>
    </div>
  </div>
@stop