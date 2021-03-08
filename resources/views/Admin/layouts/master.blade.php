<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title> @yield('title') </title>
    <!-- <link rel="stylesheet" href="{{ url('/css/sign-in-page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/js/sign-in-page/js/css/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ url('/js/lazysizes.min.js')}}"> -->
    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <!-- lazysizes link -->

    <script src="https://afarkas.github.io/lazysizes/plugins/respimg/ls.respimg.min.js"></script>
    <script src="https://afarkas.github.io/lazysizes/plugins/parent-fit/ls.parent-fit.min.js"></script>
    <script src="https://afarkas.github.io/lazysizes/plugins/object-fit/ls.object-fit.min.js"></script>

    <script src="https://afarkas.github.io/lazysizes/plugins/blur-up/ls.blur-up.min.js"></script>
    <script src="https://afarkas.github.io/lazysizes/lazysizes.min.js"></script>
    <link rel="stylesheet" href="{{ url('/js/lazysizes.min.js')}}">
    <!-- include libraries(jQuery, bootstrap) -->

    <!-- include summernote css/js -->
    <link href="{{ url('/css/summernote-bs4.min.css')}}" rel="stylesheet">
    <link href="{{ url('/js/summernote-bs4.min.js')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- Low Quality Image Placeholder) -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap');

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

        .jumbotron {
            margin-top: 180px;
            clear: top;
        }

        .pagination-nav {
            margin-left: 250px;
        }

        html {
            overflow-x: hidden;

        }

        /* navbar */
        .sign-out {
            background-color: #084ba2;
            border-radius: 7px;
            color: white !important;
            transition: 0.2s ease-out;
        }

        .sign-out:hover {
            background-color: #073f89;
        }

        /* =================================== */
        .heading-text {
            width: 100vw;
            background-size: cover;
            background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url("https://res.cloudinary.com/tmakinde/image/upload/q_auto:low/Myinstitution%20Images/img3_u2mek3.jpg");
            background: -webkit-linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url("https://res.cloudinary.com/tmakinde/image/upload/q_auto:low/Myinstitution%20Images/img3_u2mek3.jpg");
            background-attachment: fixed;
            overflow-x: hidden;

        }

        .heading-text h2 {
            font-family: 'Open Sans', sans-serif;
            ;
          
            padding: 13vh 0px 13vh 0px;
            color: #E7E5DF;
            font-weight: bolder;

        }

        .heading-text img {

            padding: 0;
            width: 100vw;


        }

        .about-img {
            width: 100%;
            border-radius: 54% 46% 22% 78% / 43% 53% 47% 57%;
            border: 0.2px solid #eeeeef;
        }

        p{
            font-size: 17px !important;
        }

    </style>

<body>

    <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
        <a class="navbar-brand p-0 m-0" href="#">{{$currentInstitution->name}}</a>

        <button class="navbar-toggler mr-0" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item m-auto">
                    <a class=" nav-link text-primary " href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item m-auto">
                    <a class="nav-link text-primary" href="#">Subject</a>
                </li>
                <li class="nav-item m-auto">
                    <a class="nav-link text-primary" href="{{route('Class-Section')}}">Class</a>
                </li>
                <li class="nav-item m-auto">
                    <a class="nav-link text-primary" href="#">Student</a>
                </li>

                <li class="nav-item m-auto">
                    <a class="nav-link text-primary" href="{{route('Admin-Section')}}">Admin</a>
                </li>

                <li class="nav-item m-auto">
                    <a class="nav-link text-primary" href="#">Messages<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill ml-1" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                        </svg><i class="fas fa-bell ml-2"></i></a>
                </li>
                <li class="nav-item m-auto">
                    <a class="nav-link sign-out px-2" href="{{route('admin-logout')}}">Sign out</a>
                </li>
            </ul>
        </div>
    </nav>


    @yield('content')


    @section('scripts')
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="{{asset('/js/assets/js/modernizr-latest.js')}}">
    </script>
    <link href="{{url('/js/assets/js/jquery.min.js')}}">
    </script>
    <link href="{{url('/js/assets/js/fancybox/jquery.fancybox.pack.js')}}">
    </script>

    <link href="{{url('/js/assets/js/jquery.mobile.customized.min.js')}}">
    </script>
    <link href="{{url('/js/assets/js/jquery.easing.1.3.js')}}">
    </script>
    <link href="{{url('/js/assets/js/camera.min.js')}}">
    </script>
    <link href="{{url('/js/assets/js/bootstrap.min.js')}}">
    </script>
    <link href="{{url('/js/assets/js/custom.js')}}">
    </script>

    @show
</body>

</html>