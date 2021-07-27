<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $user = Auth::user();
        $clients = Client::get()->sort();

        return view('clients.clients',compact('user','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $user = Auth::user();
        return view('clients.create',compact('user'));
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
            'social_reason' => 'required',
            'activity' => 'required',
            'adresse1' => 'required',
            'phone' => 'required|size:8',
            'email' => 'email',
            'contact_person' => 'required',
        ]);

        $client = new Client();
        $client->create($data);
        return redirect(route('client.index',))->with('clientCreated','Client Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $user = Auth::user();
        $client = client::find($client->id);
        return view('clients.edit',compact('user','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'social_reason' => 'required',
            'activity' => 'required',
            'adresse1' => 'required',
            'phone' => 'required|size:8',
            'email' => 'email',
            'contact_person' => 'required',
        ]);

        DB::table('clients')
        ->where('id',$client->id)
        ->update([
            'social_reason' => $request->social_reason,
            'activity' => $request->activity,
            'adresse1' => $request->adresse1,
            'adresse2' => $request->adresse2,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'email' => $request->email,
            'contact_person' => $request->contact_person,

        ]);

        return redirect(route('client.edit',compact('client')))->with('clientUpdated','Client Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index')->with('clientDeleted','Client Deleted Successfully');
    }
}
