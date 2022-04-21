<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Space;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activities-list', ['activities' => Activity::with(['speaker','space'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities-create', [
            'speakers' => Speaker::all(),
            'spaces' => Space::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityRequest $request)
    {
        $activity = $request->all();
        $activity['date'] = date('Y-m-d H:i:s', strtotime($activity['date']));
        $activity['user_id'] = Auth::user()->id;

        Activity::create($activity);

        return redirect()->route('activities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('activities-edit', [
            'activity' => Activity::with(['space', 'speaker'])->find($request->id),
            'spaces' => Space::all(),
            'speakers' => Speaker::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivityRequest  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityRequest $request)
    {
        $activity = Activity::find($request->id);
        $activity->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'level' => $request->level,
            'duration' => $request->duration,
            'date' => date('Y-m-d H:i:s', strtotime($request->date)),
            'observations' => $request->observations,
            'status' => $request->status,
            'speaker_id' => $request->speaker_id,
            'space_id' => $request->space_id,
        ]);

        return redirect()->route('activities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Activity::find($id);

        $event->delete();

        return redirect()->route('activities');
    }
}
