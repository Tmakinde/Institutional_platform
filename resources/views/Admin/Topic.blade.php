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
            <form method = 'post' id ="deleteForm">
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
<script>
$('.summernote').summernote({
    height: 200,
    minHeight: null,             // set minimum height of editor
    maxHeight: 150, 
    maxWidth: 170,             // set maximum height of editor
    focus: true ,
    maximumImageFileSize: 512000,
    placeholder:'Write your text here ... Click the picture you upload to get options to resize',
    imageAttributes:{
        icon:'<i class="note-icon-pencil"/>',
        removeEmpty:false, // true = remove attributes | false = leave empty if present
        disableUpload: false // true = don't display Upload Options | Display Upload Options
    },
    toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['link', 'picture',]],
        ['view', ['fullscreen', 'codeview', 'help']],
    ],
    popover: {
        image: [
            ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']]
        ],
        link: [
            ['link', ['linkDialogShow', 'unlink']]
        ],
        
        air: [
            ['color', ['color']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']]
        ]
    },
});
</script>
@parent
@endsection
