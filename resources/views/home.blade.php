@extends('Admin.layouts.master')

@section('title')
ALAKADA
@endsection

@section('content')  
  <!-- Carousel -->                
  <div id="myPic" class="carousel slide" style ="width:100%;height:30px"> 
    <ol class="carousel-indicators"> 
      <li data-target="#myPic" data-slide-to="0" class="active"></h3></li> 
      <li data-target="#myPic" data-slide-to="1"></h3></li> 
      <li data-target="#myPic" data-slide-to="2"></h3></li> 
    </ol> 
    <div class="carousel-inner" >
      <div class="heading-text">							
        <h1 class="animated flipInY delay1">ALAKADA</h1>
        <p>Online Educational Platform for our Students</p>
      </div>
      <div class="item active"><img src="{{URL::asset('img/img3.jpg')}}" width="100%" height="30px" alt="First slide" style="opacity:0.6;"> </div> 
      <div class="item"> <img src="{{URL::asset('img/img1.jpg')}}"  width="100%" alt="Second slide" style="opacity:0.6;"> </div> 
      <div class="item"> <img src="{{URL::asset('img/img2.jpg')}}"  width="100%" alt="Third slide" style="opacity:0.6;"> </div> 
    
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myPic" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myPic" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    
  </div>
    <!-- About-->
  <section class="container" style="margin-top:20px">
    <div class="row">
      <div class="col-md-8">
        <div class="title-box clearfix "><h1 class="title-box_primary" style="color:red;margin-top:30px"><b>About Us</b></h1></div> 
        <p><h2>This is an institution platform where any institution can signup and get started in giving their student access to online courses which they prepare for themselves
        It's purpose is to be able to connect different schools or tutorial centres on a single platform.</h2></p>
      </div> 
    </div>
    <!-- End of About-->

    <!-- Our Offer -->
    <div style="width:100%;margin-top:30px">
      <div><div class="title-box clearfix "><h1 class="title-box_primary" style="color:red"><b>What do we have for you ?</b></h1></div> 
      <div class="panel-group" id="accordion">
            <div class="panel panel-default" style="margin-top: 30px">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                  <h1>Who are Users ?</h1></a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body"><h2>Users are Schools, Tutorial centre, Student or any platform that has to do with teaching.</h2></div>
              </div>
            </div>
            <div class="panel panel-default" style="margin-top: 30px">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                  <h1>What will Users be able to do ?</h1></a>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body"><h2>Users will be able to :</h2>
                  <ul style="text-height:30px">
                    <li><h3>Create class</h3></li>
                    <li><h3>Add students</h3></li>
                    <li><h3>Create Subject and add its Topics</h3></li>
                    <li><h3>Add questions to each topic</h3></li>
                    <li><h3>Students wil be able to access themsleves on each completed Topic</h3></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="panel panel-default" style="margin-top: 30px">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                  <h1>What can students do ?</h1>
                  </a>
                </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body"><h2>Users will be able to :</h2>
                  <ul style="text-height:30px">
                    <li><h3>Choose the subjects they want</h3></li>
                    <li><h3>Have access to various topics and its assigned questions.</h3></li>
                    <li><h3>Submission of exercise.</h3></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    </section>
    <!-- Our Offer -->
  <section>
    <div class="container" style="margin-top:30px">
      <div class="row">
        <div class="col-md-4 col-sm-2">
          <span style="color:red"><h1><b>How to navigate through the webpage to Add Class</b></h1></span>
          <p ><h2><i style="line-height: 20px">Click the class link <a href="{{route('Class-Section')}}">here</a> and you will see this.<br>This is the page where you will create class.<br>Add the class name you want and trigger the Add button.</i></h2></p>
        </div>
        <div class="col-md-8 col-sm-4">
          <img src="{{URL::asset('img/class1.png')}}" alt="subject-img " width="100%" height="120%">
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="container"style="margin-top:50px">
      <div class="row">
        <div class="col-md-4 col-sm-2">
          <span style="color:red"><h1><b>How to navigate through the webpage to Create Student</b></h1></span>
          <p ><h2><i style="line-height: 20px">In order to create each student in a class, you need to create class first.<br>After that click on the class which you want to add student too and you will be redirected to this.</i></h2></p>
        </div>
        <div class="col-md-8 col-sm-4">
          <img src="{{URL::asset('img/student-page-image.png')}}" alt="subject-img " width="100%" height="120%">
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="container"style="margin-top:50px">
      <div class="row">
        <div class="col-md-4 col-sm-2">
          <span style="color:red"><h1><b>How to navigate through the webpage to Add Subject to Class</b></h1></span>
          <p ><h2><i style="line-height: 20px">Click the Assign Button</i></h2></p>
        </div>
        <div class="col-md-8 col-sm-4">
          <img src="{{URL::asset('img/class.png')}}" alt="class-img " width="100%">
        
          <img src="{{URL::asset('img/subject.png')}}" alt="subject-img " width="100%" >
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="container"style="margin-top:10px">
      <p><h2>Working through the website is not difficult, The more you work through it, the more you understand it... Goodluck as you enjoy our offer</h2></p>
    </div>
  </section>
  <footer id="footer" style="margin-top: 50px;clear:top;width:100%">
    <div class="row" style=";width:100%">
      <div class="col-md-4 col-sm-3">
        <a href="https://github.com/Tmakinde/"><i class="fa fa-github">Github Link</i></a>
      </div>
    </div>	
	</footer>
@endsection

@section('scripts')
@parent
@endsection
