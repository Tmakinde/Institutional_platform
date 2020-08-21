<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name ="_token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Class</title>
  <!-- jquery link -->
  <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">
</head>

  <body>
  <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark text-right">
    <a href="{{route('home')}}" class="navbar-brand">{{$currentInstitution->name}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link " href="{{route('home')}}">Dashboard</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="{{route('User-Courses')}}">My Courses</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="#">Results</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
          <a class="nav-link" href="#">Messages<i class="fas fa-bell ml-2"></i></a> 
          </li>
          <li class="nav-item m-auto pl-lg-5">
          <a class="nav-link" href="{{route('logout')}}">Sign out</a> 
          </li>
      </ul>
     
    </div>
  </nav>

   <body style = "">
   
    
   <h4 class ="well mb-4">{{$currentSubject->Subjectname}} Topics</h4>
    <div class ="row" style ="margin-left:20px;margin-top:50px;margin-right:20px;">
      <div class ="col-md-3 col-xl-3 col-sm-3 col-lg-3">
        <ul>
          @foreach($topics as $topic)
            <li>
                <form class="topicForm" >
                  @csrf
                  {{method_field('GET')}}
                  <input type ="submit" class="btn submit" value = "{{$topic->Title}}">
                </form>
              </li>
          @endforeach
        </ul>
      </div>
      <div class = "col-md-3 col-xl-3 col-sm-3  col-lg-3">
      </div>
      <div class = "col-md-3 col-xl-6 col-sm-6 col-lg-6">
        <table class="table table-bordered" style ="border-radius:30px;">
          <thead>
            <tr>
              <th scope="col" style ="color:red;text-align:center;font-family:Helvetica;"><h2><b id = "titleHead"></b></h2></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class = "topicContent" style ="max-width:20px;overflow-y:scroll;line-height:50px;font-family:Arial"></td>
            </tr>
            <tr>
              <td><a href ="#"> </a></td>
            </tr>
          </tbody>
      </div>
    </div> 

    <script>
   // console.log($('.hiddenValue').val());

      $(document).ready(function(){
        $('table.table.table-bordered').hide();
      //  console.log($('.hiddenValue').val());
      $('.submit').on('click', function(event){
        event.preventDefault();
      //  console.log($('.submit').val());
      $('table.table.table-bordered').show();
        $input = $(this).closest('input');
        var topic = $input.val();
        $('td > a').attr('href', '{{route("download-file")}}' + '?title=' + topic);
        $('td > a').text('Download Course Material');
          $.ajax({
            url: '{{route("Get-Topic")}}' + '?title=' + topic,
            method:'GET',
            success:function(data){
              $('#titleHead').text(data.topicTitle);
            //  console.log(data.topicTitle);
              
              $('.topicContent').text(data.topicContent);
              
            },
            error:function(jqXHR, textStatus, errorThrown){
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
          });
          // download ajax
        
        })
      })
    </script>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
    
  </body>
</html>