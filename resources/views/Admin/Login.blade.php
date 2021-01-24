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
  <script src="https://afarkas.github.io/lazysizes/plugins/respimg/ls.respimg.min.js"></script>
  <script src="https://afarkas.github.io/lazysizes/plugins/parent-fit/ls.parent-fit.min.js"></script>
  <script src="https://afarkas.github.io/lazysizes/plugins/object-fit/ls.object-fit.min.js"></script>

  <script src="https://afarkas.github.io/lazysizes/plugins/blur-up/ls.blur-up.min.js"></script>
  <script src="https://afarkas.github.io/lazysizes/lazysizes.min.js"></script>
  <script src="lazysizes.min.js" async=""></script>
  
</head>

<style>
.form-signin{
  max-width:400px;
  border: 1px solid grey;
  border-radius: 20px;
  background-color:whitesmoke;
}
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

<body style="background-color:blue">
  <div>
    <div class="row" style="width:100%">
      <div class="col-md-6 col-sm-6 ratio-box" style="margin-bottom:-187px">
        <img class="mediabox-img lazyload" src="{{asset('/img/img3.jpg')}}" width="100%" style="height:100%">
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="pt-5">
          <form method = 'post' action = "{{route('admin-login')}}" style="100%">
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
            <div class="card-header">
              <h1 class="h3 mb-3 font-weight-normal">ALAKADA Login Page</h1>
            </div>
            <div class="card-body">
              <label for="inputEmail" class="sr-only">Username</label>
              <input type="text" id="inputEmail" class="form-control" value = "<?= old('username'); ?>" name ='username' placeholder="Username">
            </div>
            <div class="card-body">
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" value = "<?= old('password'); ?>" placeholder="Password" name ='password'>
            </div>
            <div class="card-body">
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <span class="mt-5 ml-5" style="float:right;"><a href = "{{route('password.request')}}" class = 'mt-2'><b style="color:black">Forgot Password ?</b></a></span>
            <p class="mt-5 mb-3" style="color:black">&copy; 2020</p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/sign-in-page/js/script.js')}}"></script>
  
</body>
</html>