

{{-- This is the view for the admin main page. It contains the list of all subjects with links to host exam, add questions, view results, it also has a navbar with links to the students page --}}

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
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
              <a class="nav-link" href="{{route('Class-Section')}}">Class</a>
          </li>
          <li class="nav-item m-auto pl-lg-5">
              <a class="nav-link" href="#">Student</a>
          </li>

          <li class="nav-item m-auto pl-lg-5">
            <a class="nav-link" href="{{route('Admin-Section')}}" active>Admin</a>
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
  

  <div class="container mt-5 pt-5">
  <table class="table mt-5">
    <thead>
      <tr>
        
        <th scope="col">Username</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($currentInstitutionAdmins as $Admins)
        <tr>
          <td id = "usernameColumn">{{ $Admins->username }}</td>
          <td id = "passwordColumn" style = "display:none">{{ $Admins->password }}</td>
          <form method = 'post' action = "{{route('Delete-Admin', ['id' => $Admins->id])}}">
          @csrf
          <button class="btn btn-warning" type="submit">Delete</button>
          </form>
          
          </td>      
        </tr>
        

  <!-- Modal Insert--> 
    <div class="modal fade" id="myModal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
      <div class="modal-dialog modal-dialog-centered" role = 'document'> 
          <div class="modal-content"> 
              <div class="modal-header"> 
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
                  <h4 class="modal-title" id="myModalLabel" style='margin-top:60px'> Add New Admin</h4> 
              </div>
              <div class="modal-body"> 
              <form id = 'formAdd' action = "{{route('Add-Admin')}}" method = "post">
              @csrf
                  <label>Username</label>
                  <br>
                  <input type="text" name='username' required ><br>
                  <label>Password</label>
                  <br>
                  <input type="text" name='password' required ><br>
                  <input type="hidden" style='margin-top:10px' id = 'action' name = 'action' value = "update">
                  <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'Submit'>

              </form>
              </div> 
              <div class="modal-footer"> 
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close </button> 
                  
              </div> 
          </div><!-- /.modal-content --> 
      </div><!-- /.modal -->
    </div>

    <!-- Modal Edit--> 
    <div class="modal fade" id="myModal1" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
            <div class="modal-dialog modal-dialog-centered" role = 'document'> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
                        <h4 class="modal-title" id="myModalLabel" style='margin-top:60px'> Edit Admin</h4> 
                    </div>
                    <div class="modal-body"> 
                    <form id = 'formAdd' action = "{{route('Update-Admin', ['id' => $Admins->id])}}" method = "post">
              @csrf
                  <label>Username</label>
                  <br>
                  <input type="text" name='username' value = "" id = "editUsername" required ><br>
                  <label>Password</label>
                  <br>
                  <input type="text" name='password' required  id = "editPassword"><br>
                  <input type="hidden" style='margin-top:10px' id = 'action' name = 'action' value = "update">
                  <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'update'>

              </form>
                    </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close </button> 
                       
                    </div> 
                </div><!-- /.modal-content --> 
            </div><!-- /.modal -->
        </div>
        @endforeach
      </tbody>
  </table>
        <div class="text-right pt-3"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Button</button></div>
    

</div>
    <script>
    // writing jquery
    var i = 0;
    
    $('tr > td >button#editButton').click(function(){
      $tr = $(this).closest('tr');
      var Value = $tr.children('td').map(function(){
        return $(this).text()
      }).get()
      $('#editUsername').val(Value[0]);
      $('#editPassword').val($('#passwordColumn').text());
    })
       // get username
    // $('#editUsername').val(username); // insert username
       
  
    
   
    
    </script>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
    
  </body>
  
</html>
