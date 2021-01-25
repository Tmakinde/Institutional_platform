@extends('User.layouts.master')
@section('title')
check | Admin
@endsection

@section('content')
<body>
	<div class="flex-center position-ref full-height">
		<div class="code">
            Thank You For Attempting The Test 
        </div>

		<div class="message" style="padding: 10px;">
            We Will Send You A Notification Shortly 
        </div>
        <div class="message" style="padding: 10px;">
            <a href="{{route('User-Courses')}}" class="btn btn-success btn-md">Go Back To Course</a> 
        </div>
	</div>
</body>
@endsection
@section('scripts')
@parent
@endsection