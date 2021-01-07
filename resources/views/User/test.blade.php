@extends('User.layouts.master')
@section('title')
check | Admin
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class ="col-md-2 col-lg-2 col-sm-2">
        </div>
        
        <div class ="col-md-8 col-lg-8 col-sm-8">
            <div class ="jumbotron">
                <h4 class ="questiontag">{{$currentPage}}</h4>
                <br>
                
                <input type ="radio" id="answer" class= "option_A" name = "0" value="{{$listOfOptions[0][0]}}"><label id= "option_A" >{{$listOfOptions[0][0]}}</label><br>
                <input type ="radio" id="answer" class= "option_B" name = "0" value="{{$listOfOptions[0][1]}}"><label id= "option_B" >{{$listOfOptions[0][1]}}</label><br>
                <input type ="radio" id="answer" class= "option_C" name = "0" value="{{$listOfOptions[0][2]}}"><label id= "option_C" >{{$listOfOptions[0][2]}}</label><br>
                <input type ="radio" id="answer" class= "option_D" name = "0" value="{{$listOfOptions[0][3]}}"><label id= "option_D" >{{$listOfOptions[0][3]}}</label>

            </div>
            <div class="card>">
                <div  style="background-color:transparent">
                    <nav arial-label="pagination" class = "pagination-nav">
                        <ul class="pagination">
                            <li class="page-item previous" style ="display:none;margin-right:20px;"><a class= "page-link" href="#">Previous</a></li>
                            <li class ="counter">1</li><label> of </label><li id ="total">{{$countArray}}</li>
                            <li class="topic_id" style="display:none">{{$topic_id}}</li>
                            <li class="page-item next" style="margin-left:20px;"><a class= "page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <div id="submit" style="float:right;margin-bottom:20px;display:none">
                
                    <div class="text-right pt-3"><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Submit</button></div>
                      
                </div>
            </div> 
             
        </div>
    </div>

    <!-- Modal Insert--> 
    <div class="modal fade" id="myModal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
        <div class="modal-dialog modal-dialog-centered" role = 'document'> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
                    <h4 class="modal-title" id="myModalLabel" style='margin-top:60px'> Submission</h4> 
                </div>
                <div class="modal-body"> 
                    <span class="">Are you sure you want to submit ? </span>
                </div> 
                <div class="modal-footer">
                    <form>
                        <button type = "submit" class="btn btn-success submit btn-lg" data-dismiss="modal">Yes</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close </button>

                </div> 
            </div><!-- /.modal-content --> 
        </div><!-- /.modal -->
      </div>
   <!-- <div class="text-right pt-3"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Button</button></div>-->
   
    
</div>


@endsection

@section('scripts')
<script>
$(document).ready(function(){
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
            url: '{{route("get-myquestion")}}',
            method:'POST',
            data:{
                "action":"next",
                "_token":"{{ csrf_token() }}",
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
            
            url: '{{route("get-myquestion")}}',
            method:'POST',
            data:{
                "action":"prev",
                "_token":"{{ csrf_token() }}",
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
        event.preventDefault();
        var counter = $('.counter').html();
        //save the last selected option into option object before submiting
        option[counter] = $('input#answer:checked').val();
        sessionStorage.setItem('options',JSON.stringify(option));
        var chosenOptionObject = JSON.parse(sessionStorage.getItem('options'));
        $.ajax({
            url: '{{route("mark")}}',
            method: "post",

            data:{
                "_token":"{{ csrf_token() }}",
                "option_selected":chosenOptionObject,
                "counter": counter,
            },
            
            success:function(data){
                console.log(data);
            }
        })
    })
    
})
</script>
@parent
@endsection