@include("../layouts.sidebar")

  <section class="home-section">
    @if (session('serviceCreated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('serviceCreated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    @if ($user->role == "Admin")
    <a name="{{route('service.create')}}" id="" class="btn btn-perso" href="{{route('collab.create')}}" role="button" >Add Service Line</a>
    @endif
    <table class="table caption-top">
        <caption class="cap-style">Service Line</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Service Ligne</th>
            <th scope="col">Description</th>
            @if ($user->role == "Admin")
            <th scope="col">Edit</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ( $services as $service )
                <tr>
                    <th scope="row">{{$service->id}}</th>
                    <td>{{$service->service_ligne ?? 'N/A'}}</td>
                    <td>{{$service->description ?? 'N/A'}}</td>
                    @if ($user->role == "Admin")
                    <td >

                        <a href="{{ route('service.edit',['service'=>$service->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                        {{-- <a href="" title="Delete {{ $collab->collab_name.' '.$collab->collab_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <i class="fa fa-ban" aria-hidden="true" ></i> </a>
                        <form action="{{ route('collab.destroy',['collab'=>$collab]) }}" method="POST" id="delete-event-form">
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
