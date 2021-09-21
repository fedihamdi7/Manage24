@include("../layouts.sidebar")
  <section class="home-section" style="background: #0a0a18;">
    <div class="home-content">
      <i class='bx bx-menu' style="color: white;"></i>
      <span class="text"></span>
    </div>

    <div class="container">
        <div class="users ">
            <div class="header">
                <div class="logo">
                    <img src="{{asset('images/chat.png')}} " alt="">
                </div>
                <div class="logo-name"> Chat</div>
            </div>

            <div class="users-flex">


                @if ($users == null)
                <div class="user-container user-container-no-chat">
                    <span style="margin-left: 37%;">No Chat Yet..</span>
                    </div>
                @else
                @foreach ( $users as $u )
                @php
                $unread=DB::table('messages')->where([['to',Auth::user()->id],['is_read',0],['from',$u->id]])->get()
                @endphp
                <div class="user-container @if ($user_id == $u->id) active @endif  @if (count($unread)>0) unread @endif">
                    <div class="user-avatar"> <img src="{{asset('/storage/images/profileImg/')}}/{{ $u->avatar}} " alt=""></div>
                    <div class="last-chat">
                        <a href="{{route('message',['id'=> $u->id])}} ">
                            <div class="user-name">{{$u->name}}</div>
                        </a>
                        @php
                          $last=  DB::table('messages')->select(DB::raw('max(id)'))->where([['to',$u->id],['from',Auth::user()->id]])->orwhere([['to',Auth::user()->id],['from',$u->id]])->value('message');
                        @endphp
                        <div class="last-msg"> {{ DB::table('messages')->where('id',$last)->value('message') }} </div>
                    </div>


                        @if (count($unread)>0)
                        <i class='bx bxs-chat bx-tada' style='color:#ff0000; position: absolute;right: 10%;' ></i>

                        @endif
                </div>
                @endforeach
                @endif
                {{-- <hr style="color: white;width: 94%; height:3px"><span style="color: white;position: absolute;top: 70.3%;background-color: #0a0a18;">{{__('Others')}}</span> --}}
                <div class="user-container" style="background-color: transparent;">
                <span style="margin-left: 37%;">Others</span>
                </div>
                @foreach ( $real as $rea )

                <div class="user-container">
                    <div class="user-avatar"> <img src="{{asset('/storage/images/profileImg/')}}/{{$rea->first()->avatar}} " alt=""></div>
                    <div class="last-chat">
                        <a href="{{route('message',['id'=> $rea->first()->id])}} ">
                            <div class="user-name">{{$rea->first()->name}}</div>
                        </a>
                        <div class="last-msg">No Messages..</div>
                    </div>
                </div>


                @endforeach
            </div>
        </div>
        <div class="chat">
            <div class="chat-name">
                @if ($conve == null)
                <img src="{{asset('/storage/images/profileImg/default_profile_image.jpg')}} " alt="">
                <div class="name">{{__('Messages')}}</div>
                @else
                <img src="{{asset('/storage/images/profileImg/')}}/{{ $conve->avatar}} " alt="">
                <div class="name">{{$conve->name}}</div>
                @endif

            </div>

            @if ($messages == null)
            <div class="messages">
                <div class="no-message"> {{__('No Messages')}} ... </div>
            </div>
            <div class="msg-input">
                <form action="#">
                    @csrf
                    <!-- <input class="input" type="text"> -->
                    <textarea name="msg_body" id="" cols="24" rows="3" disabled></textarea>
                    <button class="disabled" disabled> {{__('SEND')}} </button>
                </form>
            </div>
            @else
            <div class="messages">

                @foreach ( $messages as $m)


                <div class="msg">
                    @if ($m->from == Auth::user()->id)
                    <img src="{{asset('/storage/images/profileImg/')}}/{{ $user->avatar}} " alt="">
                    @else
                    <img src="{{asset('/storage/images/profileImg/')}}/{{ $conve->avatar}} " alt="">
                    @endif
                    <div class="msg-body"> {{$m->message}} </div>
                </div>
                @endforeach

            </div>

            <div class="msg-input">
                <form action="{{route('send-message',['to' => $conve->id])}}" method="POST">
                    @csrf
                    <!-- <input class="input" type="text"> -->
                    <textarea name="msg_body" id="" cols="24" rows="3" class="@error('msg_body') text-area-is-invalid @enderror"></textarea>
                    <button> {{__('SEND')}} </button>
                </form>
                @error('msg_body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @endif
        </div>
    </div>

</section>

<script src="{{ asset('js/dashboard.js') }}"></script>
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
{{-- <script src="{{ asset('js/chat.js') }}"></script> --}}


</body>
</html>
