@extends('Admin.layouts.master')

@section('title')
{{$currentInstitution->name}} | Dashboard
@endsection

@section('content')

  <div class = "jumbotron">
    <h3>{{$currentInstitution->name}}</h3>
  </div>

<!--  <div id="myCarousel" class="carousel slide"> 
     Carousel indicators 
    <ol class="carousel-indicators"> 
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
      <li data-target="#myCarousel" data-slide-to="1"></li> 
      <li data-target="#myCarousel" data-slide-to="2"></li> 
    </ol>
     Carousel items 
    <div class="carousel-inner"> 
      <div class="item active"> 
        <img src="{{URL::asset('img/paris1.jpg')}}" alt="First slide"> </div> 
        <div class="item"> <img src="{{URL::asset('img/paris.jpg')}}" alt="Second slide"> </div> 
        <div class="item"> <img src="{{URL::asset('img/paris2.jpg')}}" alt="Third slide"> </div> 
      </div>
       Carousel nav
      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a> 
      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> 
    </div>
  </div>
  -->

@endsection

@section('scripts')
@parent
@endsection
