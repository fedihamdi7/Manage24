<?php

namespace App\Http\Controllers\admin;

use App\Grade;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin')->except(['index','pdf']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $page='grade';
        $user = Auth::user();
        $grades = Grade::get()->sort();


        return view('grades.grades',compact('user','grades','page'));
    }

    public function pdf(){
        $page='mission';
        $user = Auth::user();
        $grades = Grade::get()->sort();
        $time = Carbon::now();


        $pdf = PDF::loadview('grades.pdf',compact('user','grades','page','time'));
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
        $page='grade';
        $grades=Grade::get()->sort();
        $user = Auth::user();
        return view('grades.create',compact('user','page','grades'));
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
            'grade' => 'required',
        ]);

        $grade = new Grade();
        $grade->create($data);
        return redirect(route('grade.index',))->with('gradeCreated',__('Grade Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $page='mission';
        $user = Auth::user();

        return view('grades.edit',compact('page','grade','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $data = $request->validate([
            'grade' => 'required',
        ]);

        DB::table('grades')
        ->where('id',$grade->id)
        ->update([
            'grade' => $request->grade,


        ]);

        return redirect(route('grade.edit',compact('grade')))->with('gradeUpdated',__('Grade Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grade.index')->with('gradeDeleted',__('Grade Deleted Successfully'));
    }
}
