<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Alakada | Login</title>
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">
  
</head>

<style>
.form-signin{
  max-width:400px;
 border: 1px solid grey;
border-radius: 20px;
background-color:whitesmoke;
}
</style>

<body>

  
  
<div class="container pt-5 px-3 mx-auto">
  
 
  <form class="form-signin p-3 mx-auto" method = 'post' action = "{{route('admin-login')}}">
    @csrf
    @if ($errors->any())
    
    @foreach ($errors->all() as $error)
      <h6 class = 'text-danger' style = "float:center;margin-left:35px;margin-bottom:10px">{{$error}}</h6>
    @endforeach
   
  @endif
  @if($message = Session::get('Success'))
    <div class ="alert alert-success">
      {{$message}}
    </div>
  @endif
  @if($message = Session::get('Error'))
    <div class ="alert alert-success">
      {{$message}}
    </div>
  @endif
    
    <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="inputEmail" class="form-control my-4" value = "<?= old('username'); ?>" name ='username' placeholder="Username"  autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" value = "<?= old('password'); ?>" placeholder="Password" name ='password'>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a href = "{{route('password-request')}}" class = 'mt-2'>forgot password ?</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
  </form>
  
</div>
  <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/sign-in-page/js/script.js')}}"></script>
  
</body>
</html>