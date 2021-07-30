@include("../layouts.sidebar")
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"></span>
    </div>
    @if (session('missionUpdated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" role="alert">
        {{ session('missionUpdated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="container cont-edit">
        <form method="POST" action="{{route('mission.update',['mission'=>$mission]) }}">
            @csrf
            @method('PUT')
            <div class="title-edit"> Edit Mission </div>
            <div class="row">
                <div class="col">
                    <label for="">Service</label>
                    <input type="text" class="form-control @error('service') is-invalid @enderror"
                        placeholder="Service" aria-label="First name" name="service"
                        value="{{ $service->first()->service_ligne ?? ''  }}">
                    @error('service')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Client</label>
                    <input type="text" class="form-control @error('client') is-invalid @enderror"
                        placeholder="client" aria-label="Last name" name="client"
                        value="{{ $client ?? old('client') ?? '' }}">
                    @error('client')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <label for="">Start Time</label>
                    <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="inputPhone"
                 name="start_time" value="{{  $mission->start_time ?? ''}}">
                @error('start_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col">
                    <label for="">End Time</label>
                    <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="inputPhone"
                    name="end_time" value="{{  $mission->end_time ?? ''}}">
                   @error('end_time')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
            </div>

            <div class="col-12">
                <label for="">Elapsed Time</label>
                <input type="time" class="form-control @error('elapsed_time') is-invalid @enderror" id="inputPhone"
                name="elapsed_time" value="{{  $mission->elapsed_time ?? ''}}">
               @error('elapsed_time')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror

            </div>







            <div id="both-btn">
                <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i>  Save </button></div>
                <a href="" title="Delete" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <div class="col sub-btn"><button type="submit" class="btn btn-block btn-outline-danger"><i class="fa fa-trash"></i>  Delete </button></div> </a>
            </div>
                <div class="Del-Form-Button">
            </form>

                <form action="{{ route('mission.destroy',['mission'=>$mission]) }}" method="POST" id="delete-event-form">
                @csrf @method('DELETE')
            </form>
        </div>

    </div>
</section>

<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>

</html>
