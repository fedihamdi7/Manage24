<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;



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


    public function pdf(){
        $page='mission';
        $user = Auth::user();
        $missions = Mission::get()->sort();
        $time = Carbon::now();


        $pdf = PDF::loadview('missions.pdf',compact('user','missions','page','time'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page='mission';
        $clients=Client::get()->sort();
        $services=Service::get()->sort();
        $user = Auth::user();
        return view('missions.create',compact('user','page','services','clients'));
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
            'mission_name' => 'required',
            'service_id' => 'required',
            'client_id' => 'required',
            'date_start' => 'required',
            'date_finish' => 'required',
            'year' => 'required',
            'path' => 'required',
        ]);

        $mission = new Mission();
        $mission->create($data);
        return redirect(route('mission.index',))->with('missionCreated',__('Mission Added Successfully'));
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
        $current_service = $mission->service()->where('id', $mission->service_id)->value('service_ligne');
        $current_client= $mission->client()->where('id', $mission->client_id)->value('social_reason');
        $clients=Client::get()->sort();
        $services=Service::get()->sort();
        $user = Auth::user();
        $mission = Mission::find($mission->id);
        return view('missions.edit',compact('user','mission','services','clients','page','current_service','current_client'));
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
        // dd($request);
        $data = $request->validate([
            'service_id' => 'required',
            'client_id' => 'required',
            'date_start' => 'required',
            'date_finish' => 'required',
            'year' => 'required',
            'path' => 'required',
        ]);

        DB::table('missions')
        ->where('id',$mission->id)
        ->update([
            'mission_name' => $mission->mission_name,
            'service_id' => $request->service_id,
            'client_id' => $request->client_id,
            'date_start' => $request->date_start,
            'date_finish' => $request->date_finish,
            'year' => $request->year,
            'path' => $request->path,

        ]);

        return redirect(route('mission.edit',compact('mission')))->with('missionUpdated',__('Mission Updated Successfully'));
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
        return redirect()->route('mission.index')->with('missionDeleted',__('Mission Deleted Successfully'));
    }
}
