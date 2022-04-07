<?php

namespace App\Http\Controllers;

use App\Models\EventNotice;
use App\Http\Requests\StoreEventNoticeRequest;
use App\Http\Requests\UpdateEventNoticeRequest;

class EventNoticeController extends Controller
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
     * @param  \App\Http\Requests\StoreEventNoticeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventNoticeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventNotice  $eventNotice
     * @return \Illuminate\Http\Response
     */
    public function show(EventNotice $eventNotice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventNotice  $eventNotice
     * @return \Illuminate\Http\Response
     */
    public function edit(EventNotice $eventNotice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventNoticeRequest  $request
     * @param  \App\Models\EventNotice  $eventNotice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventNoticeRequest $request, EventNotice $eventNotice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventNotice  $eventNotice
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventNotice $eventNotice)
    {
        //
    }
}
