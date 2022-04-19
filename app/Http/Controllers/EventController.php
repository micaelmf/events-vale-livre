<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Activity;
use App\Models\Address;
use App\Models\Speaker;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events-list', ['events' => Event::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events-create', [
            'addresses' => Address::all(),
            'activities' => Activity::all(),
            'sponsors' => Sponsor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $event = $request->except(['speakers', 'activities', 'sponsors']);
        $event['user_id'] = Auth::user()->id;

        $activities = $request->input('activities');
        $sponsors = $request->input('sponsors');
        
        $eventCreated = Event::create($event);
        $eventCreated->sponsors()->sync($sponsors);
        $eventCreated->activities()->sync($activities);

        return redirect()->route('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $search = 'flisol-vale-2022';

        $event = Event::where('slug', '=', $search)->first();

        return view('event-index', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $event = Event::with(['activities', 'sponsors'])->find($request->id);

        return view('events-edit', [
            'event' => $event,
            'addresses' => Address::all(),
            'activities' => Activity::all(),
            'sponsors' => Sponsor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $eventUpdate = Event::find($request->id);

        $eventUpdate->update([
            'name' => $request->name,
            'about' => $request->about,
            'slug' => $request->slug,
            'place' => $request->place,
            'year' => $request->year,
            'edition' => $request->edition,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        
        $activities = $request->input('activities');
        $sponsors = $request->input('sponsors');
        
        $eventUpdate->sponsors()->sync($sponsors);
        $eventUpdate->activities()->sync($activities);

        return redirect()->route('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        $event->delete();

        return redirect()->route('events');
    }
}
