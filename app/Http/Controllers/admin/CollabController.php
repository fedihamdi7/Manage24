<?php

namespace App\Http\Controllers\admin;

use App\Collab;
use App\Grade;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class CollabController extends Controller
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
        $page='collabs';
        $user = Auth::user();
        $collabs = Collab::get()->sort();
        return view('collabs.collabs',compact('user','collabs','page'));
    }
    public function pdf(){
        $page='collabs';
        $user = Auth::user();
        $collabs = Collab::get()->sort();
        $time = Carbon::now();


        $pdf = PDF::loadview('collabs.pdf',compact('user','collabs','page','time'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download("file.pdf");
    }
    public function pdfOne(Collab $collab){

        $current_grade = $collab->grade()->where('id', $collab->grade_id)->value('grade');
        $page='collabs';
        $user = Auth::user();
        $collabs = Collab::find($collab->id);
        $g= Grade::find($collab->grade_id)->value('grade');
        $grades=Grade::get()->sort();
        $time = Carbon::now();


        $pdf = PDF::loadview('collabs.onepdf',compact('user','collabs','collab','page','g','grades','current_grade','time'));
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
        $page='collabs';
        $user = Auth::user();
        $grades= Grade::get();
        $services=Service::get();
        return view('collabs.create',compact('user','page','grades','services'));
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
            'collab_name' => 'required',
            'collab_last_name' => 'required',
            'collab_dateIn' => 'required',
            'collab_dateOut' => 'required',
            'collab_phone' => 'required|size:8',
            'collab_mail' => 'required|email',
            'grade_id' => 'required',
            'service_id' => 'required',
        ]);

        $collab = new Collab();
        $collab->create($data);
        return redirect(route('collab.index',))->with('collabCreated','Collaborator Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function show(Collab $collabs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function edit(Collab $collab)
    {
        $current_grade = $collab->grade()->where('id', $collab->grade_id)->value('grade');
        $current_service = $collab->service()->where('id', $collab->service_id)->value('service_ligne');
        $page='collabs';
        $user = Auth::user();
        $collabs = Collab::find($collab->id);
        $g= Grade::find($collab->grade_id)->value('grade');
        $grades=Grade::get()->sort();
        $services = Service::get()->sort();
        return view('collabs.edit',compact('user','collabs','collab','page','g','grades','current_grade','services','current_service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collab $collab)
    {
        $data = $request->validate([
            'collab_name' => 'required',
            'collab_last_name' => 'required',
            'collab_dateIn' => 'required',
            'collab_dateOut' => 'required',
            'collab_phone' => 'required|size:8',
            'collab_mail' => 'required|email',
            'grade_id' => 'required',
            'service_id' => 'required',
        ]);

        DB::table('collabs')
        ->where('id',$request->id)
        ->update([
            'collab_name' => $request->collab_name,
            'collab_last_name' => $request->collab_last_name,
            'collab_dateIn' => $request->collab_dateIn,
            'collab_dateOut' => $request->collab_dateOut,
            'collab_phone' => $request->collab_phone,
            'collab_mail' => $request->collab_mail,
            'grade_id' => $request->grade_id,
            'service_id' => $request->service_id,
        ]);






        return redirect(route('collab.edit',compact('collab')))->with('collabUpdated','Collaborator Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collab $collab,Request $request)
    {
     $collab->delete();
     return redirect()->route('collab.index');
    }
}
