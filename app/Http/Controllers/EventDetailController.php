<?php

namespace App\Http\Controllers;

use App\Models\EventDetail;
use App\Http\Requests\StoreEventDetailRequest;
use App\Http\Requests\UpdateEventDetailRequest;

class EventDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventDetail  $eventDetail
     * @return \Illuminate\Http\Response
     */
    public function show(EventDetail $eventDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventDetail  $eventDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(EventDetail $eventDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventDetailRequest  $request
     * @param  \App\Models\EventDetail  $eventDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventDetailRequest $request, EventDetail $eventDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventDetail  $eventDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventDetail $eventDetail)
    {
        //
    }
}
