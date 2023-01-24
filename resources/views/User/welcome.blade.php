@extends('User.layouts.master')

@section('title')
{{$currentInstitution->name}} | Portal
@endsection

@section('content')
   <div class="container mt-5 pt-5" >
        <div class = "row">
            <div class ="col-md-3 col-xl-3 col-sm-3">
                <h6 style="color:red">Name: <span class ="text-success">{{$currentUser->name}}</span></h6>
            </div>
            <div class ="col-md-3 col-xl-3 col-sm-3">
                <h6 style="float:center;color:red">Class: <span class ="text-success">{{$userClass->class}}</span></h6>
            </div>
            <div class ="col-md-6 col-xl-6 col-sm-6">        
                <h6 style="color:red">Email: <span class ="text-success">{{$currentUser->email}}</span></h6>
            </div>
        </div>

        <div id = "courses">
            <h4 style="float:center;margin-top:50px;" >Register My Courses</h4>

            <form method = 'post' action = "{{route('User-Subject')}}">
                @csrf
                @foreach($userClassSubjects as $Subjects)
                <input type="checkbox" name = "subject[]" value = "{{$Subjects->Subjectname}}"style="height:20px;width:20px;"><span class ="pl-3" style="color:white"><b>{{$Subjects->Subjectname}}</b><br>
                @endforeach
                <input type ="submit" value ="Add">
            </form>
        </div>
    </div>
@endsection
@section('scripts')
  <script>
    $('#body').css('background-color','purple')
  </script>
@parent
@endsection