<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
class ServiceController extends Controller
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
        $page='service';
        $user = Auth::user();
        $services = Service::get()->sort();

        return view('services.services',compact('user','services','page'));
    }

    public function pdf(){
        $page='service';
        $user = Auth::user();
        $services = Service::get()->sort();
        $time = Carbon::now();


        $pdf = PDF::loadview('services.pdf',compact('user','services','page','time'));
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
        $page='service';
        $user = Auth::user();
        return view('services.create',compact('user','page'));

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
            'service_ligne' => 'required',
            'description' => 'required',

        ]);

        $service = new Service();
        $service->create($data);
        return redirect(route('service.index',))->with('serviceCreated',__('Service Line Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $page='service';
        $user = Auth::user();
        // $services = Service::get()->sort();

        return view('services.edit',compact('user','service','page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

        $data = $request->validate([
            'service_ligne' => 'required',
            'description' => 'required',
        ]);

        DB::table('services')
        ->where('id',$service->id)
        ->update([
            'service_ligne' => $request->service_ligne,
            'description' => $request->description,

        ]);

        return redirect(route('service.edit',compact('service')))->with('serviceUpdated',__('Service Ligne Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('serviceDeleted',__('Service Ligne Deleted Successfully'));
    }
}
