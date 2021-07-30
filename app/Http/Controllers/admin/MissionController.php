<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page='mission';
        $user = Auth::user();
        $missions = Mission::get()->sort();

        return view('missions.missions',compact('user','missions','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page='mission';
        $user = Auth::user();
        return view('missions.create',compact('user','page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'service_id' => 'required',
            'client_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'elapsed_time' => 'required',
        ]);

        $mission = new Mission();
        $mission->create($data);
        return redirect(route('mission.index',))->with('missionCreated','Mission Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        $page='mission';

        // $service= Service::find($mission->service_id)->get('service_ligne');
        $service= DB::table('services')
        ->where('id',$mission->service_id)
        ->get('service_ligne');
        $c= Client::find($mission->client_id);
        $client= $c->contact_person;

        $user = Auth::user();
        $mission = Mission::find($mission->id);
        return view('missions.edit',compact('user','mission','service','client','page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        $data = $request->validate([
            'service_id' => 'required',
            'client_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'elapsed_time' => 'required',
        ]);

        DB::table('clients')
        ->where('id',$mission->id)
        ->update([
            'mission' => $request->mission,
            'service' => $request->service,
            'client' => $request->client,
            'start_time' => $request->date_start,
            'end_time' => $request->date_finish,
            'elapsed_time' => $request->elapsed_time,

        ]);

        return redirect(route('mission.edit',compact('mission')))->with('missionUpdated','Mission Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        $mission->delete();
        return redirect()->route('mission.index')->with('missionDeleted','Mission Deleted Successfully');
    }
}
