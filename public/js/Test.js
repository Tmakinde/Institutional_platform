$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var topic_id = $('.topic_id').html();
$.ajax({
    url: "/api/time",
    method: 'GET',
    data: {
        "topic_id":topic_id
    },
    dataType: "json",
    success:function(data){
        var deadline = new Date();
        deadline.setHours(deadline.getHours() + data.time.hour);
        deadline.setMinutes(deadline.getMinutes() + data.time.min);
        deadline.setSeconds(deadline.getSeconds() + data.time.sec);
        var interval = setInterval(function() 
        {
            var now = new Date();
            var duration = deadline - now;
            //console.log(duration);
            var days = Math.floor(duration / (1000 * 60 * 60 * 24));
            var hours = Math.floor((duration%(1000*60*60*24))/(1000*60*60))
            var minutes = Math.floor(((duration%(1000*60*60*24))%(1000*60*60))/(1000*60));
            var seconds = Math.floor(((((duration%(1000*60*60*24))%(1000*60*60))%(1000*60)))/1000);
            document.getElementById("timer").innerHTML ='<b>'+ 
            hours + "h " + minutes + "m " + seconds + "s "+'</b>';
            if (duration < 00) {
            clearInterval(interval);
            document.getElementById("demo").innerHTML = "EXPIRED"
            }
            $('.hrs').html(hours);
            $('.min').html(minutes);
            $('.sec').html(seconds);
            //console.log($('.min').html());
        }, 1000);
       
    }

}
)
    var counter = $('.counter').html();
    // create a dic t store the chosen option
    var option = {};
    var chosenOptionClass = {};
    
    function load_data(){
        
        if($('.counter').html() !=  $('#total').html()){
            $('.next').css('display', "flex");
            console.log($('.counter').html())
        }else{
            $('.next').css('display', "none");
            $('#submit').css('display','flex');
        }

        if($('.counter').html() == 1){
            $('.previous').css('display', "none");
        }else{
            $('.previous').css('display', "flex");
        }
        
    }

    load_data();

    $('li.next').click(function(e){
        e.preventDefault()
        $.ajax({   
            url: '/mytest',
            method:'POST',
            data:{
                "action":"next",
                 
                "counter":counter,
                'topic_id':$('.topic_id').html(),
            },
            beforeSend:function(){
                option[counter] = $('input#answer:checked').val();
               // console.log(option[counter]);
                chosenOptionClass[counter] = $('input#answer:checked').attr('class');
               // console.log(chosenOptionClass[counter]);
            },
            success:function(data){
               // console.log(data);
                $('input.option_A').attr("name",counter);
                $('input.option_B').attr("name",counter);
                $('input.option_C').attr("name",counter);
                $('input.option_D').attr("name",counter);
                $('.questiontag').html(data.nextPage);

                //store option into session
                sessionStorage.setItem('options',JSON.stringify(option));
                //store class of chosen option into session
                sessionStorage.setItem('optionclass',JSON.stringify(chosenOptionClass));

                var chosenOptionObject = JSON.parse(sessionStorage.getItem('options'));
                var chosenOptionClassObject = JSON.parse(sessionStorage.getItem('optionclass'));
                
                // the if statement is to prevent further checking of radio that has not been clicked 
                counter++; 
                if (chosenOptionObject[counter] != undefined) {
                    //$("input.class[name = 'answer']:checked").checked = true;
                    $("."+chosenOptionClassObject[counter]).prop("checked", true);
                   // console.log("yes");
                }
                else {
                    var arr1 = $('input#answer');
                   // console.log(arr1)
                    for (var index = 0; index < arr1.length; index++) {
                        var element = arr1[index];
                        element.checked = false
                    }
                }

                $('.counter').html(counter);
                load_data();
                $('img').addClass('img-responsive');
                $('img').css('max-width','400px');
                $('img').css('max-height','400px');
                $('#option_A').html(data.listOfOptions[0]);
                $('#option_B').html(data.listOfOptions[1]);
                $('#option_C').html(data.listOfOptions[2]);
                $('#option_D').html(data.listOfOptions[3]);
                
                $('input[name='+counter+'].option_A').val(data.listOfOptions[0]);
                $('input[name='+counter+'].option_B').val(data.listOfOptions[1]);
                $('input[name='+counter+'].option_C').val(data.listOfOptions[2]);
                $('input[name='+counter+'].option_D').val(data.listOfOptions[3]);

                
            },
            error:function(jqXHR, textStatus, errorThrown){
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
          });
        
    })


    $('li.previous').click(function(e){
        e.preventDefault();
        var getOptionStore = JSON.parse(sessionStorage.getItem('options'));
        $.ajax({
            
            url: '/mytest',
            method:'POST',
            data:{
                "action":"prev",
                 
                "counter":counter-1,
                'topic_id':$('.topic_id').html(),
            },
            beforeSend:function(){
                option[counter] = $('input#answer:checked').val();
                chosenOptionClass[counter] = $('input#answer:checked').attr('class');
            },
            success:function(data){
                $('.questiontag').html(data.previousPage);
                
                $('.counter').html(counter-1);
                
                load_data();

                $('img').addClass('img-responsive');
                $('img').css('max-width','400px');
                $('img').css('max-height','400px');
                $('#option_A').html(data.listOfOptions[0]);
                $('#option_B').html(data.listOfOptions[1]);
                $('#option_C').html(data.listOfOptions[2]);
                $('#option_D').html(data.listOfOptions[3]);
              //  console.log(data);
                
                $('input[name='+counter+'].option_A').val(data.listOfOptions[0]);
                $('input[name='+counter+'].option_B').val(data.listOfOptions[1]);
                $('input[name='+counter+'].option_C').val(data.listOfOptions[2]);
                $('input[name='+counter+'].option_D').val(data.listOfOptions[3]);

                counter--;
                //store option into session
                sessionStorage.setItem('options',JSON.stringify(option));
                //store class of chosen option into session
                sessionStorage.setItem('optionclass',JSON.stringify(chosenOptionClass));

                // option and class
                var chosenOptionObject = JSON.parse(sessionStorage.getItem('options'));
                var chosenOptionClassObject = JSON.parse(sessionStorage.getItem('optionclass'));
               // console.log(chosenOptionObject);
                if (chosenOptionObject[counter] != undefined) {
                    $("."+chosenOptionClassObject[counter]).prop("checked", true);
                    
                }else {
                    var arr1 = $('input#answer');
                   // console.log(arr1)
                    for (var index = 0; index < arr1.length; index++) {
                        var element = arr1[index];
                        element.checked = false
                    }
                }
            },
            error:function(jqXHR, textStatus, errorThrown){
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
        });
        
    })


    $('button.submit').click(function(event){
       // myFunction();
        //event.preventDefault();
        var counter = $('.counter').html();
        //save the last selected option into option object before submiting
        option[counter] = $('input#answer:checked').val();
        sessionStorage.setItem('options',JSON.stringify(option));
        var chosenOptionObject = JSON.parse(sessionStorage.getItem('options'));
        $.ajax({
            url: '/mark-my-test',
            method: "post",
            data:{ 
                "option_selected":chosenOptionObject,
                "counter": counter,
            },
            
            success:function(data){
                console.log(data);
                alert("Congratulation your score is "+data.score);
            }
        })
        
        $.ajax({
            url: '/api/deleteTime',
            method: "post",
            data:{

                 
                'topic_id':$('.topic_id').text(),
            },
            
            success:function(data){
                console.log(data);
            },
            error:function(jqXHR, textStatus, errorThrown){
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
        })

        $.ajax({
            url: '/submission',
            method: "get",
        })
    })

    window.onbeforeunload = function (event) {
        event.preventDefault();
        event.returnValue = "Are you sure you want to leave this page ? you might not be able to take this test again ";
      //  console.log(event);
        console.log($('.hrs').html());
        console.log($('.min').html());
        console.log($('.sec').html());
        
        $.ajax({
            url: "/api/updateTime",
            method: "POST",
            data:{
                 
                'hrs': $('.hrs').text(),
                'min': $('.min').text(),
                'sec': $('.sec').text(),
                'topic_id':$('.topic_id').text(),
                'userId':$('.userId').text(),
            },
            success:function(data){
                console.log(data);
            }
        })
        return "Are you sure you want to leave this page ?"; 
    }

    window.addEventListener('beforeunload', (event) => {
        event.returnValue = "Are you sure you want to submit"
    })
    // save timer to database every 5 sec
    var interval = setInterval(function() 
        {
            $.ajax({
                url: "/api/updateTime",
                method: "POST",
                data:{
                     
                    'hrs': $('.hrs').text(),
                    'min': $('.min').text(),
                    'sec': $('.sec').text(),
                    'topic_id':$('.topic_id').text(),
                    'userId':$('.userId').text(),
                },
                success:function(data){
                    //console.log(data);
                }
            })
        }, 5000);

})