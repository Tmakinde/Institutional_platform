@extends('User.layouts.master')

@section('title')
{{$currentInstitution->name}} | Portal
@endsection

@section('content')
  <div class="container mt-5 pt-5" >
    <div id = "courses">
      <h4 style="float:center;margin-top:50px;color:red" class ="well" >My Courses</h4>
          <ul>
          @foreach($userSubjects as $Subjects)
              
            <li> <div class ="mb-3"><a href ="{{route('topics', ['id' => $Subjects->id])}}"> <b>{{$Subjects->Subjectname}}</b> </a> </div></li>
              
          @endforeach
          </ul>
      </h4>
    </div>
  </div>
@endsection
@section('scripts')
@parent
@endsection
