@extends('auth.authlayout')
@section('title')
Alakada | Institution | Register
@endsection
@section("custom_css")

<link href="{{asset('backend/assets/build/css/intlTelInput.css')}}" rel="stylesheet" type="text/css" />

@stop

@section('content')
<nav id="navbar-main" style="background-color: #C124BB;" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-white" href="/">
        Alakada
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('admin-login')}}" class="nav-link">
              <span class="nav-link-inner--text text-white">Login Admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin-register')}}" class="nav-link">
              <span class="nav-link-inner--text text-white">Register Institution</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-4 bg-white">
            <div class=" m-h-100">
                <div class="account-pages pt-5">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="{{ url('/') }}">
                                                <img src="" alt=""
                                                    height="auto" /> </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">Welcome back!</h6>
                                        <p class="text-muted mt-1 mb-4">Register here as Institution.</p>

                                            @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                                            @endif

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                        <form action="{{route('admin-register')}}" class="authentication-form" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label">Name</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name ='name' placeholder="Institution Full Name">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name ='email' placeholder="Institution Email">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Username</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name ='username' placeholder="username">
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" name ='password' placeholder="Password">

                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-block" style="background-color: #C124BB;" type="submit"> Register
                                                </button>
                                            </div>
                                        </form>
                                        <div class="py-3 text-center"><span
                                                class="font-size-16 font-weight-bold">Or</span></div>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{route('login')}}" class="btn btn-white"><small>Login as an user</small></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Signup <a href="{{route('admin-register')}}"
                                        class="text-primary font-weight-bold ml-1">here as Institution</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                    <!-- end row -->
                    <!-- end container -->
                </div>
                <!-- end page -->


            </div>
        </div>
        <div class="col-lg-8 d-none d-md-block bg-cover"
            style="background-image: url({{asset('/img/img3.jpg')}});">

        </div>
    </div>
</div>

@endsection


@section("javascript")
<script src="{{asset('backend/assets/build/js/intlTelInput.js')}}"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // any initialisation options go here
    });
</script>


@stop
