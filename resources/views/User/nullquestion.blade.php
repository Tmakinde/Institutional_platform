@extends('User.layouts.master')
@section('title')
check | Admin
@endsection

@section('content')
<body>
	<div class="flex-center position-ref full-height">
		<div class="message code">
            Hey
        </div>

		<div class="message code" style="padding: 10px;">
            Your Test Has Not Been Activated!!!
        </div>
        <div class="message code" style="padding: 10px;">
            <a href="{{route('User-Courses')}}" class="btn btn-success btn-md">Go Back To Course</a> 
        </div>
	</div>
</body>
@endsection
@section('scripts')
@parent
@endsection