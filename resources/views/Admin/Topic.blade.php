@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Topic
@endsection

@section('content')
   <div class="container mt-5 pt-5" >
    <h6 style="background-color:green;border-radius: 10px; width:100px" id ="result"></h6>
   <h4 class ="well mb-4">{{$subject->Subjectname}}</h4>
  
    <form id ="AddForm" action = "{{route('Add-Topic', ['id' => $subject->id])}}" method = "post" enctype = "multipart/form-data">
        @csrf
        <label>Title</label><br>    
        <input style ="width:50%;" type = "text" name = "title" placeholder ="Input Topic Title here"><br>
        <hr>
        <label>Content</label><br>
        <textarea class="summernote" style ="min-width:500px;height:300px;border-radius: 15px" name = "content" ></textarea><br>
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
          <td>
            <a href ="{{route('Question-Section', ['topic_id' => $topic->id])}}" class="btn btn-info">Create Question</a>
            <form method = 'post' action="" id ="deleteForm">
            @csrf
            <input type ="hidden" id ="hiddenValue" value = "{{$topic->id}}">
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
    </tbody>
    </table>
  </div>
@endsection
@section('scripts')
<script src="{{asset('js/Topic.js')}}"></script>
@parent
@endsection
