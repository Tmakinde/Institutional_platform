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

   <body >
   <div class="container mt-5 pt-5" >
    
   <h4 class ="well mb-4">Add Subject</h4>
    <form id ="AddForm" action = "{{route('Add-Subject', ['id' => $currentClass->id])}}" method = "post">
    @csrf
        <label>Subject</label><br>
        <input type = "text" name = "subjectName" id="addName" placeholder ="Input Subject Name here"><br>
        
        <input type ="Submit" id = "AddSubmit" value ="Add">
    </form>
    
    <table class="table mt-5 table-bordered">
    <thead>
      <tr>
        <th scope="col" style = "text-align:center">Subject Name</th>
       
        <th scope="col" style = "text-align:center">Action</th>

        <th scope="col" style = "text-align:center">Create Topic</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($subjects as $subject)
        <tr>
          <td id = "usernameColumn" style = "text-align:center"><h6>{{$subject->Subjectname}}</h6></td>        
          <td  style = "float:center">
            <form method = 'post' action = "{{route('Delete-Subject', ['id' => $subject->id])}}" >
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
          <td id = "usernameColumn" style = "text-align:center"><a href = "{{route('Topic-Section', ['id' => $subject->id])}}"button class ="btn btn-primary">Click here to create topic</td> 
        </tr>
    @endforeach
    </tbody>
    </table>
