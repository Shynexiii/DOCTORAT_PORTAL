@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $studentAdmitted + $studentNonAdmitted }}</h3>
                    <p>Students</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('students.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $studentAdmitted }}</h3>
                    <p>Students Admitted</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <a href="#studentAdmitted" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $speciality->count() }}</h3>
                    <p>Specialities</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <a href="{{ route('specialities.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $staff }}</h3>
                    <p>Staff</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">{!! $chartAdmission->options['title']['text'] !!}</h3>
                </div>
                <div id="studentAdmitted" class="card-body">
                    {!! $chartAdmission->container() !!}
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title"> {!! $chartSpeciality->options['title']['text'] !!}</h3>
                </div>
                <div class="card-body">
                    {!! $chartSpeciality->container() !!}
                </div>        
            </div>
        </div>
    </div>
{!! $chartAdmission->script() !!}
{!! $chartSpeciality->script() !!}

@endsection
