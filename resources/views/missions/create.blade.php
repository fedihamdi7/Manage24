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
        <form method="POST" action="{{route('mission.store') }}">
            @csrf

            <div class="title-edit"> {{__('Add Mission')}} </div>
            <div class="row">
                <div >
                  <label for="mb-0">{{__('Mission Name')}}</label>
                  <input type="text" style="margin-top: 1%"
                    class="form-control" name="mission_name" id="" aria-describedby="helpId" placeholder="{{__('Mission Name')}}">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">{{__('Service')}}</label>
                    <select class="form-select" name="service_id" aria-label="Default select example">
                        <option selected value="">{{__('Select Service')}}</option>
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
                        <option selected value="">{{__('Select Client')}}</option>
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

                    <label for="">{{__('Start Date')}}</label>
                    <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="inputPhone"
                 name="date_start" value="{{''}}">
                @error('date_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col">
                    <label for="">{{__('Finish Date')}}</label>
                    <input type="date" class="form-control @error('date_finish') is-invalid @enderror" id="inputPhone"
                    name="date_finish" value="{{''}}">
                   @error('date_finish')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
            </div>
        <div class="row">
            <div class="col">
                <label for="">{{__('Year')}}</label>
                {{-- <input type="year" class="form-control @error('elapsed_time') is-invalid @enderror" id="inputPhone"
                name="elapsed_time" value="{{''}}"> --}}
                <input type="number" placeholder="YYYY" min="2000" max="2100" class="form-control @error('year') is-invalid @enderror" id="inputPhone" name="year" value="{{''}}">
               @error('year')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror

            </div>

            <div class="col">

               <label for="">{{__('Path')}}</label>
               {{-- <input type="file" id="imgInp" webkitdirectory directory class="form-control  @error('path') is-invalid @enderror" name="path" id="" placeholder="" aria-describedby="fileHelpId" value="{{''}}"> --}}
               <input type="text" class="form-control  @error('path') is-invalid @enderror" name="path" id="" placeholder="{{__('Path')}}" aria-describedby="fileHelpId" value="{{''}}">
               @error('path')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
            </div>
        </div>







                <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i>  {{__('Save')}} </button></div>

        </div>

    </div>
</section>

<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>

</html>
