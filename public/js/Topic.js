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

  
  })