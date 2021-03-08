@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Dashboard
@endsection

@section('content')
<!-- Carousel -->
<div class="heading-text text-center pt-5">
  <h2 class="m-0">{{$currentInstitution->name}}<br>
Online Educational<br> Platform</h2>
  <img src="https://res.cloudinary.com/sam-kay/image/upload/v1614877353/tolu/Untitled_1_p6alhw.png" alt="">
</div>
<!-- About-->
<section class="container mt-4 p-md-4">
  <h1 class="text-center text-primary mb-4">About Us</h1>
  <div class="row about mb-5">
    <div class="col-md about-text d-flex align-items-md-center ">
      <p  class="py-4 py-md-0 order-last order-md-1">This is an institution platform where any institution can signup and get started in giving their student access to online courses which they prepare for themselves
        It's purpose is to be able to connect different schools or tutorial centres on a single platform.</p>
    </div>
    <div class="col-md order-first order-md-2">
      <img class="about-img my-5" src="https://res.cloudinary.com/sam-kay/image/upload/q_auto:low/tolu/about_u17yqh.jpg" alt="">
    </div>
  </div>
  <!-- End of About-->
<h1 class="text-center text-primary mt-4">FAQ'S</h1>
  <!-- Our Offer -->
  <div>
    <div>
      <div class="panel-group" id="accordion">
      <div class="panel panel-default" style="margin-top: 30px">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse0">
                <h5 class="text-dark">What do we have for you?</h5>
              </a>
            </h4>
          </div>
          <div id="collapse0" class="panel-collapse collapse in">
            <div class="panel-body">
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque totam nostrum, ullam iure earum culpa quod quas? Natus, velit repellat voluptas unde cupiditate ab vitae asperiores qui culpa quia maxime!</p>
            </div>
          </div>
        </div>
        <div class="panel panel-default" style="margin-top: 30px">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                <h5 class="text-dark">Who are Users ?</h5>
              </a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
              <p>Users are Schools, Tutorial centre, Student or any platform that has to do with teaching.</p>
            </div>
          </div>
        </div>
        <div class="panel panel-default" style="margin-top: 30px">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                <h5 class="text-dark">What will Users be able to do ?</h5>
              </a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
              <p>Users will be able to :</h2>
              <ul style="line-height:30px">
                <li>
                  <p>Create class</p>
                </li>
                <li>
                  <p>Add students</p>
                </li>
                <li>
                  <p>Create Subject and add its Topics</p>
                </li>
                <li>
                  <p>Add questions to each topic</p>
                </li>
                <li>
                  <p>Students wil be able to access themsleves on each completed Topic</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="panel panel-default" style="margin-top: 30px">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                <h5 class="text-dark">What can students do ?</h5>
              </a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
              <p>Students will be able to :</p>
              <ul style="line-height:30px">
                <li>
                  <p>Choose the subjects they want</p>
                </li>
                <li>
                  <p>Have access to various topics and its assigned questions.</p>
                </li>
                <li>
                  <p>Submit excercises.</p>
                </li>
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
      <div class="col-md-4 col-sm-2 ratio-box fade-box">
        <span style="color:red">
          <h1><b>How to navigate through the webpage to Add Class</b></h1>
        </span>
        <p>
        <h2><i style="line-height: 20px">Click the class link <a href="{{route('Class-Section')}}">here</a> and you will see this.<br>This is the page where you will create class.<br>Add the class name you want and trigger the Add button.</i></h2>
        </p>
      </div>
      <div class="col-md-8 col-sm-4 ratio-box fade-box">
        <img class="mediabox-img lazyload" data-sizes="auto" data-lowsrc="https://res.cloudinary.com/tmakinde/image/upload/v1610723389/Myinstitution%20Images/class1_ycv6hg.png 100w" data-src="https://res.cloudinary.com/tmakinde/image/upload/v1610723389/Myinstitution%20Images/class1_ycv6hg.png" alt="subject-img " width="100%" height="120%">
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="container" style="margin-top:50px">
    <div class="row">
      <div class="col-md-4 col-sm-2">
        <span style="color:red">
          <h1><b>How to navigate through the webpage to Create Student</b></h1>
        </span>
        <p>
        <h2><i style="line-height: 20px">In order to create each student in a class, you need to create class first.<br>After that click on the class which you want to add student too and you will be redirected to this.</i></h2>
        </p>
      </div>
      <div class="col-md-8 col-sm-4 ratio-box fade-box">
        <img class="mediabox-img lazyload" data-sizes="auto" data-lowsrc="https://res.cloudinary.com/tmakinde/image/upload/v1610723389/Myinstitution%20Images/student-page-image_y2ik0s.png" data-src="https://res.cloudinary.com/tmakinde/image/upload/v1610723389/Myinstitution%20Images/student-page-image_y2ik0s.png" alt="subject-img" width="100%" height="120%">
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="container" style="margin-top:50px">
    <div class="row">
      <div class="col-md-4 col-sm-2">
        <span style="color:red">
          <h1><b>How to navigate through the webpage to Add Subject to Class</b></h1>
        </span>
        <p>
        <h2><i style="line-height: 20px">Click the Assign Button</i></h2>
        </p>
      </div>
      <div class="col-md-8 col-sm-4 ratio-box fade-box">
        <img class="mediabox-img lazyload" data-sizes="auto" data-lowsrc="https://res.cloudinary.com/tmakinde/image/upload/v1610723389/Myinstitution%20Images/class_xpertn.png" data-src="https://res.cloudinary.com/tmakinde/image/upload/v1610723389/Myinstitution%20Images/class_xpertn.png" alt="class-img " width="100%">

        <img class="mediabox-img lazyload" data-sizes="auto" data-lowsrc="https://res.cloudinary.com/tmakinde/image/upload/v1610723392/Myinstitution%20Images/subject_i5ofoz.png" data-src="https://res.cloudinary.com/tmakinde/image/upload/v1610723392/Myinstitution%20Images/subject_i5ofoz.png" alt="subject-img " width="100%">
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="container" style="margin-top:10px">
    <p>
    <h2>Working through the website is not difficult, The more you work through it, the more you understand it... Goodluck as you enjoy our offer</h2>
    </p>
  </div>
</section>
<footer id="footer" style="margin-top: 50px;clear:top;width:100%">
  <div class="row" style="width:100%">
    <div class="col-md-4 col-sm-3">
      <a href="https://github.com/Tmakinde/"><i class="fa fa-github">Github Link</i></a>
    </div>
  </div>
</footer>
@endsection

@section('scripts')
@parent
<script>
  $(document).ready(function() {
    var counter = 1;

    function load_data(counter) {
      if (counter == 1) {
        $(".left.carousel-control").hide();
      } else {
        if (counter == 3) {
          $(".left.carousel-control").show();
          $(".right.carousel-control").hide();
        } else {
          $(".left.carousel-control").show();
          $(".right.carousel-control").show();
        }

      }
      return counter;
    }
    load_data(counter);
    $(".glyphicon-chevron-left").click(function() {
      counter = $(".counter").html();
      counter = number(counter) - 1;
      $(".counter").html(counter);
      load_data();
      console.log(counter);
    })

    $(".glyphicon-chevron-right").click(function() {
      counter = load_data(counter + 1);
      $(".counter").html(counter);
      load_data(counter);
      console.log(counter);
    })

  })
</script>
@endsection