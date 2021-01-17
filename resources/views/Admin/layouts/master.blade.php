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
    
    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('js/sign-in-page/js/css/bootstrap.min.js') }}">
    <script type='text/javascript' src="{{asset('/js/lazysizes.min.js')}}"></script>
    <!-- jquery link -->
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    
    <!-- lazysizes link -->
    
    <script src="https://afarkas.github.io/lazysizes/plugins/respimg/ls.respimg.min.js"></script>
    <script src="https://afarkas.github.io/lazysizes/plugins/parent-fit/ls.parent-fit.min.js"></script>
    <script src="https://afarkas.github.io/lazysizes/plugins/object-fit/ls.object-fit.min.js"></script>

    <script src="https://afarkas.github.io/lazysizes/plugins/blur-up/ls.blur-up.min.js"></script>
    <script src="https://afarkas.github.io/lazysizes/lazysizes.min.js"></script>
    <script src="lazysizes.min.js" async=""></script>
    <!-- include libraries(jQuery, bootstrap) -->

    <!-- include summernote css/js -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- Low Quality Image Placeholder) -->
    <style>
        .blur-up {
            -webkit-filter: blur(5px);
            filter: blur(5px);
            transition: filter 400ms, -webkit-filter 400ms;
        }

        .blur-up.lazyloaded {
            -webkit-filter: blur(0);
            filter: blur(0);
        }

        .fade-box .lazyload,
        .fade-box .lazyloading {
            opacity: 0;
            transition: opacity 400ms;
        }

        .fade-box img.lazyloaded {
            opacity: 1;

        }
        .wrapper {
            margin: auto;
            width: 80%;
            min-width: 320px;
            max-width: 900px;
            }

        .mediabox-img.ls-blur-up-is-loading,
        .mediabox-img.lazyload:not([src]) {
        visibility: hidden;
        }

        .mediabox {
        padding-bottom: 66.6667%;
        }

        .ls-blur-up-img,
        .mediabox-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: block;
        font-family: "blur-up: always", "object-fit: cover";
        object-fit: cover;
        }

        .ls-blur-up-img {
        filter: blur(10px);
        opacity: 1;
        transition: opacity 1000ms, filter 1500ms;
        }

        .ls-blur-up-img.ls-inview.ls-original-loaded {
        opacity: 0;
        filter: blur(5px);
        }
    </style>
    
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
