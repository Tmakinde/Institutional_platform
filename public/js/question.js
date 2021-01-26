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
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // hide and show question form
  
  $('#addLink').on('click', function(){
    $("#questionColumn").css('display', "none");
    $("#tableEditForm").css('display', "none");
    $("#tableAddForm").css('display', "block");
  });
  //get questions
  var topic_id = $('.topic_id').text();
  var i =0;
 // load_data();
  function load_data(){
    $.ajax({
      url: 'getallquestion' + '?id=' + topic_id,
      method:'GET',
      success:function(data){
          window.location.reload();
          $("#tableAddForm").css('display', "block");
          $('.table.questions').append('<tr id = "eachquestion" value = '+data.topicQuestions[data.topicQuestions.length-1]['id']+'><td><div><span style ="border-width:1px;margin-top:10px;margin-bottom:10px;"><a href ="#" id ="getQuestions">Q'+$('.totalquestionnumber').html()+'</a></span></div></td></tr>');
          var counter = $('.questioncounter').closest('#eachquestion');
          console.log(counter);
        },
      error:function(jqXHR, textStatus, errorThrown){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
    });
  }  
  
  $('.AddForm').on('submit',function(event){
    event.preventDefault();
    $('input').focus(function(){
      $(this).css('background', 'pink')
    })

    $('input').blur(function(){
        $(this).css('background', 'white')
    })
    $("#questionColumn").css('display', "none");
    $("#tableEditForm").css('display', "none");
    $("#tableAddForm").css('display', "block");
    var content = $('textarea#content').val();
    var answer = $("input#radio[name = 'answer']:checked").val();
    var option_A = $("input#option_A[name = 'option_A']").val();
    var option_B = $("input#option_B[name = 'option_B']").val();
    var option_C = $("input#option_C[name = 'option_C']").val();
    var option_D = $("input#option_D[name = 'option_D']").val();
    var mark = $("input#mark[name = 'mark']").val();
   // console.log(mark);
    jQuery.ajax({
    url: "Add-Question" +'?topic_id=' + topic_id,
    method: "POST",
    data:{ 
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
      $('.AddForm').trigger('reset');
      $('.totalquestionnumber').html(data.totalquestions);
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
    
    var a = $(this).closest('#eachquestion');
    data = a.children('td').map(function(){
      return $(this).text();
    }).get()
    
    // get question id 
    $id = a.attr('value');
    event.preventDefault();
    jQuery.ajax({
    url: "getsinglequestion" +'?id=' +$id,
    method: "GET",
    success:function(data){
    //  load_data();
      $("#questionColumn").css('display', "none");
      $("#tableAddForm").css('display', "none");
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
    //  console.log(data);
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
    url: "Update-Question" +'?id=' +questionid,
    method: "POST",
    data:{ 
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