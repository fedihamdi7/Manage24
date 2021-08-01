@include("../layouts.sidebar")

  <section class="home-section">
    @if (session('missionCreated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('missionCreated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('missionDeleted'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('missionDeleted') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <a name="" id="" style="background-color: #fb1e00;" class="btn btn-perso" href="{{route('mission.pdf')}}" role="button" ><i class="fa fa-download" aria-hidden="true">Download</i></a>
    @if ($user->role == "Admin")
    <a name="" id="" class="btn btn-perso" href="{{route('mission.create')}}" role="button" >Add Mission</a>
    @endif
    <table class="table caption-top">
        <caption class="cap-style" style="margin-left: 32%;">Missions List</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">Mission</th>
            <th scope="col">Service</th>
            <th scope="col">Client</th>
            <th scope="col">Start Time</th>
            <th scope="col">Finish Time</th>
            <th scope="col">Elapsed Time</th>
            @if ($user->role == "Admin")
            <th scope="col">Edit</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ( $missions as $mission )
                <tr>
                    <th scope="row">{{$mission->mission_name}}</th>
                    <td>{{$mission->service()->where('id', $mission->service_id)->value('service_ligne') ?? 'N/A'}}</td>
                    <td>{{$mission->client()->where('id', $mission->client_id)->value('social_reason') ?? 'N/A'}}</td>
                    <td>{{$mission->start_time ?? 'N/A'}}</td>
                    <td>{{$mission->end_time ?? 'N/A'}}</td>
                    <td>{{$mission->elapsed_time ?? 'N/A'}}</td>
                    @if ($user->role == "Admin")
                    <td >

                        <a href="{{ route('mission.edit',['mission'=>$mission->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                        {{-- <a href="" title="Delete {{ $mission->mission_name.' '.$mission->mission_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <i class="fa fa-ban" aria-hidden="true" ></i> </a>
                        <form action="{{ route('mission.destroy',['mission'=>$mission]) }}" method="POST" id="delete-event-form">
                        @csrf @method('DELETE')
                        </form> --}}

                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
      </table>
  </section>

 <script src="{{ asset('js/dashboard.js') }}"></script>
 <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
