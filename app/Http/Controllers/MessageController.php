<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=null;
        $page='chat';
        $user = Auth::user();
        $messages=null;
        $conve=null;

        $users= DB::table('users')->select('users.id', 'users.name', 'users.avatar', 'users.email', DB::raw('count(messages.is_read) as unread'))
        ->leftJoin('messages','users.id','messages.from')
        ->where('messages.to',Auth::id())
        ->where('users.id','!=',Auth::id())
        ->groupBy('users.id','users.name', 'users.avatar', 'users.email')->get()->toArray();


        $other_users = DB::table('users')->where('id','!=',Auth::id())->get()->toArray();

        $oua =[];
        $ua =[];
        foreach ($other_users as $ou) {
            array_push($oua,$ou->id);
        }
        foreach ($users as $u) {
            array_push($ua,$u->id);
         }
        $r=array_diff($oua,$ua);
         $finally = [];
        foreach ($other_users as $ouf) {
            if (in_array($ouf->id,$r)) {
                array_push($finally,$ouf->id);

            }
        }
        $real=[];
        foreach ($finally as $value) {
            $aa=DB::table('users')->where('id',$value)->get();
            array_push($real,$aa);

        }

        return view('chat.chat',compact('page','user','users','messages','conve','user_id','real'));
    }

    public function getMessage($user_id)
    {

        $page='chat';
        $user = Auth::user();
        $users= DB::table('users')->select('users.id', 'users.name', 'users.avatar', 'users.email', DB::raw('count(messages.is_read) as unread'),DB::raw('max(messages.id) as last_message'))
        ->leftJoin('messages','users.id','messages.from')
        ->where('messages.to',Auth::id())
        ->where('users.id','!=',Auth::id())
        ->groupBy('users.id','users.name', 'users.avatar', 'users.email')->get();
        $my_id = Auth::id();

        $other_users = DB::table('users')->where('id','!=',Auth::id())->get()->toArray();

        $oua =[];
        $ua =[];
        foreach ($other_users as $ou) {
            array_push($oua,$ou->id);
        }
        foreach ($users as $u) {
            array_push($ua,$u->id);
         }
        $r=array_diff($oua,$ua);
         $finally = [];
        foreach ($other_users as $ouf) {
            if (in_array($ouf->id,$r)) {
                array_push($finally,$ouf->id);

            }
        }
        $real=[];
        foreach ($finally as $value) {
            $aa=DB::table('users')->where('id',$value)->get();
            array_push($real,$aa);

        }
        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get()->sortbyDesc('id');
        // dd($user_id);
        $conve = User::where('id', $user_id)->get()->first();
        // dd($user);
        return view('chat.chat',compact('page','user','messages','users','conve','user_id','real'));
    }

    public function sendMessage(Request $request , $to){
        $data = $request->validate([
            'msg_body' => 'required'
        ]);
        DB::table('messages')->insert(
            ['from' => Auth::id(),
                'to' => $to,
                'message'=>$request->msg_body
            ]
        );
        return Redirect::back();

    }

}
