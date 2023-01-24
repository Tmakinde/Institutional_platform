$(document).ready(function(){

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('table#table').hide();
  //  console.log($('.hiddenValue').val());
  $('.submit').on('click', function(event){
    event.preventDefault();
    console.log($('.submit').val());

  $('table#table').show();
  $('table#table').css('background-color', 'white');
    $input = $(this).closest('input');
    var topic = $input.val();
    $('td > a').attr('href', '{{route("download-file")}}' + '?title=' + topic);
    $('td > a').text('Download Course Material');
      $.ajax({
        url: '/ViewTopic' + '?title=' + topic,
        method:'GET',
        success:function(data){
          $('#titleHead').text(data.topicTitle);
        //  console.log(data.topicTitle);
          
          $('.topicContent').html(data.topicContent);
          $('img').addClass('img-responsive');
          $('img').css('max-width','400px');
          $('img').css('max-height','400px');
          
        },
        error:function(jqXHR, textStatus, errorThrown){
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        }
      });
      // download ajax
    
    })
  })