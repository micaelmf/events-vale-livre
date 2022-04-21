<?php

namespace App\Http\Controllers;

use App\Models\Sponsorr;
use App\Http\Requests\StoreSponsorrRequest;
use App\Http\Requests\UpdateSponsorrRequest;
use App\Models\Speaker;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sponsors-list', ['sponsors' => Sponsor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsors-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSponsorrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSponsorrRequest $request)
    {
        $sponsor = $request->all();
        
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'type' => 'required',
        ]);
        
        $sponsor['image'] = $request->file('image')->store('/', 'public_images_sponsors');
        $sponsor['user_id'] = Auth::user()->id;

        Sponsor::create($sponsor);

        return redirect()->route('sponsors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsorr
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsorr
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('sponsors-edit', ['sponsor' => Sponsor::find($request->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSponsorrRequest  $request
     * @param  \App\Models\Sponsor  $sponsorr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSponsorrRequest $request, Sponsor $sponsor)
    {
        $sponsor = Sponsor::find($request->id);

        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'type' => 'required',
        ]);

        $image = $sponsor->image;

        if(!empty($request->file('image'))){
            $image = $request->file('image')->store('/', 'public_images_sponsors');
        }

        $sponsor->update([
            'name' => $request->name,
            'type' => $request->type,
            'about' => $request->about,
            'image' => $image,
        ]);

        return redirect()->route('sponsors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsorr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sponsor = Sponsor::find($request->id);

        $sponsor->delete();

        return redirect()->route('sponsors');
    }
}
