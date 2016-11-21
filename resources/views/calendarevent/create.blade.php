
@extends('layout')

@section('content')

<div class="container">

	<!-- Top navigation bar --> 
	@include('_content_navbar_top')  

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<div class="header">
				<h1>Nieuwe boeking</h1>
			</div>

			{!! Form::open(['url' => '/event']) !!}
			@include('calendarevent._form_calendarevent', ['submitButtonText'=>'Opslaan'])
			{!! Form::close() !!}
 			
		</div>
	</div>
</div>

@endsection

@section('scripts')
		@include('calendarevent._script_daterangepicker')
@endsection
