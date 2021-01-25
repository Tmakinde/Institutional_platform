@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Admin
@endsection

@section('content')
<span class="topic_id" style="display:none">{{$currentTopic->id}}</span>
<table class ="table table-bordered" style ="min-height:500px;border-collapse:collapse;margin-top:50px">
      <tr>
        <td style ="width:100px;">
          <table class ="table questions" > 
          <tr>
              <td>
                <div>
                  <span style ="border-width:1">
                    <a href ="#" id ="addLink"> Add Question</a>
                  </span>
                </div>              
              </td>
            </tr>
          @php
          $i = 1
          @endphp
          @foreach($topicQuestions as $topicQuestion)
            
            <tr id ="eachquestion" value ="{{$topicQuestion->id}}">
              <td>
                <div>
                  <span style ="border-width:1px;margin-top:10px;margin-bottom:10px;">
                    <a href ="#" class ="getQuestions">Q{{$i}}</a>
                  </span>
                </div>              
              </td>
            </tr> 
            <span class = "questioncounter" style ="display:none;">  {{$i++}}</span>
          @endforeach       
            <span class ="totalquestionnumber" style ="display:none;"></span>
          </table>
        </td>
        <td style ="display:block" id = 'questionColumn'>
          <h2 style ="text-align:center">Do you wish to add a new question ? Click on add question</h2>
        </td>
        <td id ="tableEditForm" style ="display:none">
        <table>
          <tbody>
            <tr style ="" >
             
                <div class ="alert alert-success" style ="display:none"></div>
            
              <!-- Edit question -->
              <form class = "UpdateForm" enctype = "multipart/form-data" style ="border-width:1" value ="">
                  @csrf
                  <label>Question Content</label><br>
                  <textarea class="summernote" id="editContent" style ="min-width:500px;height:300px;border-radius: 15px" name = "content" ></textarea><br>
                  <hr>
                  <label>Input Question Option from A-D</label><br>
                  <label>A</label><input style ="width:50%;" type = "text" id = "editoption_A" name = "option_A" placeholder ="Option A" required><br>
                  <label>B</label><input style ="width:50%;" type = "text" id = "editoption_B"  name = "option_B" placeholder ="Option B" required><br>
                  <label>C</label><input style ="width:50%;" type = "text" id = "editoption_C" name = "option_C" placeholder ="Option C" required><br>
                  <label>D</label><input style ="width:50%;" type = "text" id = "editoption_D"  name = "option_D" placeholder ="Option D" required><br>
                  <label>Choose correct option here</label><br>
                  <input type ="radio" id = "editradio" value ="option_A" name ="answer" style ="margin-right:15px">Option A<br>
                  <input type ="radio" id = "editradio" value ="option_B" name ="answer" style ="margin-right:15px">Option B<br>
                  <input type ="radio" id = "editradio" value ="option_C" name ="answer" style ="margin-right:15px">Option C<br>
                  <input type ="radio" id = "editradio" value ="option_D" name ="answer" style ="margin-right:15px">Option D
                  <hr> 
                  <label>Assign This Question Mark</label><br>
                  <label>Mark: </label><input style ="width:50%;" type = "text" id = "editmark" name = "mark" placeholder ="input mark for this question e.g 1 " required><br>
                  <input type ="submit" id = "questionFormSubmit" value ="Update">
              </form>
             <!-- end Edit form -->
            </tr>
          </tbody>
	      </table>
        </td>
        <td id ="tableAddForm" style ="display:none">
        <table>
          <tbody>
            <tr style ="" >
              @if($message = Session::get('success'))
                <div class ="alert alert-success">{{$message}}</div>
              @endif
               <!--Add form-->
              <form class = "AddForm" enctype = "multipart/form-data" style ="border-width:1">
                @csrf
                <label>Question Content</label><br>
                <textarea class="summernote" id="content" style ="min-width:500px;height:300px;border-radius: 15px" name = "content" ></textarea><br>
                <hr>
                <label>Input Question Option from A-D</label><br>

                <label>A</label><input style ="width:50%;" type = "text" id = "option_A" name = "option_A" placeholder ="Option A" required><br>
                <label>B</label><input style ="width:50%;" type = "text" id = "option_B" name = "option_B" placeholder ="Option B" required><br>
                <label>C</label><input style ="width:50%;" type = "text" id = "option_C" name = "option_C" placeholder ="Option C" required><br>
                <label>D</label><input style ="width:50%;" type = "text" id = "option_D" name = "option_D" placeholder ="Option D" required><br>

                <label>Choose correct option here</label><br>
                <input type ="radio" id = "radio" value ="option_A" name ="answer" style ="margin-right:15px">Option A<br>
                <input type ="radio" id = "radio" value ="option_B" name ="answer" style ="margin-right:15px">Option B<br>
                <input type ="radio" id = "radio" value ="option_C" name ="answer" style ="margin-right:15px">Option C<br>
                <input type ="radio" id = "radio" value ="option_D" name ="answer" style ="margin-right:15px">Option D
                <hr>
                <label>Assign This Question Mark</label><br>

                <label>Mark: </label><input style ="width:50%;" type = "text" id = "mark" name = "mark" placeholder ="input mark for this question e.g 1 " required><br>
                <input type ="Submit" id = "questionFormSubmit" value ="Submit">
              </form>
              <!-- End Add Form-->
            </tr>
          </tbody>
	      </table>
        </td>
      </tr>

    </table>
    <span style ="float:right;margin-bottom:10px">
      <a type = "button" class ="btn btn-primary" href = "{{route('set-time', ['id' => $currentTopic->id])}}">Set Time</a>
    </span>
@endsection
@section('scripts')
    <script src="{{asset('js/Question.js')}}"></script>
  
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
@parent
@endsection
