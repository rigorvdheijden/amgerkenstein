@extends('layout')

@section('content')

<div class="container">

    <!-- Top navigation bar --> 
    @include('_content_navbar_top')  

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! $calendar->calendar() !!}
		</div>
	</div>
</div>	

@endsection

@section('scripts')
    {!! $calendar->script() !!}
@endsection
