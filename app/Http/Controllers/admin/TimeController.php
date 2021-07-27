<?php

namespace App\Http\Controllers\admin;

use App\Collab;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $times = Time::get()->sort();

        return view('times.times',compact('user','times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $missions=Mission::get()->sort();
        $collabs=Collab::get()->sort();
        $user = Auth::user();
        return view('times.create',compact('user','missions','collabs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'mission_id' => 'required|numeric',
            'collab_id' => 'required|numeric',
            'date'=>'required',
            'start_time'=>'required',
            'elapsed_time'=>'required',

        ]);

        $time = new Time();
        $time->create($data);
        return redirect(route('time.index'))->with('timeCreated','Time Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        // dd($time);
        $current_mission = $time->mission_id;
        $current_collab_id = $time->collab_id;
        $current_collab_name = Collab::find($current_collab_id)->value('collab_name');
        // dd($current_collab_name);
        $missions=Mission::get()->sort();
        $collabs=Collab::get()->sort();
        $user = Auth::user();
        // $services = Service::get()->sort();

        return view('times.edit',compact('user','time','missions','collabs','current_mission','current_collab_name','current_collab_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Time $time)
    {
        $data = $request->validate([
            'mission_id' => 'required|numeric',
            'collab_id' => 'required|numeric',
            'date'=>'required',
            'start_time'=>'required',
            'elapsed_time'=>'required',

        ]);

        DB::table('times')
        ->where('id',$time->id)
        ->update([
            'mission_id' => $request->mission_id,
            'collab_id' => $request->collab_id,
            'date'=>$request->date,
            'start_time'=>$request->start_time,
            'elapsed_time'=>$request->elapsed_time,

        ]);

        return redirect(route('time.edit',compact('time')))->with('timeUpdated','Time Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        $time->delete();
        return redirect()->route('time.index');
    }
}
