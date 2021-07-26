@include("../layouts.sidebar")
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    @if (session('serviceUpdated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg" style="margin-bottom: 0px" role="alert">
        {{ session('serviceUpdated') }}
        <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container cont-edit">
        <form method="POST" action="{{ route('service.update',['service'=>$service])}}">
            @csrf
            @method('PUT')
        <div class="title-edit"> Edit <span> {{$service->service_ligne}} </span> </div>


            <div class="col-12">
                {{-- <label for="inputPhone" class="form-label">Phone</label> --}}
                <input type="text" class="form-control @error('service_ligne') is-invalid @enderror" id="inputPhone" placeholde name="service_ligne" value="{{$service->service_ligne}} ">
                 @error('service_ligne')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                {{-- <label for="inputEmail" class="form-label">Email</label> --}}
                <div class="form-floating">
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 12em" placeholder="Leave a comment here" id="floatingTextarea2"  name="description"> {{$service->description ?? ''}} </textarea>
                    <label for="floatingTextarea2">Description</label>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>

                {{-- <input type="text" class="form-control @error('description') is-invalid @enderror" id="inputEmail" placeholder="Email.." name="description" value="{{$service->description}}">
                 @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>

            <div id="both-btn">
                <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i>  Save </button></div>
                <a href="" title="Delete {{ $service->collab_name.' '.$service->collab_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <div class="col sub-btn"><button type="submit" class="btn btn-block btn-outline-danger"><i class="fa fa-trash"></i>  Delete </button></div> </a>
            </div>
                <div class="Del-Form-Button">
            </form>

                <form action="{{ route('service.destroy',['service'=>$service]) }}" method="POST" id="delete-event-form">
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
