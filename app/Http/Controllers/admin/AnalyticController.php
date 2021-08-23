<?php

namespace App\Http\Controllers\admin;

use App\Collab;
use App\Grade;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Service;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


class AnalyticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin')->except(['index','pdf']);

    }

    // ***********************Global mission***********************

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
        $hours = Time::where('date','>=',$request->date_start)->where('date','<=',$request->date_finish)->get()->groupby('mission_id');
        // dd($hours);

        $allmission=[];
        foreach ($hours as $mission) {
            $eachmission=[];
            foreach ($mission as $miss) {
            array_push($eachmission,$miss->elapsed_time);
            }
            $sum = strtotime('00:00:00');
            $totaltime = 0;
                foreach( $eachmission as $element ) {
                    // Converting the time into seconds
                    $timeinsec = strtotime($element) - $sum;

                    // Sum the time with previous value
                    $totaltime = $totaltime + $timeinsec;
                }
                $h = intval($totaltime / 3600);
                $totaltime = $totaltime - ($h * 3600);
                // Minutes is obtained by dividing
                // remaining total time with 60
                $m = intval($totaltime / 60);
                // Remaining value is seconds
                $s = $totaltime - ($m * 60);
                if ($s<10) {
                    $s='0'.$s;
                }
                if ($m<10) {
                    $m='0'.$m;
                }
                $tt=$h.':'.$m.':'.$s;
                array_push($allmission,$tt);
            }


            // dd($allmission);

            $s = $request->date_start;
            $f=$request->date_finish;
            // dd($dates);
        return view('analytics.MG',compact('user','page','missions','missions_list','s','f','allmission'));

    }

    // ***********************Mission***********************

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
                if ($s<10) {
                    $s='0'.$s;
                }
                if ($m<10) {
                    $m='0'.$m;
                }
                $tt=$h.':'.$m.':'.$s;
                // dd($tt);
            }
        // dd($missions);


        $star = $request->date_start;
        $fini=$request->date_finish;
        $misid=$request->mission_id;
        return view('analytics.M',compact('user','page','missions','missions_list','tt','star','fini','misid'));

    }


    // ***********************Collab***********************


    public function C()
    {
        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs = Collab::join('users','collabs.id','users.id')->where('users.role','Collaborator')->get()->sort();

        $missions=NULL;


        return view('analytics.C',compact('user','page','missions_list','collabs','missions'));
    }
    public function Csearch(Request $request)
    {

        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs = Collab::join('users','collabs.id','users.id')->where('users.role','Collaborator')->get()->sort();



       $request->validate([
            'date_start' => 'required',
            'date_finish' => 'required',
            'collab_id' => 'required|numeric'
        ]);
        $hours = Time::where('date','>=',$request->date_start)->where('date','<=',$request->date_finish)->get()->groupby('mission_id');
        // dd($hours);
        $allmission=[];
        foreach ($hours as $mission) {
            $eachmission=[];
            foreach ($mission as $miss) {
            array_push($eachmission,$miss->elapsed_time);
            }
            $sum = strtotime('00:00:00');
            $totaltime = 0;
                foreach( $eachmission as $element ) {
                    // Converting the time into seconds
                    $timeinsec = strtotime($element) - $sum;

                    // Sum the time with previous value
                    $totaltime = $totaltime + $timeinsec;
                }
                $h = intval($totaltime / 3600);
                $totaltime = $totaltime - ($h * 3600);
                // Minutes is obtained by dividing
                // remaining total time with 60
                $m = intval($totaltime / 60);
                // Remaining value is seconds
                $s = $totaltime - ($m * 60);
                if ($s<10) {
                    $s='0'.$s;
                }
                if ($m<10) {
                    $m='0'.$m;
                }
                $tt=$h.':'.$m.':'.$s;
                array_push($allmission,$tt);
            }
            $sumSeconds = 0;
            foreach($allmission as $time) {
                $explodedTime = explode(':', $time);
                $seconds = $explodedTime[0]*3600+$explodedTime[1]*60+$explodedTime[2];
                $sumSeconds =$sumSeconds + $seconds;
            }
            $hours = floor($sumSeconds/3600);
            $minutes = floor(($sumSeconds % 3600)/60);
            $seconds = (($sumSeconds%3600)%60);

            if ($seconds<10) {
                $seconds='0'.$seconds;
            }
            if ($minutes<10) {
                $minutes='0'.$minutes;
            }
            $tt = $hours.':'.$minutes.':'.$seconds;
            // dd($tt);

            $missions = Time::join('missions', 'times.mission_id', '=', 'missions.id')
            ->where('times.collab_id',$request->collab_id)
            ->where('missions.date_start','>=',$request->date_start)
            ->where('missions.date_finish','<=',$request->date_finish)
            ->select('missions.*')
            ->groupBy('mission_id')
            ->get(['missions.mission_name'])->sort();

            $lecollab=Collab::join('users','collabs.id','users.id')->where('users.id',$request->collab_id)->select('name')->get()->first();
            // dd($lecollab);
            $start = $request->date_start;
            $fini=$request->date_finish;
            $cola=$request->collab_id;
        // dd($missions);
        return view('analytics.C',compact('user','page','lecollab','missions','tt','collabs','missions_list','allmission','start','fini','cola'));

    }

    // ***********************Collab Details***********************

    public function CD()
    {
        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs = Collab::join('users','collabs.id','users.id')->where('users.role','Collaborator')->get()->sort();
        $missions=NULL;
        $tt=null;


        return view('analytics.CD',compact('user','page','missions_list','collabs','missions'));
    }
    public function CDsearch(Request $request)
    {

        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs = Collab::join('users','collabs.id','users.id')->where('users.role','Collaborator')->get()->sort();



       $request->validate([
            'date_start' => 'required',
            'date_finish' => 'required',
            'collab_id' => 'required|numeric'
        ]);


            $missions = Time::join('missions', 'times.mission_id', '=', 'missions.id')
            ->join('collabs','times.collab_id','=','collabs.id')
            ->join('users','users.id','=','collabs.id')
            ->where('times.collab_id',$request->collab_id)
            ->where('times.mission_id',$request->mission_id)
            ->where('missions.date_start','>=',$request->date_start)
            ->where('missions.date_finish','<=',$request->date_finish)
            ->select('times.*','times.id as time_id','times.elapsed_time','missions.mission_name','users.name')
            // ->groupBy('mission_id')
            ->get()->sort();
            // dd($missions);

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
            if ($s<10) {
                $s='0'.$s;
            }
            if ($m<10) {
                $m='0'.$m;
            }
            $tt=$h.':'.$m.':'.$s;


            $start = $request->date_start;
            $fini=$request->date_finish;
            $col=$request->collab_id;
            $miss=$request->mission_id;

        // dd($missions);
        return view('analytics.CD',compact('user','page','tt','missions','collabs','missions_list','start','fini','col','miss'));

    }


    // ***********************Service Line***********************


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
            $s = $request->date_start;
            $f=$request->date_finish;
            $serv=$request->service_id;
        // dd($missions);
        return view('analytics.SL',compact('user','page','services_list','missions','s','f','serv'));


    }

    // ***********************Grade***********************

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
        ->join('users','collabs.id','users.id')
        ->where('collabs.grade_id',$request->grade_id)
        ->get()->sort();
        // dd($missions);
        $g=$request->grade_id;
        return view('analytics.G',compact('user','page','missions','grade_list','g'));

    }



    // **********************PDF***********************
    // **********************PDF***********************
    // **********************PDF***********************
    // **********************PDF***********************
    // **********************PDF***********************

    public function pdfMG($s,$f){
        $page='analytics';
        $user = Auth::user();
        $time = Carbon::now();

        $missions=Mission::where('date_start','>=',$s)->where('date_finish','<=',$f)->get();
        $hours = Time::where('date','>=',$s)->where('date','<=',$f)->get()->groupby('mission_id');
        // dd($hours);

        $allmission=[];
        foreach ($hours as $mission) {
            $eachmission=[];
            foreach ($mission as $miss) {
            array_push($eachmission,$miss->elapsed_time);
            }
            $sum = strtotime('00:00:00');
            $totaltime = 0;
                foreach( $eachmission as $element ) {
                    // Converting the time into seconds
                    $timeinsec = strtotime($element) - $sum;

                    // Sum the time with previous value
                    $totaltime = $totaltime + $timeinsec;
                }
                $h = intval($totaltime / 3600);
                $totaltime = $totaltime - ($h * 3600);
                // Minutes is obtained by dividing
                // remaining total time with 60
                $m = intval($totaltime / 60);
                // Remaining value is seconds
                $s = $totaltime - ($m * 60);
                if ($s<10) {
                    $s='0'.$s;
                }
                if ($m<10) {
                    $m='0'.$m;
                }
                $tt=$h.':'.$m.':'.$s;
                array_push($allmission,$tt);
            }


        $pdf = PDF::loadview('analytics.MG_pdf',compact('user','missions','page','time','allmission'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }

    public function pdfM($s,$f,$m){
        $page='analytics';
        $user = Auth::user();
        $time = Carbon::now();

        $missions_list=Mission::get()->sort();
        $missions=null;
        $tt=null;

        $data=Mission::where('date_start','>=',$s)->where('date_finish','<=',$f)->where('id',$m)->get();
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
                if ($s<10) {
                    $s='0'.$s;
                }
                if ($m<10) {
                    $m='0'.$m;
                }
                $tt=$h.':'.$m.':'.$s;
                // dd($tt);
            }
        // dd($missions);


        $pdf = PDF::loadview('analytics.M_pdf',compact('user','missions','page','time','tt'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }


    public function pdfC($start,$fini,$cola){
        $page='analytics';
        $user = Auth::user();
        $time_now = Carbon::now();
        $missions_list=Mission::get()->sort();
        $collabs = Collab::join('users','collabs.id','users.id')->where('users.role','Collaborator')->get()->sort();


        $hours = Time::where('date','>=',$start)->where('date','<=',$fini)->get()->groupby('mission_id');
        // dd($hours);
        $allmission=[];
        foreach ($hours as $mission) {
            $eachmission=[];
            foreach ($mission as $miss) {
            array_push($eachmission,$miss->elapsed_time);
            }
            $sum = strtotime('00:00:00');
            $totaltime = 0;
                foreach( $eachmission as $element ) {
                    // Converting the time into seconds
                    $timeinsec = strtotime($element) - $sum;

                    // Sum the time with previous value
                    $totaltime = $totaltime + $timeinsec;
                }
                $h = intval($totaltime / 3600);
                $totaltime = $totaltime - ($h * 3600);
                // Minutes is obtained by dividing
                // remaining total time with 60
                $m = intval($totaltime / 60);
                // Remaining value is seconds
                $s = $totaltime - ($m * 60);
                if ($s<10) {
                    $s='0'.$s;
                }
                if ($m<10) {
                    $m='0'.$m;
                }
                $tt=$h.':'.$m.':'.$s;
                array_push($allmission,$tt);
            }
            $sumSeconds = 0;
            foreach($allmission as $time) {
                $explodedTime = explode(':', $time);
                $seconds = $explodedTime[0]*3600+$explodedTime[1]*60+$explodedTime[2];
                $sumSeconds =$sumSeconds + $seconds;
            }
            $hours = floor($sumSeconds/3600);
            $minutes = floor(($sumSeconds % 3600)/60);
            $seconds = (($sumSeconds%3600)%60);

            if ($seconds<10) {
                $seconds='0'.$seconds;
            }
            if ($minutes<10) {
                $minutes='0'.$minutes;
            }
            $tt = $hours.':'.$minutes.':'.$seconds;

            $missions = Time::join('missions', 'times.mission_id', '=', 'missions.id')
            ->where('times.collab_id',$cola)
            ->where('missions.date_start','>=',$start)
            ->where('missions.date_finish','<=',$fini)
            ->select('missions.*')
            ->groupBy('mission_id')
            ->get(['missions.mission_name'])->sort();

            $lecollab=Collab::join('users','collabs.id','users.id')->where('users.id',$cola)->select('name')->get()->first();



        $pdf = PDF::loadview('analytics.C_pdf',compact('user','lecollab','allmission','tt','missions','page','time_now'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }
    public function pdfCD($start,$fini,$col,$miss){
        $page='analytics';
        $user = Auth::user();
        $time = Carbon::now();

        $missions = Time::join('missions', 'times.mission_id', '=', 'missions.id')
            ->join('collabs','times.collab_id','=','collabs.id')
            ->join('users','users.id','=','collabs.id')
            ->where('times.collab_id',$col)
            ->where('times.mission_id',$miss)
            ->where('missions.date_start','>=',$start)
            ->where('missions.date_finish','<=',$fini)
            ->select('times.*','times.id as time_id','times.elapsed_time','missions.mission_name','users.name')
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
        if ($s<10) {
            $s='0'.$s;
        }
        if ($m<10) {
            $m='0'.$m;
        }
        $tt=$h.':'.$m.':'.$s;


        $pdf = PDF::loadview('analytics.CD_pdf',compact('user','missions','page','time','tt'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }
    public function pdfSL($s,$f,$serv){
        $page='analytics';
        $user = Auth::user();
        $time = Carbon::now();

        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs=Collab::get()->sort();

        $missions = Mission::join('services', 'missions.service_id', '=', 'services.id')
        ->where('missions.service_id',$serv)
        ->where('missions.date_start','>=',$s)
        ->where('missions.date_finish','<=',$f)
        ->select('missions.*','services.service_ligne')
        // ->groupBy('mission_id')
        ->get()->sort();



        $pdf = PDF::loadview('analytics.SL_pdf',compact('user','missions','page','time'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }
    public function pdfG($g){
        $page='analytics';
        $user = Auth::user();
        $time = Carbon::now();

        $page='analytics';
        $user = Auth::user();
        $missions_list=Mission::get()->sort();
        $collabs=Collab::get()->sort();

        $missions = Collab::join('grades', 'collabs.grade_id', '=', 'grades.id')
        ->where('collabs.grade_id',$g)
        ->get()->sort();



        $pdf = PDF::loadview('analytics.G_pdf',compact('user','missions','page','time'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }
}
