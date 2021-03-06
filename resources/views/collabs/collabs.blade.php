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
    @if (session('collabDeleted'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('collabDeleted') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <a name="" id="" style="background-color: #fb1e00;" class="btn btn-perso" href="{{route('collab.pdf')}}" role="button" ><i class="fa fa-download" aria-hidden="true">{{ __('Download')}}</i></a>

    @if ($user->role == "Admin")
    <a name="" id="" class="btn btn-perso" href="{{route('collab.create')}}" role="button" >{{ __('Add Collaborator')}}</a>
    @endif

    <table class="table caption-top" style="text-align: center; vertical-align:middle;">
        <caption class="cap-style">{{ __('Collaborators List')}}</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('Name')}}</th>
            {{-- <th scope="col">{{ __('Last Name')}}</th> --}}
            <th scope="col">{{ __('Image')}}</th>
            <th scope="col">{{ __('Date In')}}</th>
            <th scope="col">{{ __('Date Out')}}</th>
            <th scope="col">{{ __('Phone')}}</th>
            <th scope="col">{{ __('Email')}}</th>
            <th scope="col">{{ __('Grade')}}</th>
            <th scope="col">{{ __('Service')}}</th>
            @if ($user->role == "Admin")
            <th scope="col">{{ __('Edit')}}</th>
            @endif
            <th scope="col">{{ __('Download')}}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $collabs as $collab )
                <tr>
                    <th scope="row">{{$collab->id}}</th>
                    <td>{{$collab->name ?? __('N/A')}}</td>
                    <td><img style="height: 58px;width: 58px;" src="{{ asset('/storage/images/profileImg/') }}/{{$collab->avatar }}"
                        onerror="this.onerror=null;this.src='storage/images/profileImg/default_profile_image.jpg';"
                        alt="profileImg"></td>
                    {{-- <td>{{$collab->collab_last_name ?? __('N/A')}}</td> --}}
                    <td>{{$collab->collab_dateIn ?? __('N/A')}}</td>
                    <td>{{$collab->collab_dateOut ?? __('N/A')}}</td>
                    <td>{{$collab->phone ?? __('N/A')}}</td>
                    <td>{{$collab->email ?? __('N/A')}}</td>
                    {{-- <td>{{$collab->grade_id ?? __('N/A')}}</td> --}}
                    <td>{{__($collab->grade()->where('id', $collab->grade_id)->value('grade')) ?? __('N/A')}}</td>
                    <td>{{$collab->service()->where('id', $collab->service_id)->value('service_ligne') ?? __('N/A')}}</td>
                    @if ($user->role == "Admin")
                    <td >

                        <a href="{{ route('collab.edit',['collab'=>$collab->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                        {{-- <a href="" title="Delete {{ $collab->collab_name.' '.$collab->collab_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <i class="fa fa-ban" aria-hidden="true" ></i> </a>
                        <form action="{{ route('collab.destroy',['collab'=>$collab]) }}" method="POST" id="delete-event-form">
                        @csrf @method('DELETE')
                        </form> --}}

                    </td>
                    @endif

                    <td > <a href=" {{route('onecollab.pdf',['collab'=>$collab])}} " style="color: rgb(139, 101, 101);"> <i class="fa fa-download" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div style="left: 45%;position: absolute;bottom: 0%;">
      {{ $collabs->links() }}
    </div>
  </section>

 <script src="{{ asset('js/dashboard.js') }}"></script>
 <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
