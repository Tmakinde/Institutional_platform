@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Admin
@endsection

@section('content')

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
            <span style ="display:none;">  {{$i++}}</span>
          @endforeach       
                   
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
                  <textarea class="summernote" style ="min-width:500px;height:300px;border-radius: 15px" name = "content" ></textarea><br>
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
    <script>
    // summernote
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

    //end of summernote
    // writing jquery
    $(document).ready(function(){
        // hide and show question form
        
        $('#addLink').on('click', function(){
          $("#questionColumn").css('display', "none");
          $("#tableEditForm").css('display', "none");
          $("#tableAddForm").css('display', "block");
        });
        //get questions
        var topic_id = {{json_encode($currentTopic->id)}};
        var i =0;
       // load_data();
        function load_data(){
          $.ajax({
            url: '{{route("All-Question")}}' + '?id=' + topic_id,
            method:'GET',
            success:function(data){
            //  console.log(data.topicQuestions);
              
                console.log(data.topicQuestions[data.topicQuestions.length-1]['id']);
                $("#tableAddForm").css('display', "block");
                $('.table.questions').append('<tr id = "eachquestion" value = '+data.topicQuestions[data.topicQuestions.length-1]['id']+'><td><div><span style ="border-width:1px;margin-top:10px;margin-bottom:10px;"><a href ="#" id ="getQuestions">Q'+data.topicQuestions[data.topicQuestions.length-1]['id']+'</a></span></div></td></tr>');
              //  $('#getQuestions').append('<br>'+i+'<br>');
                //console.log('<tr id = "eachquestion" value = "'+data.topicQuestions[0]['id']+'"><td><div><span style ="border-width:1px;margin-top:10px;margin-bottom:10vx;"><a href ="#" id ="getQuestions">Q'+i+'</a></span></div></td></tr>');
              
            },
            error:function(jqXHR, textStatus, errorThrown){
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
          });
        }  
        //add ajax code
        $('.AddForm').on('submit',function(event){
          event.preventDefault();
          $('input').focus(function(){
            $(this).css('background', 'pink')
          })

          $('input').blur(function(){
              $(this).css('background', 'white')
          })
          var content = $('textarea#content').val();
          var answer = $("input#radio[name = 'answer']:checked").val();
          var option_A = $("input#option_A[name = 'option_A']").val();
          var option_B = $("input#option_B[name = 'option_B']").val();
          var option_C = $("input#option_C[name = 'option_C']").val();
          var option_D = $("input#option_D[name = 'option_D']").val();
          var mark = $("input#mark[name = 'mark']").val();
          console.log(mark);
          jQuery.ajax({
          url: "{{route('Add-Question')}}" +'?topic_id=' + topic_id,
          method: "POST",
          data:{
            "_token":"{{ csrf_token() }}",  
            "content":content,
            "mark":mark,
            "answer":answer,
            "option_A":option_A,
            "option_B":option_B,
            "option_C":option_C,
            "option_D":option_D,
          },
          success:function(data){

            $('.alert.alert-success').css('display','block').text(data.success);
            $('.alert.alert-success').css('display','none');
            load_data(); 
          },
          error:function(jqXHR, textStatus, errorThrown, data){
            console.log(data);
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
          }
          })
        });
        // get all questions back for editing
        $('.getQuestions').on('click', function(){
          $("#questionColumn").css('display', "none");
          $("#tableAddForm").css('display', "none");
          
          var a = $(this).closest('#eachquestion');
          data = a.children('td').map(function(){
            return $(this).text();
          }).get()
        //  console.log(a.attr('value'));
          // get question id 
          $id = a.attr('value');
          event.preventDefault();
          jQuery.ajax({
          url: "{{route('Single-Question')}}" +'?id=' +$id,
          method: "GET",
          data:{
            "_token":"{{ csrf_token() }}",  
            
          },
          success:function(data){
          //  load_data();
            $("#tableEditForm").css('display', "block");
            $('#editContent').text(data.question['content']);
            $('#editoption_A').val(data.option['option_A']);
            $('#editoption_B').val(data.option['option_B']);
            $('#editoption_C').val(data.option['option_C']);
            $('#editoption_D').val(data.option['option_D']);
            $('input#editradio[name = "answer"][value ="'+data.answer+'"]').prop('checked',true);
            $('#editmark').val(data.question['mark']);
            $('form.UpdateForm').attr('value', data.question['id']);
            
          },
          error:function(jqXHR, textStatus, errorThrown, data){
            console.log(data);
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
          }
          })
        });
        
        $('.UpdateForm').on('submit',function(event){
          event.preventDefault();        
          var content = $('textarea').val();
          var answer = $("input#editContent[name = 'answer']:checked").val();
          var option_A = $("input#editoption_A[name = 'option_A']").val();
          var option_B = $("input#editoption_B[name = 'option_B']").val();
          var option_C = $("input#editoption_C[name = 'option_C']").val();
          var option_D = $("input#editoption_D[name = 'option_D']").val();
          var mark = $("input#editmark[name = 'mark']").val();
          var questionid = $(this).attr('value');
        //  console.log(mark);
          jQuery.ajax({
          url: "{{route('Update-Question')}}" +'?id=' +questionid,
          method: "POST",
          data:{
            "_token":"{{ csrf_token() }}",  
            "content":content,
            "mark":mark,
            "answer":answer,
            "option_A":option_A,
            "option_B":option_B,
            "option_C":option_C,
            "option_D":option_D,
          },
          success:function(data){
            $('.alert.alert-success').css('display','block').text(data.success);
            $('.alert.alert-success').css('display','none');
          },
          error:function(jqXHR, textStatus, errorThrown){
            
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
          }
          })
      });
    })
    
    </script>
    <script type="text/javascript" src="{{asset('js/question.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>
@parent
@endsection
