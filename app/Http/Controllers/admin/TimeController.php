<?php

namespace App\Http\Controllers\admin;

use App\Collab;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Time;
use App\User;
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
        // $this->middleware('admin')->except(['index','pdf']);


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
        $times = Time::paginate(10);

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
        $collabs = Collab::join('users','collabs.id','users.id')->where('users.role','Collaborator')->get()->sort();
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
            'date'=>'required',
            'start_time'=>'required',
            'finish_time'=>'required|after:start_time',
        ]);
        // $elapsed=($request->finish_time) - ($request->start_time);
        $fdate = Carbon::parse($request->start_time);
        $tdate = Carbon::parse($request->finish_time);
        $hours = $tdate->diffInHours($fdate);
        $seconds = $tdate->diffInSeconds($fdate)/60;
        $sec =gmdate("s", $seconds);
        $data['elapsed_time'] =$hours.':'.$sec;




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
        $current_collab_name = DB::table('users')->where('id',$time->collab_id)->value('name');
        // dd($current_collab_name);
        // $current_collab_last_name = $time->collab()->where('id', $time->collab_id)->value('collab_last_name');
        $missions=Mission::get()->sort();
        $collabs = Collab::join('users','collabs.id','users.id')->where('users.role','Collaborator')->get()->sort();
        // dd($collabs);
        $user = Auth::user();


        return view('times.edit',compact('user','time','missions','collabs','current_collab_name','page'));
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
            'finish_time'=>'required',

        ]);
        $fdate = Carbon::parse($request->start_time);
        $tdate = Carbon::parse($request->finish_time);
        $hours = $tdate->diffInHours($fdate);
        $seconds = $tdate->diffInSeconds($fdate)/60;
        $sec =gmdate("s", $seconds);
        // $data['elapsed_time'] =$hours.':'.$sec;

        DB::table('times')
        ->where('id',$time->id)
        ->update([
            'mission_id' => $request->mission_id,
            'collab_id' => $request->collab_id,
            'date'=>$request->date,
            'start_time'=>$request->start_time,
            'finish_time'=>$request->finish_time,
            'elapsed_time'=>$hours.':'.$sec,

        ]);

        $current_collab_name = DB::table('users')->where('id',$time->collab_id)->value('name');



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
