<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Http\Requests\StoreSpaceRequest;
use App\Http\Requests\UpdateSpaceRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spaces-list', ['spaces' => Space::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spaces-create', [
            'addresses' => Address::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpaceRequest $request)
    {
        $space = $request->all();
        $space['user_id'] = Auth::user()->id;
        Space::create($space);

        return redirect()->route('spaces');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Http\Response
     */
    public function show(Space $space)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('spaces-edit', [
            'space' => Space::find($request->id),
            'addresses' => Address::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpaceRequest  $request
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpaceRequest $request)
    {
        $space = Space::find($request->id);
        $space->update([
            'name' => $request->name,
            'reference' => $request->reference,
            'address_id' => $request->address_id
        ]);

        return redirect()->route('spaces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Http\Response
     */
    public function destroy(Space $space)
    {
        //
    }
}
