

{{-- This is the view for the admin main page. It contains the list of all subjects with links to host exam, add questions, view results, it also has a navbar with links to the students page --}}

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
   <h4 class ="well mb-4">{{$currentClass->class}}</h4>
   <!--action = "{{route('Add-Student', ['id' => $currentClass->id])}}" method = "post"-->
    <form id ="AddForm" >
    @csrf
        <label>Name</label><br>
        <input type = "text" name = "name" id="addName" placeholder ="Input Student Name here"><br>
        <label>Email</label><br>
        <input type = "email" name = "email" id ="addEmail" placeholder ="Input Student Email here"><br>
        <label>Password</label><br>
        <input type = "text" name = "password" id ="addPassword" placeholder ="Input Student Password here" ><br><br>
        <input type ="Submit" id = "AddSubmit" value ="Add">
    </form>
    
    <table class="table mt-5 table-bordered">
    <thead>
      <tr>
        <th scope="col" style = "text-align:center">Student Name</th>
        <th scope="col" style = "text-align:center">Assign Subject</th>
        <th scope="col" style = "text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($listStudents as $Students)
        <tr>
          <td id = "usernameColumn" style = "text-align:center"><h6>{{$Students->name}}</h6></td>   
          
          <td >
            <form method = 'post' id ="deleteForm" >
            <input type ="hidden" id ="hiddenValue" value = "{{$Students->id}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
    </tbody>
    </table>
  <script>
    var currentClass = {{json_encode($currentClass->id)}};
    var currentInstitution = {{json_encode($currentInstitution->id)}};
    var studentId = {{json_encode($currentInstitution->id)}};
    var newArray = {'id':currentClass};
    jQuery(document).ready(function(){
      function load_data(){
          $.ajax({
          url: '{{route("Student-Section")}}' + '?id=' + newArray['id'],
          method:'GET',
          success:function(data){
            $('#body').html(data)
          },
          error:function(jqXHR, textStatus, errorThrown){
         
          console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
          });
        }
      jQuery('#AddForm').submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN':$('meta[name = "_token"]').attr('content')
            }
        })
        var action = $(this).attr('action');
      //  console.log($('#addName').val());
        jQuery.ajax({
        url: "{{route('Add-Student')}}" +'?id=' + newArray['id'],
        type: "POST",
        data:{
            "_token":"{{ csrf_token() }}",
            
            email:$('#addEmail').val(),
            name:$('#addName').val(),
            pasword:$('#addPassword').val()
        },
        
        success:function(data){
          load_data();
          $('#result').text(data.Success);
            
        },
        error:function(data){
        //  load_data();
          console.log(data);
        //  console.log(jqXHR);
        //    console.log(textStatus);
        //    console.log(errorThrown);
        }
        });
      });
        jQuery('#deleteForm').submit(function(e){
          e.preventDefault();
          $.ajaxSetup({
              headers : {
                  'X-CSRF-TOKEN':$('meta[name = "_token"]').attr('content')
              }
          });
        //  var action = $(this).attr('action');
          console.log($('#hiddenValue').val());
          jQuery.ajax({
          url: "{{route('Delete-Student')}}" +'?id=' + $('#hiddenValue').val(),
          type: "POST",
          success:function(data){
            load_data();
            $('#result').text(data.Success);  
          },
          error:function(data){
          //  load_data();
            console.log(data);
          //  console.log(jqXHR);
          //    console.log(textStatus);
          //    console.log(errorThrown);
          }
          })
      });
    //  jQuery(document).ajaxStop(function(){
    //    window.location.reload();
    //  })
      
        
    
    })
  </script> 
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    </div>
  </body>
</html>