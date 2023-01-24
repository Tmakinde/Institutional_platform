<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <!-- jquery link -->
  <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">

  <!-- include libraries(jQuery, bootstrap) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    
    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    
    <style>
        .jumbotron{
            margin-top:180px;clear:top;
        }
        .pagination-nav{
            margin-left:250px;
        }
        html,
		body {
			background-color: #fff;
			color: #636b6f;
			font-family: 'Nunito', sans-serif;
			font-weight: 100;
			height: 100vh;
			margin: 0;
		}

		.full-height {
			height: 100vh;
		}

		.flex-center {
			align-items: center;
			display: flex;
			justify-content: center;
		}

		.position-ref {
			position: relative;
		}

		.code {
			border-right: 2px solid;
			font-size: 26px;
			padding: 0 15px 0 15px;
			text-align: center;
		}

		.message {
			font-size: 18px;
			text-align: center;
		}
    </style>
</head>

  <body id ="body">
    <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark text-right">
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item m-auto">
                    <a class="nav-link " href="{{route('home')}}">Dashboard</a>
                </li>
                <li class="nav-item m-auto">
                    <a class="nav-link" href="{{route('User-Courses')}}">My Courses</a>
                </li>
                <!-- <li class="nav-item m-auto">
                    <a class="nav-link" href="#">Results</a>
                </li> -->
                <li class="nav-item m-auto">
                <a class="nav-link" href="#">Messages<i class="fas fa-bell ml-2"></i></a> 
                </li>
                <li class="nav-item m-auto">
                <a class="nav-link" href="{{route('logout')}}">Sign out</a> 
                </li>
            </ul>
        </div>
    </nav>
        @yield('content')

        @yield('scripts')
        <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>  
        @show
    </body>
</html>
