<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Alakada || Register</title>
  <link rel="stylesheet" href="{{ url('css/register/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('css/register/css/css/all.css')}}">
</head>

<style>
  .form-signup {
    max-width: 600px;
    border: 1px solid grey;
    border-radius: 20px;
    background-color:whitesmoke;
  }
</style>

<body style="background-color:blue">
  <div class="row" style="width:100%">
    <div class="col-md-6 col-sm-6 ratio-box" style="margin-bottom:-251px">
      <img class="mediabox-img lazyload" src="{{asset('/img/img3.jpg')}}" width="100%" style="height:100%">
    </div>
    <div class="col-md-6 col-sm-6 pt-5">
      <form action = "{{route('admin-register')}}" method = "post">
        @csrf
        @if ($errors->any())
              <ul id="errors">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
          @endforeach 
              </ul>
          @endif
          <div class="card-header">
            <h1 class="h3 mb-3 font-weight-normal text-danger"><b>ALAKADA Register Page</b></h1>
          </div>
          <div class="card-body">
            <label for="name" class="sr-only">Name</label>
            <input type="text" class="form-control" name ='name' placeholder="Institution Full Name">
          </div>
          <div class="card-body">
            <label for="name" class="sr-only">Email</label>
            <input type="email" class="form-control" name ='email' placeholder="Institution Email">
          </div>
          <div class="card-body">
            <label for="password" class="sr-only">Password</label>
            <input type="password" class="form-control" name ='password' placeholder="Password">
          </div>
          <div class="card-body">
            <label for="username" class="sr-only">Username</label>
            <input type="text" class="form-control" name ='username' placeholder="Note that your username will be used as your subdoamin name e.g {Oasis}.alakada.com">
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Register Here</button>
      </form> 
      <span class="mt-5 mb-3" style="color:black" style="float:right;position:relative">ALAKADA &copy; 2020</span>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>