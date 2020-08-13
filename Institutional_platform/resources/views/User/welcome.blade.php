

{{-- This is the view for the admin main page. It contains the list of all subjects with links to host exam, add questions, view results, it also has a navbar with links to the students page --}}

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name ="_token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Class</title>
  <!-- jquery link -->
  <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">
</head>

  <body>
  <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark text-right">
    <a href="{{route('home')}}" class="navbar-brand">{{$currentInstitution->name}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="navbar-nav ml-auto">
        
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link " href="{{route('home')}}">Dashboard</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="{{route('User-Courses')}}">My Courses</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="#">Results</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
          <a class="nav-link" href="#">Messages<i class="fas fa-bell ml-2"></i></a> 
          </li>
          <li class="nav-item m-auto pl-lg-5">
          <a class="nav-link" href="{{route('logout')}}">Sign out</a> 
          </li>

      </ul>
     
    </div>
  </nav>

   <body style="background-color:indigo">
   <div class="container mt-5 pt-5" >
        <div class = "row">
            <div class ="col-md-3 col-xl-3 col-sm-3">
                <h6 style="color:red">Name: <span class ="text-success">{{$currentUser->name}}</span></h6>
            </div>
            <div class ="col-md-3 col-xl-3 col-sm-3">
                <h6 style="float:center;color:red">Class: <span class ="text-success">{{$userClass->class}}</span></h6>
            </div>
            <div class ="col-md-6 col-xl-6 col-sm-6">        
                <h6 style="color:red">Email: <span class ="text-success">{{$currentUser->email}}</span></h6>
            </div>
        </div>

        <div id = "courses">
            <h4 style="float:center;margin-top:50px;" >Register My Courses</h4>

            <form method = 'post' action = "{{route('User-Subject')}}">
                @csrf
                @foreach($userClassSubjects as $Subjects)
                <input type="checkbox" name = "subject[]" value = "{{$Subjects->Subjectname}}"style="height:20px;width:20px;"><span class ="pl-3" style="color:white"><b>{{$Subjects->Subjectname}}</b><br>
                @endforeach
                <input type ="submit" value ="Add">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    </div>
  </body>
  
</html>