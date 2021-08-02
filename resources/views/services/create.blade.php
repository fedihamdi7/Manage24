@include("../layouts.sidebar")
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    @if (session('serviceUpdated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('serviceUpdated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container cont-edit">
        <form method="POST" action="{{ route('service.store')}}">
            @csrf

        <div class="title-edit"> {{__('Add Service Line')}} </div>


            <div class="col-12">
                {{-- <label for="inputPhone" class="form-label">Phone</label> --}}
                <input type="text" class="form-control @error('service_ligne') is-invalid @enderror" id="inputPhone" placeholder="{{__('Service Line')}}" name="service_ligne" value="{{old('service_ligne')}}">
                 @error('service_ligne')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                {{-- <label for="inputEmail" class="form-label">Email</label> --}}
                <label for="">{{__('Description')}}</label>
                <div class="form-floating">
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 12em" placeholder="{{__('Description')}}" id="floatingTextarea2"  name="description">{{old('description')}}</textarea>
                    @error('description')
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
