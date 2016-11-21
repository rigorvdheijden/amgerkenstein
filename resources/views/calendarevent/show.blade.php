
@extends('layout')

@section('content')

<div class="container">

	<!-- Top navigation bar --> 
	@include('_content_navbar_top')  

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

        		<div class="header">
        			<h1>Boeking details</h1>
    			</div>
        	
        		<table class="table table-striped">

                	<tbody>

                	<tr>
                    	<td>Naam</td>
                    	<td>{{ $calendar_event->title }}</td>
                	</tr>
                	<tr>
                    	<td>Start</td>
                    	<td>{{$calendar_event->start->format('l M d Y') }}</td>
                	</tr>
                	<tr>
                    	<td>Eind</td>
                    	<td>{{$calendar_event->end->format('l M d Y') }}</td>
                	</tr>
                	<tr>
                    	<td>Email</td>
                    	<td>{{$calendar_event->email }}</td>
                	</tr>
               		<tr>
                    	<td>Telefoon</td>
                    	<td>{{$calendar_event->phone }}</td>
                	</tr>
               		<tr>
                    	<td>Opmerkingen</td>
                    	<td>{{$calendar_event->description }}</td>
                	</tr>
               		<tr>
                    	<td>Aangemaakt op</td>
                    	<td>{{$calendar_event->created_at }}</td>
                	</tr>
               		<tr>
                    	<td>Laatst gewijzigd op</td>
                    	<td>{{$calendar_event->created_at }}</td>
                	</tr>
               		<tr>
                    	<td>Door</td>
                    	<td>{{$calendar_event->user_id }}</td>
                	</tr>
                	</tbody>
            	</table>
			<hr> 
			<div>
            	<a class="btn btn-primary" href="{{ url('event') }}">Naar boeking overzicht</a>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
@endsection
