<?php

namespace App\Http\Controllers\admin;

use App\Collabs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollabController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function show(Collabs $collabs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function edit(Collabs $collabs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collabs $collabs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collabs $collab,Request $request)
    {
     $collab->delete();
    }
}
