@include("../layouts.sidebar")

  <section class="home-section">
    @if (session('gradeCreated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('gradeCreated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('gradeDeleted'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('gradeDeleted') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <a name="" id="" style="background-color: #fb1e00;" class="btn btn-perso" href="{{route('grade.pdf')}}" role="button" ><i class="fa fa-download" aria-hidden="true">Download</i></a>
    @if ($user->role == "Admin")
    <a name="" id="" class="btn btn-perso" href="{{route('grade.create')}}" role="button" >Add grade</a>
    @endif
    <table class="table caption-top" style="width: 36% !important; ">
        <caption class="cap-style" style="margin-left: 46%;">Grades List</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Grade</th>
            @if ($user->role == "Admin")
            <th scope="col">Edit</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ( $grades as $grade )
                <tr>
                    <th scope="row">{{$grade->id}}</th>
                    <td>{{$grade->grade ?? 'N/A'}}</td>
                    @if ($user->role == "Admin")
                    <td >

                        <a href="{{ route('grade.edit',['grade'=>$grade->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                        {{-- <a href="" title="Delete {{ $grade->grade_name.' '.$grade->grade_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <i class="fa fa-ban" aria-hidden="true" ></i> </a>
                        <form action="{{ route('grade.destroy',['grade'=>$grade]) }}" method="POST" id="delete-event-form">
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
