$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
    //summernote
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

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('table#table').hide();
  //  console.log($('.hiddenValue').val());
  $('.submit').on('click', function(event){
    event.preventDefault();
  //  console.log($('.submit').val());

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