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

        .navbar-brand img {
            width: 50px;
        }

        .navbar-brand span {
            line-height: 20px;
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

            padding: 20vh 0px 20vh 0px;
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

        p {
            font-size: 17px !important;
        }

        .icons svg {
            transition: 0.3s ease-out;

        }

        .icons svg:hover {
            transform: scale(1.2);
            transition: 0.3s ease-out;
        }

        .footer-link {
            text-decoration: none !important;
        }

        footer {
            background: rgba(0, 0, 0, 0.08);
        }

        footer img {
            width: 100vw;
            padding: 0;
        }

        footer .container {
            max-width: 500px;
        }

        .footer-logo {
            width: 80px;
        }
    </style>

<body>

    <nav class="shadow navbar navbar-expand-lg fixed-top bg-light navbar-light">
        <a class="navbar-brand p-0 m-0" href="#"> <img src="https://res.cloudinary.com/sam-kay/image/upload/q_auto:low/tolu/logo_ykw2fx.png" alt=""><span>{{$currentInstitution->name}}</span></a>

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
    <footer class="pb-0 mb-0 bg-">
        <img src="https://res.cloudinary.com/sam-kay/image/upload/q_auto:low/tolu/inverted2_rnforb.png" alt="">
        <div class="container text-center">
            <img src="https://res.cloudinary.com/sam-kay/image/upload/q_auto:low/tolu/logo_ykw2fx.png" alt="" class="mb-4 footer-logo">
            <div class="row mb-4">
                <div class="col text-center text-primary">
                    <h5><a href="" class="footer-link mt-3"> Subject</a></h5>
                </div>
                <div class="col text-center text-primary">
                    <h5><a href="" class="footer-link mt-3">Class</a></h5>
                </div>

                <div class="col text-center text-primary">
                    <h5><a href="" class="footer-link mt-3">Stuent</a></h5>
                </div>
                <div class="col  text-primary text-center">
                    <h5><a href="" class="footer-link mt-5">Admin</a></h5>
                </div>
            </div>
            <div class="icons mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook m-2" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter m-2" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram m-2" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>

            </div>

        </div>
        <p class="mb-0 bg-dark text-white text-center"> T_Makinde &#169;2021. All rights reserved
        </p>
    </footer>

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