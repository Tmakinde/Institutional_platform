

{{-- This is the view for the admin main page. It contains the list of all subjects with links to host exam, add questions, view results, it also has a navbar with links to the students page --}}

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    
   <h4 class ="well mb-4">CLASSES</h4>
    <form action = "{{route('Add-Class')}}" method = "post">
    @csrf
        <input type = "text" name = "class" placeholder ="Input Class Name here">
        <input type ="Submit" value ="Add">
    </form>
    
    <table class="table mt-5 table-bordered">
    <thead>
      <tr>
        
        <th scope="col">Class Name</th>
        <th scope="col">Assign To Subjects</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    
    <tbody>
    @foreach ($classes as $class)
        <tr>
        
          <td id = "usernameColumn"><h3 class = "text-success"><a href = "{{route('Student-Section', ['id' => $class->id])}}">{{$class->class}}</a></h3></td>  
          <td><h3 class = "text-success"><a href = "{{route('Subject-Section', ['id' => $class->id])}}" type = "button" class="btn btn-primary">Assign Subjects</a></h3></td>     
          <td>
            <form method = 'post' action = "{{route('Delete-Class', ['id' => $class->id])}}">
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