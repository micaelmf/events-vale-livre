<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Requests\SortableActivityRequest;
use App\Models\Space;
use App\Models\Speaker;
use App\Services\ActivityService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $spaces = DB::table('spaces')
            ->select('spaces.*')
            ->rightJoin('activities', 'spaces.id', '=', 'activities.space_id')
            ->whereNull('activities.deleted_at')
            ->groupBy('activities.space_id')
            ->get();

        $filters = $request->all();
        $filteredSpace = $filters['spaces'] ?? $spaces[0]->id;

        $activities = Activity::with(['speaker', 'space'])
            ->where('activities.space_id', $filteredSpace)
            ->orderBy('activities.position', 'asc')
            ->get();

        return view('activities-list', [
            'activities' => $activities,
            'spaces' => $spaces,
            'filteredSpace' => $filteredSpace
        ]);
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
     * Sortable activities list.
     *
     * @param  \App\Http\Requests\SortableActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function sortable(SortableActivityRequest $request)
    {
        try {
            $activitiesToSort = Activity::where('space_id', $request->space)->orderBy('position', 'asc')->get();

            foreach ($activitiesToSort as $activity) {
                foreach ($request->order as $item) {
                    if ($activity->id == $item['id']) {
                        $result = Activity::where('id', $activity->id)->update(['position' => intval($item['position'])]);
                    }
                }
            }

            $activityService = new ActivityService();
            $activitiesFromSpace = Activity::with(['space'])->where('space_id', $request->space)->orderBy('position', 'asc')->get();

            $previusHour = $activitiesToSort->toArray()[0]['date'];

            foreach ($activitiesFromSpace as $activity) {
                if ($activity->space->id != $request->space) {
                    continue;
                }

                $timeCurrent = $activityService->addMinutes(
                    $previusHour,
                    $activityService->convertToMinutes($activity->duration)
                );

                Activity::where('id', $activity->id)->update(['date' => $previusHour]);

                $previusHour = $timeCurrent;
            }

            return response(['error' => false]);
        } catch (Exception $e) {
            return response(['error' => true, 'error-msg' => $e->getMessage()], 404);
        }
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
