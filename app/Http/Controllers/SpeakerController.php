<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Http\Requests\StoreSpeakerRequest;
use App\Http\Requests\UpdateSpeakerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('speakers-list', ['speakers' => Speaker::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('speakers-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpeakerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpeakerRequest $request)
    {
        $speaker = $request->all();
        
        $validatedData = $request->validate([
            'name' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'job' => 'required',
        ]);

        $speaker['photo'] = $request->file('photo')->store('/', 'public_images_speakers');
        $speaker['user_id'] = Auth::user()->id;

        Speaker::create($speaker);

        return redirect()->route('speakers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function show(Speaker $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('speakers-edit', ['speaker' => Speaker::find($request->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpeakerRequest  $request
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpeakerRequest $request, Speaker $speaker)
    {
        $speaker = Speaker::find($request->id);

        $validatedData = $request->validate([
            'name' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'job' => 'required',
        ]);

        $photo = $request->file('photo')->store('speakers_photos', 'public');

        $speaker->update([
            'name' => $request->name,
            'job' => $request->job,
            'bio' => $request->bio,
            'photo' => $photo,
            'link_github' => $request->link_github,
            'link_linkedin' => $request->link_linkedin,
            'link_medium' => $request->link_medium,
            'link_instagram' => $request->link_instagram,
            'link_twitter' => $request->link_twitter,
            'link_facebook' => $request->link_facebook,
            'link_youtube' => $request->link_youtube
        ]);

        return redirect()->route('speakers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::find($id);

        $speaker->delete();

        return redirect()->route('speakers');
    }
}
