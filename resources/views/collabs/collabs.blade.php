@include("../layouts.sidebar")

  <section class="home-section">
    @if (session('collabCreated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('collabCreated') }}
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
    <a name="" id="" class="btn btn-perso" href="{{route('collab.create')}}" role="button" >Add Collaborator</a>
    @endif

    <table class="table caption-top">
        <caption class="cap-style">Collaborators List</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date In</th>
            <th scope="col">Date Out</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            @if ($user->role == "Admin")
            <th scope="col">Edit</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ( $collabs as $collab )
                <tr>
                    <th scope="row">{{$collab->id}}</th>
                    <td>{{$collab->collab_name ?? 'N/A'}}</td>
                    <td>{{$collab->collab_last_name ?? 'N/A'}}</td>
                    <td>{{$collab->collab_dateIn ?? 'N/A'}}</td>
                    <td>{{$collab->collab_dateOut ?? 'N/A'}}</td>
                    <td>{{$collab->collab_phone ?? 'N/A'}}</td>
                    <td>{{$collab->collab_mail ?? 'N/A'}}</td>
                    @if ($user->role == "Admin")
                    <td >

                        <a href="{{ route('collab.edit',['collab'=>$collab->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
