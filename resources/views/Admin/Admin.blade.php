@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Admin
@endsection

@section('content')
  <div class="container mt-5 pt-5">
    <table class="table table-bordered mt-5">
      <thead>
        <tr> 
          <th scope="col">Username</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($currentInstitutionAdmins as $Admins)
          <tr>
            <td id = "usernameColumn">{{ $Admins->username }}</td>
            <td id = "passwordColumn" style = "display:none">{{ $Admins->password }}</td>
            <td>
            <form method = 'post' action = "{{route('Delete-Admin', ['id' => $Admins->id])}}">
            @csrf
            <button class="btn btn-warning" type="submit">Delete</button>
            </form>
            </td>      
          </tr>
          @endforeach
        </tbody>
    </table>
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
    <div class="text-right pt-3"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Button</button></div>
    
  </div>
@endsection
@section('scripts')
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
    <script type="text/javascript" src="{{asset('js/Admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
@parent
@endsection
