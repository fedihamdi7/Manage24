@include("../layouts.sidebar")
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    @if (session('collabUpdated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" role="alert">
        {{ session('collabUpdated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="container cont-edit">
        <form method="POST" action="{{ route('collab.update',['collab'=>$collabs])}}">
            @csrf
            @method('PUT')
        <div class="title-edit"> {{__('Edit')}} <span> {{$collabs->name}} </span> </div>
            <div class="row">
                <div class="col">
                    <label >{{ __('Name')}}</label>
                <input type="hidden"  value="{{$collabs->id}}"  name="id">
                <input type="text" class="form-control @error('collab_name') is-invalid @enderror" value="{{$collabs->name}}" placeholder="{{ __('Name')}}" aria-label="First name" name="collab_name">
                 @error('collab_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                {{-- <div class="col">
                    <label >{{ __('Last Name')}}</label>
                <input type="text" class="form-control @error('collab_last_name') is-invalid @enderror" value="{{$collabs->collab_last_name}}" placeholder="{{ __('Last Name')}}" aria-label="Last name" name="collab_last_name">
                 @error('collab_last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div> --}}
            </div>
            <div class="row">
                <div class="col">
                    <label >{{ __('Date In')}}</label>
                <input type="date" class="form-control @error('collab_dateIn') is-invalid @enderror" placeholder="{{ __('Date In')}}" aria-label="Date In" name="collab_dateIn" value="{{$collabs->collab_dateIn}}">
                 @error('collab_dateIn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col">
                    <label >{{ __('Date Out')}}</label>
                <input type="date" class="form-control @error('collab_dateOut') is-invalid @enderror" placeholder="{{ __('Date Out')}}" aria-label="Date Out" name="collab_dateOut" value="{{$collabs->collab_dateOut}}">
                 @error('collab_dateOut')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="col-12">
                <label >{{ __('Phone')}}</label>
                <input type="text" class="form-control @error('collab_phone') is-invalid @enderror" id="inputPhone" placeholder="{{ __('Phone')}}" name="collab_phone" value="{{$collabs->phone}} ">
                 @error('collab_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label >{{ __('Email')}}</label>
                <input type="email" class="form-control @error('collab_mail') is-invalid @enderror" id="inputEmail" placeholder="{{ __('Email')}}" name="collab_mail" value="{{$collabs->email}}">
                 @error('collab_mail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
            <div class="col">
                <label >{{ __('Grade')}}</label>
                <select class="form-select" name="grade_id" aria-label="Default select example">
                    <option selected value=" {{$collab->grade_id}} "> {{$current_grade}} </option>
                    @foreach ($grades as $grade )
                    <option value=" {{$grade->id}} ">{{$grade->id}} - {{$grade->grade}}</option>
                    @endforeach
                  </select>
                  @error('grade_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
                <label >{{ __('Service Line')}}</label>
                <select class="form-select" name="service_id" aria-label="Default select example">
                    <option selected value=" {{$collab->service_id}} "> {{$current_service}} </option>
                    @foreach ($services as $service )
                    <option value=" {{$service->id}} ">{{$service->id}} - {{$service->service_ligne}}</option>
                    @endforeach
                  </select>
                  @error('service_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col"><label class="labels">{{__('City')}}</label><input type="text" class="form-control" placeholder="{{__('City')}}" value="{{$collabs->city }}" name="city">@error('city')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
            <div class="col"><label class="labels">{{__('State')}}</label><input type="text" class="form-control" placeholder="{{__('State')}}" value="{{$collabs->state }}" name="state">@error('state')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>

        </div>

            <div id="both-btn">
                <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i>  {{__('Save')}} </button></div>
                <a href="" title="Delete {{ $collabs->collab_name.' '.$collabs->collab_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <div class="col sub-btn"><button type="submit" class="btn btn-block btn-outline-danger"><i class="fa fa-trash"></i>  {{__('Delete')}} </button></div> </a>
            </div>
                <div class="Del-Form-Button">
            </form>

                <form action="{{ route('collab.destroy',['collab'=>$collabs]) }}" method="POST" id="delete-event-form">
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
