@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Students
@endsection

@section('content')
   <div class="container mt-5 pt-5">
    <div class = "alert alert-success" id = "alert" style ="display:none;margin-top:50px;">
      <h6 id ="result"></h6>
    </div>
    @if($errors->any())
      @foreach ($errors->all() as $error)
        <div class = "alert alert-danger" style ="margin-top:20px;">{{$error}}</div>
      @endforeach
    @endif
   <h4 class ="well mb-4">{{$currentClass->class}}</h4>
   <h4 class ="classId" style="display:none">{{$currentClass->id}}</h4>
   <!--action = "{{route('Add-Student', ['id' => $currentClass->id])}}" method = "post"-->
    <form id ="AddForm" method ="Post" action = "{{route('Add-Student', ['id' => $currentClass->id])}}">
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
      
        <th scope="col" style = "text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($listStudents as $Students)
        <tr>
          <td id = "usernameColumn" style = "text-align:center"><h6>{{$Students->name}}</h6></td>   
          
          <td >
            <form class = "deleteForm" >
            @csrf
            
            <input type ="hidden" id ="hiddenValue" value = "{{$Students->id}}">
            
            <button type ="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
    @endforeach

    </tbody>
    </table>
  </div>
@endsection
@section('scripts')
<script src="{{asset('js/User.js')}}"></script>
@parent
@endsection
  