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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $missions = Mission::get()->sort();

        return view('missions.missions',compact('user','missions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('missions.create',compact('user'));
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
            'date_start' => 'required',
            'date_finish' => 'required',
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

        // $service= Service::find($mission->service_id)->get('service_ligne');
        $service= DB::table('services')
        ->where('id',$mission->service_id)
        ->get('service_ligne');
        $c= Client::find($mission->client_id);
        $client= $c->contact_person;

        $user = Auth::user();
        $mission = Mission::find($mission->id);
        return view('missions.edit',compact('user','mission','service','client'));
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
            'service' => 'required',
            'client' => 'required',
            'date_start' => 'required',
            'date_finish' => 'required',
        ]);

        DB::table('clients')
        ->where('id',$mission->id)
        ->update([
            'mission' => $request->mission,
            'service' => $request->service,
            'client' => $request->client,
            'date_start' => $request->date_start,
            'date_finish' => $request->date_finish,

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
