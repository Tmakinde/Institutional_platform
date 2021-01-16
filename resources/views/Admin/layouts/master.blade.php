<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name ="_token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ url('css/assets/css/font-awesome.min.css')}}"> 
	<link rel="stylesheet" href="{{ url('css/assets/css/bootstrap-theme.css')}}" media="screen"> 
	<link rel="stylesheet" href="{{ url('css/assets/css/style.css')}}">
    <link rel='stylesheet' id='camera-css' href="{{ url('css/assets/css/camera.css')}}" type='text/css' media='all'>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> 

    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('js/sign-in-page/js/css/bootstrap.min.js') }}">
    <!-- jquery link -->
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- include libraries(jQuery, bootstrap) -->

    <!-- include summernote css/js -->
    

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
            <h3 style="color: red">{{$currentInstitution->name}}</h3>
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
        <script src="{{asset('js/assets/js/modernizr-latest.js')}}"></script> 
        <script type='text/javascript' src="{{asset('js/assets/js/jquery.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/assets/js/fancybox/jquery.fancybox.pack.js')}}"></script>
        
        <script type='text/javascript' src="{{asset('js/assets/js/jquery.mobile.customized.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/assets/js/jquery.easing.1.3.js')}}"></script> 
        <script type='text/javascript' src="{{asset('js/assets/js/camera.min.js')}}"></script> 
        <script src="{{asset('js/assets/js/bootstrap.min.js')}}"></script> 
        <script src="{{asset('js/assets/js/custom.js')}}"></script>
        <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: "{{URL::asset('img/')}}"
			});

		});
      
	</script>
        @show
    </body>
</html>
