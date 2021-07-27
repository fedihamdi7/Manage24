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
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <a  id="" class="btn btn-perso" href="{{route('time.create')}}" role="button" >Add time</a>
    <table class="table caption-top">
        <caption class="cap-style">Times</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mission</th>
            <th scope="col">Collaborator</th>
            <th scope="col">Date</th>
            <th scope="col">Start Time</th>
            <th scope="col">Elapsed Time</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $times as $time )
                <tr>
                    <th scope="row">{{$time->id}}</th>
                    <td>{{$time->mission_id ?? 'N/A'}}</td>
                    <td>{{$time->collab_id ?? 'N/A'}}</td>
                    <td>{{$time->date ?? 'N/A'}}</td>
                    <td>{{$time->start_time ?? 'N/A'}}</td>
                    <td>{{$time->elapsed_time ?? 'N/A'}}</td>
                    <td >

                        <a href="{{ route('time.edit',['time'=>$time->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>


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
