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
    <a href="{{route('dashboard')}}" class="navbar-brand">{{$currentInstitution->name}}</a>
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
              <a class="nav-link" href="{{route('Class-Section')}}" active>Class</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="#">Student</a>
          </li>

          <li class="nav-item m-auto pl-lg-5">
            <a class="nav-link" href="#" >Admin</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="#">Results</a>
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
  <body id ="body">
   <div class="container mt-5 pt-5" >
    <h6 style="background-color:green;border-radius: 10px; width:100px" id ="result"></h6>
   <h4 class ="well mb-4">{{$subject->Subjectname}}</h4>
  
    <form id ="AddForm" action = "{{route('Add-Topic', ['id' => $subject->id])}}" method = "post" enctype = "multipart/form-data">
        @csrf
        <label>Title</label><br>    
        <input style ="width:50%;" type = "text" name = "title" placeholder ="Input Topic Title here"><br>
        <hr>
        <label>Content</label><br>
        <textarea style ="width:50%;height:300px;border-radius: 15px" name = "content" ></textarea><br>
        <hr>  
        <label>Would you like to upload a File ?</label><br>    
        <input type = "file" name = "file"><br>
        <hr> 
        <input type ="Submit" id = "AddSubmit" value ="Submit">
    </form>
    <h4 class ="well mb-4">Previous Topic under {{$subject->Subjectname}}</h4>
    <table class="table mt-5 table-bordered table-hoverd ">
    <thead>
      <tr>
        <th scope="col" style = "text-align:center">Topic Name</th>
        <th scope="col" style = "text-align:center">Date created </th>
        <th scope="col" style = "text-align:center">Date Updated</th>
        <th scope="col" style = "text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($topics as $topic)
        <tr>
          <td style = "text-align:center"><h6>{{$topic->Title}}</h6></td>   
          <td style = "text-align:center"><i>{{$topic->created_at}}</i></td> 
          <td style = "text-align:center"><i>{{$topic->updated_at}}</i></td> 
          <td >
            <form method = 'post' id ="deleteForm" >
            <input type ="hidden" id ="hiddenValue" value = "{{$topic->id}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    </div>
  </body>
</html>