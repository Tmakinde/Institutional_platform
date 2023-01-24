var currentClass =$('.classId').text();
var newArray = {'id':currentClass};

jQuery(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function load_data(){
        $.ajax({
        url: 'StudentSection' + '?id=' + newArray['id'],
        method:'GET',
        success:function(data){
        $('#body').html(data)
        $('#alert').css('display', 'none');
        console.log(data);
        },
        error:function(jqXHR, textStatus, errorThrown){
        
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        }
    });
    }

    $('.deleteForm').on('submit',function(event){
        event.preventDefault();
        var action = $(this).attr('action');
        console.log($('#hiddenValue').val());
        jQuery.ajax({
        url: "Delete-Student",
        method: "POST",
        data:{
            'id': $('#hiddenValue').val(),
        },
        success:function(data){
            load_data();
            console.log(data);
            $('#alert').show();
            $('#result').text("User Successfully Deleted!");  
        },
        error:function(data){
            load_data();
            console.log(data);
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }

        })
    });
});