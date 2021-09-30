@include("../layouts.sidebar")

  <section class="home-section">
    @if (session('timeCreated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('timeCreated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('timeDeleted'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('timeDeleted') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <a name="" id="" style="background-color: #fb1e00;" class="btn btn-perso" href="{{route('time.pdf')}}" role="button" ><i class="fa fa-download" aria-hidden="true">{{__('Download')}}</i></a>

    {{-- @if ($user->role == "Admin") --}}
    <a  id="" class="btn btn-perso" href="{{route('time.create')}}" role="button" >{{__('Add Time')}}</a>
    {{-- @endif --}}
    <table class="table caption-top">
        <caption class="cap-style" style="margin-left: 41%;">{{__('Times')}}</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Mission')}}</th>
            <th scope="col">{{__('Collaborator')}}</th>
            <th scope="col">{{__('Date')}}</th>
            {{-- <th scope="col">{{__('Finish Date')}}</th> --}}
            <th scope="col">{{__('Start Time')}}</th>
            <th scope="col">{{__('Finish Time')}}</th>
            <th scope="col">{{__('Elapsed Time')}}</th>
            @if ($user->role == "Admin")
            <th scope="col">{{__('Edit')}}</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ( $times as $time )
                <tr>
                    <th scope="row">{{$time->id}}</th>
                    {{-- <td>{{$time->mission_id ?? 'N/A'}}</td> --}}
                    <td>{{$time->mission()->where('id', $time->mission_id)->value('mission_name') ?? 'N/A'}}</td>
                    {{-- <td>{{$time->collab()->where('id', $time->collab_id)->user()->where('id',$time->collab_id)->value('name') ?? 'N/A'}}</td> --}}
                    <td>{{DB::table('users')->where('id',$time->collab_id)->value('name') ?? 'N/A'}}</td>
                    <td>{{$time->date ?? 'N/A'}}</td>
                    <td>{{$time->start_time ?? 'N/A'}}</td>
                    <td>{{$time->finish_time ?? 'N/A'}}</td>
                    <td>{{$time->elapsed_time ?? 'N/A'}}</td>
                    @if ($user->role == "Admin")
                    <td >

                        <a href="{{ route('time.edit',['time'=>$time->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>


                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
      </table>
      <div style="left: 45%;position: absolute;bottom: 0%;">
        {{ $times->links() }}
      </div>
  </section>

 <script src="{{ asset('js/dashboard.js') }}"></script>
 <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
