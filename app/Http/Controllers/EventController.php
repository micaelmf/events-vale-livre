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
use Illuminate\Support\Facades\DB;

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
        $event = $request->except(['activities', 'sponsors']);

        $event['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $event['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $event['job_call_start_date'] = date('Y-m-d H:i:s', strtotime($request->job_call_start_date));
        $event['job_call_and_date'] = date('Y-m-d H:i:s', strtotime($request->job_call_and_date));
        $event['announce_schedule_start_date'] = date('Y-m-d H:i:s', strtotime($request->announce_schedule_start_date));
        $event['announce_schedule_and_date'] = date('Y-m-d H:i:s', strtotime($request->announce_schedule_and_date));
        $event['certificates_issuance_start_date'] = date('Y-m-d H:i:s', strtotime($request->certificates_issuance_start_date));
        $event['certificates_issuance_end_date'] = date('Y-m-d H:i:s', strtotime($request->certificates_issuance_end_date));
        $event['subscription_issuance_start_date'] = date('Y-m-d H:i:s', strtotime($request->subscription_issuance_start_date));
        $event['subscription_issuance_end_date'] = date('Y-m-d H:i:s', strtotime($request->subscription_issuance_end_date));
        $event['subscription_issuance_end_date'] = date('Y-m-d H:i:s', strtotime($request->subscription_issuance_end_date));
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
    public function show(Request $request)
    {
        $slugFromUrl = "/$request->name/$request->year/$request->edition";

        $event = Event::with(['activities.speaker', 'sponsors'])
            ->where('slug', '=', $slugFromUrl)
            ->first();

        $activities = DB::table('activities')
            ->join('speakers', 'speakers.id', '=', 'activities.speaker_id')
            ->join('spaces', 'spaces.id', '=', 'activities.space_id')
            ->join('activity_event', 'activities.id', '=', 'activity_event.activity_id')
            ->join('events', 'events.id', '=', 'activity_event.event_id')
            ->select(
                'activities.*',
                'activities.name AS activity_name',
                'speakers.*',
                'speakers.name AS speaker_name',
                'spaces.*',
                'spaces.name AS space_name'
            )
            ->where('events.id', '=', $event->id)
            ->whereNull('activities.deleted_at')
            ->orderBy('activities.date', 'asc')
            ->get();

        $speakersUnique = [];

        foreach ($event->activities as $activity) {
            if (!in_array($activity->speaker, $speakersUnique)) {
                $speakersUnique[] = $activity->speaker;
            }
        }

        return view('event-index', [
            'event' => $event,
            'activities' => $activities,
            'speakers' => $speakersUnique,
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
            'start_date' => date('Y-m-d H:i:s', strtotime($request->start_date)),
            'end_date' => date('Y-m-d H:i:s', strtotime($request->end_date)),
            'job_call_start_date' => date('Y-m-d H:i:s', strtotime($request->job_call_start_date)),
            'job_call_and_date' => date('Y-m-d H:i:s', strtotime($request->job_call_and_date)),
            'announce_schedule_start_date' => date('Y-m-d H:i:s', strtotime($request->announce_schedule_start_date)),
            'announce_schedule_and_date' => date('Y-m-d H:i:s', strtotime($request->announce_schedule_and_date)),
            'certificates_issuance_start_date' => date('Y-m-d H:i:s', strtotime($request->certificates_issuance_start_date)),
            'certificates_issuance_end_date' => date('Y-m-d H:i:s', strtotime($request->certificates_issuance_end_date)),
            'subscription_issuance_start_date' => date('Y-m-d H:i:s', strtotime($request->subscription_issuance_start_date)),
            'subscription_issuance_end_date' => date('Y-m-d H:i:s', strtotime($request->subscription_issuance_end_date)),
            'subscription_issuance_end_date' => date('Y-m-d H:i:s', strtotime($request->subscription_issuance_end_date)),
            'link_registrations' => $request->link_registrations,
            'link_schedule' => $request->link_schedule,
            'link_certificates' => $request->link_certificates,
            'link_photos' => $request->link_photos,
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
