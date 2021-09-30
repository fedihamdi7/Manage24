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
    <a name="" id="" style="background-color: #fb1e00;" class="btn btn-perso" href="{{route('client.pdf')}}" role="button" ><i class="fa fa-download" aria-hidden="true">{{__('Download')}}</i></a>
    @if ($user->role == "Admin")
    <a name="" id="" class="btn btn-perso" href="{{route('client.create')}}" role="button" >{{__('Add Client')}}</a>
    @endif
    <table class="table caption-top">
        <caption class="cap-style" style="margin-left: 46%;">{{__('Clients List')}}</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Social Reason')}}</th>
            <th scope="col">{{__('Activity')}}</th>
            <th scope="col">{{__('Adresse')}}</th>
            <th scope="col">{{__('Phone')}}</th>
            <th scope="col">{{__('Email')}}</th>
            <th scope="col">{{__('Contact Person')}}</th>
            <th scope="col">{{__('Website')}}</th>
            <th scope="col">{{__('Type')}}</th>
            @if ($user->role == "Admin")
            <th scope="col">{{__('Edit')}}</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ( $clients as $client )
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->social_reason ?? 'N/A'}}</td>
                    <td>{{$client->activity ?? 'N/A'}}</td>
                    <td>{{$client->adresse1 ?? 'N/A'}}</td>
                    <td>{{$client->phone ?? 'N/A'}}</td>
                    <td>{{$client->email ?? 'N/A'}}</td>
                    <td>{{$client->user()->where('id',$client->user_id)->value('name') ?? 'N/A'}}</td>
                    {{-- <td>{{$client->contact_person ?? 'N/A'}}</td> --}}
                    <td>{{$client->website ?? 'N/A'}}</td>
                    <td>{{$client->type ?? 'N/A'}}</td>
                    @if ($user->role == "Admin")
                    <td >

                        <a href="{{ route('client.edit',['client'=>$client->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                        {{-- <a href="" title="Delete {{ $client->client_name.' '.$client->client_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <i class="fa fa-ban" aria-hidden="true" ></i> </a>
                        <form action="{{ route('client.destroy',['client'=>$client]) }}" method="POST" id="delete-event-form">
                        @csrf @method('DELETE')
                        </form> --}}

                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
      </table>
      <div style="left: 45%;position: absolute;bottom: 0%;">
        {{ $clients->links() }}
      </div>
  </section>

 <script src="{{ asset('js/dashboard.js') }}"></script>
 <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
