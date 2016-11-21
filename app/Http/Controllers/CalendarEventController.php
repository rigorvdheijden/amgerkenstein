<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CalendarEvent;
use Carbon\Carbon;

class CalendarEventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:adminwrite');
    }

    /**
     * Display a listing of the calendar events
     *
     * @return Response
     */
    public function index()
    {
        $calendarevents = CalendarEvent::all()->sortBy('start');
        return view('calendarevent.index', compact('calendarevents'));
    }


	/**
	* Create new calendar event
	*
	* @return HTML view
	*/
	public function create()
	{
  		return view('calendarevent.create');
	}


	/**
	* Edit an excisting calendar event
	*
	* @return HTML view
	*/
	public function edit($id)
	{
        $calendarevent = CalendarEvent::findOrFail($id);
        return view('calendarevent.edit', compact('calendarevent'));
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param Request $request
	* @return Response
	*/
    public function store(Request $request)
    {
		$time = explode(" - ", $request->input('period'));

		$calendar_event = new CalendarEvent();
		$calendar_event->title            = $request->input("title");
		$calendar_event->start            = $time[0];
		$calendar_event->end              = $time[1];
		$calendar_event->is_all_day       = 'true';
		$calendar_event->background_color = 'red';
		$calendar_event->email            = $request->input("email");
		$calendar_event->phone            = $request->input("phone");
		$calendar_event->description      = $request->input("description");
		$calendar_event->user_id          = $request->user()->id;

		$calendar_event->save();
		return redirect()->route('calendarevent')->with('message', 'De boeking is toegevoegd!');
    }

	/**
	* Display detials of the specified calendar event.
	*
	* @param  int $id
	* @return Response
	*/
    public function show($id)
    {
        $calendar_event = CalendarEvent::findOrFail($id);
        return view('calendarevent.show', compact('calendar_event'));
    }

    /**
     * Update the specified calendar event in storage.
     *
     * @param  int    $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
 		$time = explode(" - ", $request->input('period'));

		$calendar_event = CalendarEvent::findOrFail($id);
		$calendar_event->title            = $request->input("title");
		$calendar_event->start            = $time[0];
		$calendar_event->end              = $time[1];
		$calendar_event->is_all_day       = 'true';
		$calendar_event->background_color = $request->input("color");
		$calendar_event->email            = $request->input("email");
		$calendar_event->phone            = $request->input("phone");
		$calendar_event->description      = $request->input("description");
		$calendar_event->user_id          = $request->user()->id;
        $calendar_event->save();
        //Session::flash('message', "Special message goes here");
        return redirect()->route('calendarevent')->with('message', 'De boeking is aangepast!');
    }

	/**
	* Remove the specified calendar event from storage.
	*
	* @param  int $id
	* @return Response
	*/
    public function destroy($id)
    {
        $calendarevent = CalendarEvent::findOrFail($id);
        $calendarevent->delete();
        return redirect()->route('calendarevent')->with('message', 'De boeking is verwijderd!');
    }

}
