<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Doctorat | @yield('title', 'Project')</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      @can('admin')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      @endcan
    </ul>

    {{-- <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @canany(['admin','secretariat','coding'])
      <li class="nav-item ">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn font-weight-light" type="submit">{{ __('Logout') }} <span class="fas fa-sign-out-alt "></span></button>
            
        </form>
      </li>
      @endcanany
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @canany(['coding','secretariat'])
      <a href="{{route('home')}}" class="btn-link disabled brand-link ">
        <span class="brand-text font-weight-light">Doctorat Portal</span>
      </a>
    @elsecanany(['admin'])
      <a href="{{route('home')}}" class="brand-link">
        <span class="brand-text font-weight-light">Doctorat Portal</span>
      </a>
    @endcanany
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <span class="text-uppercase" data-letters="{{ substr(Auth::user()->first_name,0 ,1)  }}{{ substr(Auth::user()->last_name,0 ,1)  }}"></span>
        </div>
        <div class="info">
          <span class="font-weight-light text-light">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @canany(['admin','coding'])         
            <li class="nav-item">
              <a href="{{route('students.index')}}" class="nav-link {{ (request()->is('students*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Student</p>
              </a>
            </li>
            @endcanany
            @canany(['admin','secretariat'])
            <li class="nav-item ">
              <a href="{{route('notes.index')}}" class="nav-link {{ (request()->is('notes*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Notes</p>
              </a>
            </li>
               
          <li class="nav-item">
            <a href="{{route('teachers.index')}}" class="nav-link {{ (request()->is('teachers*')) ? 'active' : '' }}">
              <i class="nav-icon far fa-edit"></i>
              <p>Teachers</p>
            </a>
          </li>
          @endcanany 
          @can('admin')
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>Users</p>
            </a>
          </li>
          {{-- <li class="nav-item ">
            <a href="{{route('roles.index')}}" class="nav-link {{ (request()->is('roles*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Roles</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('specialities.index')}}" class="nav-link {{ (request()->is('specialities*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-university"></i>
              <p>Specialities</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('backup.index')}}" class="nav-link {{ (request()->is('backup*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-download"></i>
              <p>Backup</p>
            </a>
          </li>
          @endif
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title','')</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            </ol>
          </div> --}}<!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md">
            @include('inc.message')
            @yield('content')
            
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      The TEAM
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2020 <a href="{{ route('home')}}">Doctorat.test</a>.</strong> All rights reserved.
  </footer>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
@include('inc.script')
@include('inc.Chart')

</body>
</html>
