@extends('Admin.layouts.master')

@section('title')
My School Admin Web Page | Dashboard
@endsection

@section('content')

<div class = "jumbotron">
    <h3>You can broadcast message to other Admins here</h3>
    <form id = 'formAdd' action = "#" method = "post">
        @csrf
        <label>Message Title</label>
        <br>
        <input type="text" name='title' required ><br>
        <label>Message Body</label>
        <br>
        <input type="text" name='message' required ><br>
        <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'Submit'>
    </form>
</div>

@endsection

@section('scripts')
@parent
@endsection
