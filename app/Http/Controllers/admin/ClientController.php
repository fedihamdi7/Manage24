<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Collab;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
class ClientController extends Controller
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
        $page='client';
        $user = Auth::user();
        // $clients = Client::get()->sort();
        $clients = Client::paginate(5);
        // dd($clients);
        // dd($clients->user()->where('id',$clients->contact_person));

        return view('clients.clients',compact('user','clients','page'));
    }
    public function pdf(){
        $page='client';
        $user = Auth::user();
        $clients = Client::get()->sort();
        $time = Carbon::now();


        $pdf = PDF::loadview('clients.pdf',compact('user','clients','page','time'));
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
        $page='client';
        $user = Auth::user();
        $collabs = Collab::join('users','collabs.id','users.id')->get()->sort();
        return view('clients.create',compact('user','page','collabs'));
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
            'fax' => 'nullable|size:8',
            'email' => 'email',
            'user_id' => 'required',
            'website' => 'required',
            'type' => 'required',
        ]);

        $client = new Client();
        $client->create($data);
        return redirect(route('client.index',))->with('clientCreated',__('Client Added Successfully'));
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
        $page='client';
        $user = Auth::user();
        $client = client::find($client->id);
        $collabs=User::where('role','Collaborator')->get()->sort();
        $current_collab = $client->user()->where('id',$client->user_id)->get()->first();
        return view('clients.edit',compact('user','client','page','current_collab','collabs'));
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
            'fax' => 'nullable|size:8',
            'email' => 'email',
            'user_id' => 'required|numeric',
            'website' => 'required',
            'type' => 'required',
        ]);

        DB::table('clients')
        ->where('id',$client->id)
        ->update([
            'social_reason' => $request->social_reason,
            'activity' => $request->activity,
            'adresse1' => $request->adresse1,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'website' => $request->website,
            'type' => $request->type,

        ]);

        return redirect(route('client.edit',compact('client')))->with('clientUpdated',__('Client Updated Successfully'));
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
        return redirect()->route('client.index')->with('clientDeleted',__('Client Deleted Successfully'));
    }
}
