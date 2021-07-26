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
    <a name="" id="" class="btn btn-perso" href="{{route('mission.create')}}" role="button" >Add Mission</a>

    <table class="table caption-top">
        <caption class="cap-style" style="margin-left: 32%;">Missions List</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">Mission</th>
            <th scope="col">Service</th>
            <th scope="col">Client</th>
            <th scope="col">Date Start</th>
            <th scope="col">Date Finish</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $missions as $mission )
                <tr>
                    <th scope="row">{{$mission->id}}</th>
                    <td>{{$mission->service_id ?? 'N/A'}}</td>
                    <td>{{$mission->client_id ?? 'N/A'}}</td>
                    <td>{{$mission->date_start ?? 'N/A'}}</td>
                    <td>{{$mission->date_finish ?? 'N/A'}}</td>
                    <td >

                        <a href="{{ route('mission.edit',['mission'=>$mission->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                        {{-- <a href="" title="Delete {{ $mission->mission_name.' '.$mission->mission_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <i class="fa fa-ban" aria-hidden="true" ></i> </a>
                        <form action="{{ route('mission.destroy',['mission'=>$mission]) }}" method="POST" id="delete-event-form">
                        @csrf @method('DELETE')
                        </form> --}}

                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
  </section>

 <script src="{{ asset('js/dashboard.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
