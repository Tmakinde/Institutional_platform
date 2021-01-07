@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Subject
@endsection

@section('content')
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
  </div>
@endsection
@section('scripts')
@parent
@endsection
