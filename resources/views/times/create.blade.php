@include("../layouts.sidebar")
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"></span>
    </div>
    @if (session('timeUpdated'))
        <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
            {{ session('timeUpdated') }}
            <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container cont-edit">
        <form method="POST" action="{{ route('time.store') }}">
            @csrf

            <div class="title-edit"> {{__('Create Time')}} </div>
            <br>
            <div class="row">
                <div class="col">

                    <select class="form-select" name="mission_id" aria-label="Default select example">
                        <option selected style="background-color: #e4e9f7;">{{__('Select Mission')}}</option>
                        @foreach ($missions as $mission )
                        <option value=" {{$mission->id}} ">{{$mission->mission_name}}</option>
                        @endforeach
                      </select>
                    @error('mission_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- <input type="text" class="form-control @error('mission_id') is-invalid @enderror"
                        placeholder="Mission id" aria-label="First name" name="mission_id"
                        value="{{ old('mission_id') }}">
                    @error('mission_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>
                <div class="col">
                    <select class="form-select" name="collab_id" aria-label="Default select example">
                        <option selected style="background-color: #e4e9f7;">{{__('Select Collaborator')}}</option>
                        @foreach ($collabs as $collab )
                        <option value=" {{$collab->id}} ">{{$collab->collab_name}} {{$collab->collab_last_name}}</option>
                        @endforeach
                      </select>
                    @error('collab_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="col">
                    <input type="text" class="form-control @error('collab_id') is-invalid @enderror"
                        placeholder="Collaborator id" aria-label="Last name" name="collab_id"
                        value="{{ old('collab_id') }}">
                    @error('collab_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <label for="date">{{__('Date Start')}}</label>
                    <input type="date" id="#date" class="form-control @error('date_start') is-invalid @enderror"
                        placeholder="Date Start" aria-label="Date In" name="date_start" value="{{  old('date_start') }}">
                    @error('date_start')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="date">{{__('Date Finish')}}</label>
                    <input type="date" id="#date" class="form-control @error('date_finish') is-invalid @enderror"
                        placeholder="Date Finish" aria-label="Date In" name="date_finish" value="{{  old('date_finish') }}">
                    @error('date_finish')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <label for="date">{{__('Start Time')}}</label>
                    <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                        aria-label="First name" name="start_time" value="{{  old('start_time') }}">
                    @error('start_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="date">{{__('Finish Time')}}</label>
                    <input type="time" class="form-control @error('finish_time') is-invalid @enderror"
                        aria-label="Last name" name="finish_time" value="{{  old('finish_time') }}">
                    @error('finish_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- <div class="row">
                <div class="col">
                    <label for="date">{{__('Elapsed Time')}}</label>
                    <input type="time" class="form-control @error('elapsed_time') is-invalid @enderror"
                        aria-label="Last name" name="elapsed_time" value="{{  old('elapsed_time') }}">
                    @error('elapsed_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}


            <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i
                        class="fa fa-save"></i> {{__('Save')}} </button></div>
        </form>
    </div>

</section>

<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>

</html>
