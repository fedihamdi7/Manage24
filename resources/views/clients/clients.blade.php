@include("../layouts.sidebar")

  <section class="home-section">
    @if (session('clientCreated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('clientCreated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('clientDeleted'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('clientDeleted') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <a name="" id="" class="btn btn-perso" href="{{route('client.create')}}" role="button" >Add Client</a>

    <table class="table caption-top">
        <caption class="cap-style">Clients List</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Social Reason</th>
            <th scope="col">Activity</th>
            <th scope="col">Adresse 1</th>
            <th scope="col">Adresse 2</th>
            <th scope="col">Phone</th>
            <th scope="col">Fax</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Person</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $clients as $client )
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->social_reason ?? 'N/A'}}</td>
                    <td>{{$client->activity ?? 'N/A'}}</td>
                    <td>{{$client->adresse1 ?? 'N/A'}}</td>
                    <td>{{$client->adresse2 ?? 'N/A'}}</td>
                    <td>{{$client->phone ?? 'N/A'}}</td>
                    <td>{{$client->fax ?? 'N/A'}}</td>
                    <td>{{$client->email ?? 'N/A'}}</td>
                    <td>{{$client->contact_person ?? 'N/A'}}</td>
                    <td >

                        <a href="{{ route('client.edit',['client'=>$client->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                        {{-- <a href="" title="Delete {{ $client->client_name.' '.$client->client_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <i class="fa fa-ban" aria-hidden="true" ></i> </a>
                        <form action="{{ route('client.destroy',['client'=>$client]) }}" method="POST" id="delete-event-form">
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
