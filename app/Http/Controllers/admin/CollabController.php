<?php

namespace App\Http\Controllers\admin;

use App\Collab;
use App\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page='collabs';
        $user = Auth::user();
        return view('collabs.create',compact('user','page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $data = $request->validate([
            'collab_name' => 'required',
            'collab_last_name' => 'required',
            'collab_dateIn' => 'required',
            'collab_dateOut' => 'required',
            'collab_phone' => 'required|size:8',
            'collab_mail' => 'required|email',
            'grade_id' => 'required',
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
        $page='collabs';
        $user = Auth::user();
        $collabs = Collab::find($collab->id);
        $g= Grade::find($collab->grade_id)->value('grade');
        $grades=Grade::get()->sort();

        return view('collabs.edit',compact('user','collabs','collab','page','g','grades','current_grade'));
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
