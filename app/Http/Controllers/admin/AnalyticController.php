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

       $request->validate([
            'date_start' => 'required',
            'date_finish' => 'required',
            'mission_id' => 'required|numeric'
        ]);
        $missions=Mission::where('date_start','>=',$request->date_start)->where('date_finish','<=',$request->date_finish)->where('id',$request->mission_id)->get();

        return view('analytics.M',compact('user','page','missions','missions_list'));

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
            ->where('times.collab_id',$request->collab_id)
            ->where('missions.date_start','>=',$request->date_start)
            ->where('missions.date_finish','<=',$request->date_finish)
            ->select('missions.*')
            ->groupBy('mission_id')
            ->get(['missions.mission_name'])->sort();

        // dd($missions);
        return view('analytics.CD',compact('user','page','missions','collabs','missions_list'));

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
            // ->select('missions.*')
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