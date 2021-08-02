<?php

namespace App\Http\Controllers\admin;

use App\Collab;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Time;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index']);


    }

    public function pdf(){
        $page='time';
        $user = Auth::user();
        $times = Time::get()->sort();
        $DT = Carbon::now();


        $pdf = PDF::loadview('times.pdf',compact('user','times','page','DT'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page='time';
        $user = Auth::user();
        $times = Time::get()->sort();

        return view('times.times',compact('user','times','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page='time';
        $missions=Mission::get()->sort();
        $collabs=Collab::get()->sort();
        $user = Auth::user();
        return view('times.create',compact('user','missions','collabs','page'));
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
            'date_start'=>'required',
            'date_finish'=>'required',
            'start_time'=>'required',
            'finish_time'=>'required',
            'elapsed_time'=>'required',

        ]);

        $time = new Time();
        $time->create($data);
        return redirect(route('time.index'))->with('timeCreated',__('Time Added Successfully'));
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
        $page='time';
        $current_collab_name = $time->collab()->where('id', $time->collab_id)->value('collab_name');
        $current_collab_last_name = $time->collab()->where('id', $time->collab_id)->value('collab_last_name');
        $missions=Mission::get()->sort();
        $collabs=Collab::get()->sort();
        $user = Auth::user();


        return view('times.edit',compact('user','time','missions','collabs','current_collab_name','current_collab_last_name','page'));
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
            'date_start'=>'required',
            'date_finish'=>'required',
            'start_time'=>'required',
            'finish_time'=>'required',
            'elapsed_time'=>'required',

        ]);

        DB::table('times')
        ->where('id',$time->id)
        ->update([
            'mission_id' => $request->mission_id,
            'collab_id' => $request->collab_id,
            'date_start'=>$request->date_start,
            'date_finish'=>$request->date_finish,
            'start_time'=>$request->start_time,
            'finish_time'=>$request->finish_time,
            'elapsed_time'=>$request->elapsed_time,

        ]);

        $current_collab_name = Collab::find($request->collab_id)->value('collab_name');


        return redirect(route('time.edit',compact('time','current_collab_name')))->with('timeUpdated',__('Time Updated Successfully'));
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
        return redirect()->route('time.index')->with('timeDeleted',__('Time Deleted Successfully'));
    }
}
