<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CalendarEvent;

class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:adminread,adminwrite');
    }

	/**
	* Show calendar
	*
	* @return HTML view
	*/
    public function index()
	{
        $databaseEvents = CalendarEvent::all();
        $stack = [];
        foreach ($databaseEvents as $event) {
        	$eventurl=url('event', $event->id);
    		$calendarevent = \Calendar::event(
				$event->title,
				true,
				$event->start,
				$event->end,
				null,
				[
					'color' => "$event->background_color",
					'url' =>  "$eventurl",
				]
			);
			array_push($stack, $calendarevent);
		}

		$calendar = \Calendar::addEvents($stack)
			->setOptions([ //set fullcalendar options
				'firstDay' => 1,
				'weekends' => true,
				'header' => [
					"left" => "prev,next",
					"center" => "title",
					"right" => "",
				]		
    	]); 

        return view('calendar.index', compact('calendar'));
	}

}
