@include("../layouts.sidebar")
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    @if (session('timeUpdated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('timeUpdated') ?? $time->collab_id }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container cont-edit">
        <form method="POST" action="{{ route('time.update',['time'=>$time])}}">
            @csrf
            @method('PUT')
        <div class="title-edit"> Edit <span> {{$time->id}} </span> </div>

<br>
        <div class="row">
            <div class="col">

                <select class="form-select" name="mission_id" aria-label="Default select example">
                    <option selected value=" {{$current_mission}} "> {{$current_mission}} </option>
                    @foreach ($missions as $mission )
                    <option value=" {{$mission->id}} ">{{$mission->id}}</option>
                    @endforeach
                  </select>
                {{-- <input type="text" class="form-control @error('mission_id') is-invalid @enderror"
                    placeholder="Mission id" aria-label="First name" name="mission_id"
                    value="{{  old('mission_id') ?? $time->mission_id }}"> --}}
                @error('mission_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <select class="form-select" name="collab_id" aria-label="Default select example">
                    <option selected value=" {{$current_collab_id}} "> {{$current_collab_name}} </option>
                    @foreach ($collabs as $collab )
                    <option value=" {{$collab->id}} ">{{$collab->collab_name , $collab->collab_last_name}}</option>
                    @endforeach
                  </select>
                {{-- <input type="text" class="form-control @error('collab_id') is-invalid @enderror"
                    placeholder="Collaborator id" aria-label="Last name" name="collab_id"
                    value="{{  old('collab_id') ?? $time->collab_id }}"> --}}
                @error('collab_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="col-3">
            <label for="date">Date</label>
            <input type="date" id="#date" class="form-control @error('date') is-invalid @enderror"
                placeholder="Date In" aria-label="Date In" name="date" value="{{  old('date') ?? $time->date }}">
            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <label for="date">Start Time</label>
                <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                    aria-label="First name" name="start_time" value="{{  old('start_time') ?? $time->start_time }}">
                @error('start_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <label for="date">Elapsed Time</label>
                <input type="time" class="form-control @error('elapsed_time') is-invalid @enderror"
                    aria-label="Last name" name="elapsed_time" value="{{  old('elapsed_time') ?? $time->elapsed_time }}">
                @error('elapsed_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>



            <div id="both-btn">
                <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i>  Save </button></div>
                <a href="" title="Delete" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <div class="col sub-btn"><button type="submit" class="btn btn-block btn-outline-danger"><i class="fa fa-trash"></i>  Delete </button></div> </a>
            </div>
                <div class="Del-Form-Button">
            </form>

                <form action="{{ route('time.destroy',['time'=>$time]) ?? $time->collab_id }}" method="POST" id="delete-event-form">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
  </section>

 <script src="{{ asset('js/dashboard.js') ?? $time->collab_id }}"></script>
 <script src="{{ asset('js/app.js') ?? $time->collab_id }}" defer></script>

 {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>
</html>
