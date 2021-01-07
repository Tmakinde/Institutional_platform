$(document).ready(function(){
    // hide and show question form

    $('#addLink').on('click', function(){
        $("#questionColumn").css('display', "none");
        $("#tableEditForm").css('display', "none");
        $("#tableAddForm").css('display', "block");
      });
      //get questions
      //var topic_id = '$currentTopic->id';
      var i =0;
     // load_data();
      function load_data(){
        $.ajax({
          url: 'http://localhost:8000/admin/getallquestion' + '?id=' + topic_id,
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
        url: "http://localhost:8000/admin/Add-Question" +'?topic_id=' + topic_id,
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
        url: "http://localhost:8000/admin/getsinglequestion" +'?id=' +$id,
        method: "GET",
        data:{
          "_token":"{{ csrf_token() }}",  
          
        },
        success:function(data){
        
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
            url: "http://localhost:8000/admin/Update-Question" +'?id=' +questionid,
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