<?php

namespace App\Http\Controllers\admin;

use App\Collab;
use App\Grade;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Service;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnalyticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin')->except(['index','pdf']);

    }


    public function MG()
    {
        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $missions=NULL;

        return view('analytics.MG',compact('user','page','missions','missions_list'));
    }
    public function MGsearch(Request $request)
    {

        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();

       $request->validate([
            'date_start' => 'required',
            'date_finish' => 'required'

        ]);

        $missions=Mission::where('date_start','>=',$request->date_start)->where('date_finish','<=',$request->date_finish)->get();

        // foreach ($missions as $m) {
        //     $ds = strtotime($m->date_start);
        //     $df = strtotime($m->date_finish);
        //     $totalSecondsDiff = abs($ds-$df); //42600225
        //     $totalMinutesDiff = $totalSecondsDiff/60; //710003.75
        //     $totalHoursDiff   = $totalSecondsDiff/60/60;//11833.39
        //     $totalDaysDiff    = $totalSecondsDiff/60/60/24; //493.05
        //     $totalMonthsDiff  = $totalSecondsDiff/60/60/24/30; //16.43
        //     $totalYearsDiff   = $totalSecondsDiff/60/60/24/365; //1.35

        // }

        return view('analytics.MG',compact('user','page','missions','missions_list'));

    }


    public function M()
    {
        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $missions=NULL;


        return view('analytics.M',compact('user','page','missions','missions_list'));
    }
    public function Msearch(Request $request)
    {

        // dd($request);
        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $missions=null;
        $tt=null;
       $request->validate([
            'date_start' => 'required',
            'date_finish' => 'required',
            'mission_id' => 'required|numeric'
        ]);
        $data=Mission::where('date_start','>=',$request->date_start)->where('date_finish','<=',$request->date_finish)->where('id',$request->mission_id)->get();
        // dd($data->count());
        if ($data->count() != 0) {
            # code...
            $missions = Time::where('mission_id',$data->first()->id)->get();



                $sum = strtotime('00:00:00');

                $totaltime = 0;

                foreach( $missions as $el ) {

                    // Converting the time into seconds
                    $element = $el->elapsed_time;
                    $timeinsec = strtotime($element) - $sum;

                    // Sum the time with previous value
                    $totaltime = $totaltime + $timeinsec;
                }

                // Totaltime is the summation of all
                // time in seconds

                // Hours is obtained by dividing
                // totaltime with 3600
                $h = intval($totaltime / 3600);

                $totaltime = $totaltime - ($h * 3600);

                // Minutes is obtained by dividing
                // remaining total time with 60
                $m = intval($totaltime / 60);

                // Remaining value is seconds
                $s = $totaltime - ($m * 60);
                $tt=$h.':'.$m.':'.$s;
                // dd($tt);
            }
        // dd($missions);
        return view('analytics.M',compact('user','page','missions','missions_list','tt'));

    }


    public function C()
    {
        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs=Collab::get()->sort();
        $missions=NULL;


        return view('analytics.C',compact('user','page','missions_list','collabs','missions'));
    }
    public function Csearch(Request $request)
    {

        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs=Collab::get()->sort();


       $request->validate([
            'date_start' => 'required',
            'date_finish' => 'required',
            'collab_id' => 'required|numeric'
        ]);


            $missions = Time::join('missions', 'times.mission_id', '=', 'missions.id')
            ->where('times.collab_id',$request->collab_id)
            ->where('missions.date_start','>=',$request->date_start)
            ->where('missions.date_finish','<=',$request->date_finish)
            ->select('missions.*')
            ->groupBy('mission_id')
            ->get(['missions.mission_name'])->sort();

        // dd($missions);
        return view('analytics.C',compact('user','page','missions','collabs','missions_list'));

    }


    public function CD()
    {
        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs=Collab::get()->sort();
        $missions=NULL;
        $tt=null;


        return view('analytics.CD',compact('user','page','missions_list','collabs','missions'));
    }
    public function CDsearch(Request $request)
    {

        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs=Collab::get()->sort();


       $request->validate([
            'date_start' => 'required',
            'date_finish' => 'required',
            'collab_id' => 'required|numeric'
        ]);


            $missions = Time::join('missions', 'times.mission_id', '=', 'missions.id')
            ->join('collabs','times.collab_id','=','collabs.id')
            ->where('times.collab_id',$request->collab_id)
            ->where('missions.date_start','>=',$request->date_start)
            ->where('missions.date_finish','<=',$request->date_finish)
            ->select('missions.*','times.id as time_id','times.elapsed_time')
            // ->groupBy('mission_id')
            ->get()->sort();

            $sum = strtotime('00:00:00');

            $totaltime = 0;

            foreach( $missions as $el ) {

                // Converting the time into seconds
                $element = $el->elapsed_time;
                $timeinsec = strtotime($element) - $sum;

                // Sum the time with previous value
                $totaltime = $totaltime + $timeinsec;
            }

            // Totaltime is the summation of all
            // time in seconds

            // Hours is obtained by dividing
            // totaltime with 3600
            $h = intval($totaltime / 3600);

            $totaltime = $totaltime - ($h * 3600);

            // Minutes is obtained by dividing
            // remaining total time with 60
            $m = intval($totaltime / 60);

            // Remaining value is seconds
            $s = $totaltime - ($m * 60);
            $tt=$h.':'.$m.':'.$s;



        // dd($missions);
        return view('analytics.CD',compact('user','page','tt','missions','collabs','missions_list'));

    }


    public function SL()
    {

        $page='analytics';
        $user = Auth::user();
        $services_list=Service::get()->sort();
        // $collabs=Collab::get()->sort();
        $missions=NULL;


        return view('analytics.SL',compact('user','page','services_list','missions'));
    }
    public function SLsearch(Request $request)
    {


        $page='analytics';
        $user = Auth::user();
        $services_list=Service::get()->sort();
        $collabs=Collab::get()->sort();


       $request->validate([
            'date_start' => 'required',
            'date_finish' => 'required',
            'service_id' => 'required|numeric'
        ]);


            $missions = Mission::join('services', 'missions.service_id', '=', 'services.id')
            ->where('missions.service_id',$request->service_id)
            ->where('missions.date_start','>=',$request->date_start)
            ->where('missions.date_finish','<=',$request->date_finish)
            ->select('missions.*','services.service_ligne')
            // ->groupBy('mission_id')
            ->get()->sort();

        // dd($missions);
        return view('analytics.SL',compact('user','page','services_list','missions'));


    }


    public function G()
    {
        $page='analytics';
        $user = Auth::user();
        $grade_list=Grade::get()->sort();
        $missions=NULL;

        return view('analytics.G',compact('user','page','missions','grade_list'));
    }
    public function Gsearch(Request $request)
    {

        $page='analytics';
        $user = Auth::user();
        $grade_list=Grade::get()->sort();

       $request->validate([
            'grade_id' => 'required|numeric'
        ]);

        $missions = Collab::join('grades', 'collabs.grade_id', '=', 'grades.id')
        ->where('collabs.grade_id',$request->grade_id)
        ->get()->sort();
        // dd($missions);
        return view('analytics.G',compact('user','page','missions','grade_list'));

    }



}
