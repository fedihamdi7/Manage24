<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('admin')->except(['index']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page='profile';
        $user = Auth::user();
        // dd($user);


        return view('profile.profile',compact('user','page'));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birth' => 'date|nullable',
            'role' => 'required',
            'phone' => 'nullable|digits:8',
            'adresse1' => 'nullable',
            'adresse2' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',

        ]);

        DB::table('users')
        ->where('id',$user->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'birth' => $request->birth,
            'role' => $request->role,
            'phone' => $request->phone,
            'adresse1' => $request->adresse1,
            'adresse2' => $request->adresse2,
            'city' => $request->city,
            'state' => $request->state,
        ]);






        return redirect(route('user.index',compact('user')))->with('profileUpdated','Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
