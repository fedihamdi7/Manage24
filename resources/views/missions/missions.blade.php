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
    <a name="" id="" style="background-color: #fb1e00;" class="btn btn-perso" href="{{route('mission.pdf')}}" role="button" ><i class="fa fa-download" aria-hidden="true">{{__('Download')}}</i></a>
    @if ($user->role == "Admin")
    <a name="" id="" class="btn btn-perso" href="{{route('mission.create')}}" role="button" >{{__('Add Mission')}}</a>
    @endif
    <table class="table caption-top">
        <caption class="cap-style" style="margin-left: 32%;">{{__('Missions List')}}</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">{{__('Mission')}}</th>
            <th scope="col">{{__('Service')}}</th>
            <th scope="col">{{__('Client')}}</th>
            <th scope="col">{{__('Start Date')}}</th>
            <th scope="col">{{__('Finish Date')}}</th>
            <th scope="col">{{__('Year')}}</th>
            <th scope="col">{{__('Path')}}</th>
            @if ($user->role == "Admin")
            <th scope="col">{{__('Edit')}}</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ( $missions as $mission )
                <tr>
                    <th scope="row">{{$mission->mission_name}}</th>
                    <td>{{$mission->service()->where('id', $mission->service_id)->value('service_ligne') ?? 'N/A'}}</td>
                    <td>{{$mission->client()->where('id', $mission->client_id)->value('social_reason') ?? 'N/A'}}</td>
                    <td>{{$mission->date_start ?? 'N/A'}}</td>
                    <td>{{$mission->date_finish ?? 'N/A'}}</td>
                    <td>{{$mission->year ?? 'N/A'}}</td>
                    <td>{{$mission->path ?? 'N/A'}}</td>
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
