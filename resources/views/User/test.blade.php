@extends('User.layouts.master')
@section('title')
check | Admin
@endsection

@section('content')

<div class="container">
    <p class="hrs" style="display:none"></p>
    <p class="min" style="display:none"></p>
    <p class="sec" style="display:none"></p>
    <p style="float:right;margin-top:100px" id="timer"></p>
    <div class="row">
        <div class ="col-md-2 col-lg-2 col-sm-2">
        
        </div>
        
        <div class ="col-md-8 col-lg-8 col-sm-8">
            <div class ="jumbotron">
                <h4 class ="userId" style="display:none">{{$currentUserId}}</h4>
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
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
});
</script>
<script src="{{asset('js/Test.js')}}"></script>
@parent
@endsection