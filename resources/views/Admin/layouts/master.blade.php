<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name ="_token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <!-- jquery link -->
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- include summernote css/js -->
    
    <style>
        .jumbotron{
            margin-top:180px;clear:top;
        }
        .pagination-nav{
            margin-left:250px;
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
                    <a class="nav-link" href="#">Messages<i class="fas fa-bell ml-2"></i></a> 
                    </li>
                    <li class="nav-item m-auto pl-lg-5">
                    <a class="nav-link" href="{{route('admin-logout')}}">Sign out</a> 
                    </li>
                </ul>
            </div>
        </nav>
       

        @yield('content')
        
        
        @section('scripts')
        <!-- include libraries(jQuery, bootstrap) -->
   
        <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
        @show
    </body>
</html>