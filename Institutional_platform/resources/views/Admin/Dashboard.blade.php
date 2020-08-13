

{{-- This is the view for the admin main page. It contains the list of all subjects with links to host exam, add questions, view results, it also has a navbar with links to the students page --}}

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">
  
</head>

  <body>
  <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark text-right">
    <a href="{{route('dashboard')}}" class="navbar-brand">{{$currentInstitution->name}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link " href="{{route('dashboard')}}">Dashboard</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="#">Subject</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="{{route('Class-Section')}}">Class</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="#">Student</a>
          </li>

          <li class="nav-item m-auto pl-lg-5">
            <a class="nav-link" href="{{route('Admin-Section')}}">Admin</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="#">Results</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
          <a class="nav-link" href="#">Messages<i class="fas fa-bell ml-2"></i></a> 
          </li>
          <li class="nav-item m-auto pl-lg-5">
          <a class="nav-link" href="{{route('admin-logout')}}">Sign out</a> 
          </li>
      </ul>
     
    </div>
  </nav>
  

  <div class = "jumbotron">
      <h3>{{$currentInstitution->name}}</h3>
  </div>

  <div id="myCarousel" class="carousel slide"> 
    <!-- Carousel indicators --> 
    <ol class="carousel-indicators"> 
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
      <li data-target="#myCarousel" data-slide-to="1"></li> 
      <li data-target="#myCarousel" data-slide-to="2"></li> 
    </ol>
    <!-- Carousel items --> 
    <div class="carousel-inner"> 
      <div class="item active"> 
        <img src="{{URL::asset('img/paris1.jpg')}}" alt="First slide"> </div> 
        <div class="item"> <img src="{{URL::asset('img/paris.jpg')}}" alt="Second slide"> </div> 
        <div class="item"> <img src="{{URL::asset('img/paris2.jpg')}}" alt="Third slide"> </div> 
      </div>
      <!-- Carousel nav --> 
      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a> 
      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> 
  </div>

  <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
  </body>
</html>
