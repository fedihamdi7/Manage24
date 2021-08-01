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
            <div class="title-edit"> Edit Mission {{$mission->mission_name}} </div>
            <div class="row">
                <div class="col">
                    <label for="">Service</label>
                        <select class="form-select" name="service_id" aria-label="Default select example">
                            <option selected value=" {{$mission->service_id}} "> {{$current_service}} </option>
                            @foreach ($services as $service )
                            <option value=" {{$service->id}} ">{{$service->id}} - {{$service->service_ligne}}</option>
                            @endforeach
                          </select>
                    @error('service')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Client</label>
                        <select class="form-select" name="client_id" aria-label="Default select example">
                            <option selected value=" {{$mission->client_id}} "> {{$current_client}} </option>
                            @foreach ($clients as $client )
                            <option value=" {{$client->id}} ">{{$client->id}} - {{$client->social_reason}}</option>
                            @endforeach
                          </select>
                    @error('client')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <label for="">Start Date</label>
                    <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="inputPhone"
                 name="date_start" value="{{$mission->date_start ?? ''}}">
                @error('date_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col">
                    <label for="">Finish Date</label>
                    <input type="date" class="form-control @error('date_finish') is-invalid @enderror" id="inputPhone"
                    name="date_finish" value="{{  $mission->date_finish ?? ''}}">
                   @error('date_finish')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
            </div>
        <div class="row">
            <div class="col">
                <label for="">Year</label>
                {{-- <input type="year" class="form-control @error('elapsed_time') is-invalid @enderror" id="inputPhone"
                name="elapsed_time" value="{{  $mission->elapsed_time ?? ''}}"> --}}
                <input type="number" placeholder="YYYY" min="2000" max="2100" class="form-control @error('year') is-invalid @enderror" id="inputPhone" name="year" value="{{  $mission->year ?? ''}}">
               @error('year')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror

            </div>

            <div class="col">

               <label for="">Path</label>
               {{-- <input type="file" id="imgInp" webkitdirectory directory class="form-control  @error('path') is-invalid @enderror" name="path" id="" placeholder="" aria-describedby="fileHelpId" value="{{  $mission->path ?? ''}}"> --}}
               <input type="text" class="form-control  @error('path') is-invalid @enderror" name="path" id="" placeholder="Path" aria-describedby="fileHelpId" value="{{$mission->path ?? ''}}">

               @error('path')
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
