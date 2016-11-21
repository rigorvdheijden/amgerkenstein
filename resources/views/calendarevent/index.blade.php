
@extends('layout')

@section('content')

	<div class="container">

	<!-- Top navigation bar --> 
	@include('_content_navbar_top') 

    	<div class="row">
			<div class="col-md-10 col-md-offset-1">
			
				<!-- Show session messages -->    
				@include('_content_flashmessage') 
    
    			<div class="header">
        			<h1>Boeking overzicht</h1>
    			</div>
                
                @if ($calendarevents->count() > 0)

            	<table class="table table-striped">
                	<thead>
                    	<tr>
                        	<th>Naam</th>
                        	<th>Periode</th>
                        	<th class="text-right">Opties</th>
                    	</tr>
                	</thead>

                	<tbody>

                	@foreach($calendarevents as $calendar_event)
                	<tr>
                    	<td>{{$calendar_event->title}}</td>
                    	<td>{{$calendar_event->start->format('l M d Y')}} - {{$calendar_event->end->format('l M d Y')}}</td>
                    	<td class="text-right">
	
							<form action="{{ action('CalendarEventController@show', $calendar_event->id) }}" style="display: inline;" >
								<button type="submit" method="get" class="btn btn-default" aria-label="Left Align">
									<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								</button>
							</form> 
							<form action="{{ action('CalendarEventController@edit', $calendar_event->id) }}" 
									method="GET"
									style="display: inline;" >
								<button type="submit" class="btn btn-default" aria-label="Left Align">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								</button>
							</form> 

							<form action="{{ action('CalendarEventController@destroy', $calendar_event->id) }}" 
									method="POST" 
									style="display: inline;" 
							      	onsubmit="if(confirm('Verwijderen? Weet je het zeker?')) { return true } else {return false };">
							    <input type="hidden" name="_method" value="DELETE">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
							    <button class="btn btn-default" type="submit">
							      	<span class="glyphicon glyphicon-trash" aria-hidden="true">
							    </button>
							</form>

                    	</td>
                	</tr>

                	@endforeach

                	</tbody>
            	</table>

            	@else 
            		<p> Er zijn geen boekingen gevonden </p>
            	@endif

            <a class="btn btn-primary" href="{{ url('event/nieuw') }}">Nieuwe boeking maken</a>
        </div>
    </div>
@endsection

@section('scripts')

	<!-- Scripts for session messages -->    
	@include('_script_flashmessage') 

@endsection
