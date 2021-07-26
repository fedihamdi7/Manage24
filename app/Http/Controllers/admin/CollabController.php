<?php

namespace App\Http\Controllers\admin;

use App\Collabs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CollabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $collabs = Collabs::get()->sort();

        return view('collabs.collabs',compact('user','collabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function show(Collabs $collabs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function edit(Collabs $collab)
    {
        $user = Auth::user();
        $collabs = Collabs::find($collab->id);
        // dd($collabs);
        return view('collabs.edit',compact('user','collabs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collabs $collab)
    {
        $data = $request->validate([
            'collab_name' => 'required',
            'collab_last_name' => 'required',
            'collab_dateIn' => 'required',
            'collab_dateOut' => 'required',
            'collab_phone' => 'required|size:8',
            'collab_mail' => 'required|email',
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
        ]);






        return redirect(route('collab.edit',compact('collab')))->with('collabUpdated','Collaborator Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collabs  $collabs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collabs $collab,Request $request)
    {
     $collab->delete();
     return redirect()->route('collab.index');
    }
}
