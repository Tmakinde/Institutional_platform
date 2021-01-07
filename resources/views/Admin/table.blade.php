<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name ="_token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <!-- jquery link -->
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sign-in-page/css/css/all.css') }}">
    </head>
    <body id ="body">
<table class ="table table-bordered" >
    <tr>investors</tr>
    <tr>
        <td style ="width:100px;">id</td>
        <td style ="width:100px;">first_name</td>
        <td style ="width:100px;">last_name</td>
        <td style ="width:100px;">email</td>
        <td style ="width:100px;">username</td>
        <td style ="width:100px;">password</td>
        <td style ="width:100px;">status</td>
        <td style ="width:100px;">logindate</td>
        <td style ="width:100px;">state_id</td>
        <td style ="width:100px;">created_at</td>
        <td style ="width:100px;">updated_at</td>
    </tr>
    </table>
    <table class ="table table-bordered" >
    <tr>farmers</tr>
    <tr>
        <td style ="width:100px;">id</td>
        <td style ="width:100px;">first_name</td>
        <td style ="width:100px;">last_name</td>
        <td style ="width:100px;">email</td>
        <td style ="width:100px;">username</td>
        <td style ="width:100px;">password</td>       
        <td style ="width:100px;">status</td>
        <td style ="width:100px;">logindate</td>
        <td style ="width:100px;">state_id</td>
        <td style ="width:100px;">created_at</td>
        <td style ="width:100px;">updated_at</td>
    </tr>
    </table>
    <table class ="table table-bordered" >
    <tr>farmer_credential</tr>
    <tr>
        <td style ="width:100px;">id</td>
        <td style ="width:100px;">farmer_id</td>
        <td style ="width:100px;">valid_id</td>
        <td style ="width:100px;">insurance_paper</td>
        <td style ="width:100px;">cbr</td>
        <td style ="width:100px;">created_at</td>
        <td style ="width:100px;">updated_at</td>
    </tr>
    </table>
    <table class ="table table-bordered" >
    <tr>investors_credential</tr>
    <tr>
        <td style ="width:100px;">id</td>
        <td style ="width:100px;">farmer_id</td>
        <td style ="width:100px;">valid_id</td>
        <td style ="width:100px;">insurance_paper</td>
        <td style ="width:100px;">cbr</td>
        <td style ="width:100px;">created_at</td>
        <td style ="width:100px;">updated_at</td>
    </tr>
    </table>
    <table class ="table table-bordered" >
    <tr>state</tr>
    <tr>
        <td style ="width:100px;">id</td>
        <td style ="width:100px;">state</td>       
        <td style ="width:100px;">created_at</td>
        <td style ="width:100px;">updated_at</td>
    </tr>
    </table>
    <table class ="table table-bordered" >
    <tr>farmers_info</tr>
    <tr>
        <td style ="width:100px;">id</td>
        <td style ="width:100px;">farmer_id</td>
        <td style ="width:100px;">min_deposit</td>
        <td style ="width:100px;">roi</td>
        <td style ="width:100px;">content</td>
        <td style ="width:100px;">farmtype</td>
        <td style ="width:100px;">created_at</td>
        <td style ="width:100px;">updated_at</td>
    </tr>
    </table>
    <table class ="table table-bordered" >
    <tr>investor_info</tr>
    <tr>
        <td style ="width:100px;">id</td>
        <td style ="width:100px;">farmer_id</td>
        <td style ="width:100px;">min_deposit</td>
        <td style ="width:100px;">roi</td>
        <td style ="width:100px;">content</td>
        <td style ="width:100px;">farmtype</td>
        <td style ="width:100px;">created_at</td>
        <td style ="width:100px;">updated_at</td>
    </tr>
    </table>
    <table class ="table table-bordered" >
    <tr>customer</tr>
    <tr>
        <td style ="width:100px;">id</td>
        <td style ="width:100px;">first_name</td>
        <td style ="width:100px;">last_name</td>
        <td style ="width:100px;">email</td>
        <td style ="width:100px;">username</td>
        <td style ="width:100px;">password</td>
        <td style ="width:100px;">status</td>
        <td style ="width:100px;">logindate</td>
        <td style ="width:100px;">state_id</td>
        <td style ="width:100px;">created_at</td>
        <td style ="width:100px;">updated_at</td>
    </tr>
    </table>
    </body>
</html>