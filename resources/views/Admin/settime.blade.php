@extends('Admin.layouts.master')
@section('title')
Set Time | Admin
@endsection

@section('content')

<div class ="container">
    
    
    <div class ="jumbotron" style ="margin-top:180px;margin-left:240px;float:center;position:absolute;">
    @if($message = Session::get('success'))
        <div style = "text-align:center" class ="alert-success">{{$message}}</div>
    
    @endif
    <h4 style ="margin-bottom:20px;color:red;text-align:center">Set Time Duration To Complete The Test</h4>
        <form style ="margin-top:70px;float:center;margin-left:100px;" method ="POST" action ="{{route('setExamTime',['id'=>$topics->id])}}">
            @csrf
            <label style ="margin-right:10px;">Hrs:</label><input type ="number" name ="hrs"><br> 
            <label style ="margin-right:7px;">Min:</label><input type ="number" name = "min"><br>
            <label style ="margin-right:10px;">Sec:</label><input type ="number" name ="sec"><br>
            <input type ="submit" class ="btn btn-success" style ="margin-left:20px;float:right">
        </form>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        // getting started with 
        
        if(typeOf(Storage) !- 'undefined'){
            alert('fine');
        }else{
            alert('not supported');
        }

    </script>
    <script type="text/javascript" src="{{asset('js/sign-in-page/js/jquery-3.5.1.min.js')}}"></script>    
    <script type="text/javascript" src="{{asset('js/sign-in-page/js//bootstrap.min.js')}}"></script>

@parent
@endsection
