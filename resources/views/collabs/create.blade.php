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
        <form method="POST" action="{{ route('collab.store')}}">
            @csrf
        <div class="title-edit"> Create Collaborator </div>
        <div class="row">
            <div class="col">
                <label >Collaborator First Name</label>
            <input type="text" class="form-control @error('collab_name') is-invalid @enderror" value="{{old('collab_name') ?? ''}}" placeholder="First name " aria-label="First name" name="collab_name">
             @error('collab_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col">
                <label >Collaborator Last Name</label>
            <input type="text" class="form-control @error('collab_last_name') is-invalid @enderror" value="{{old('collab_last_name') ?? ''}}" placeholder="Last name" aria-label="Last name" name="collab_last_name">
             @error('collab_last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label >Date In</label>
            <input type="date" class="form-control @error('collab_dateIn') is-invalid @enderror" placeholder="Date In" aria-label="Date In" name="collab_dateIn" value="{{old('collab_dateIn') ?? ''}}">
             @error('collab_dateIn')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col">
                <label >Date Out</label>
            <input type="date" class="form-control @error('collab_dateOut') is-invalid @enderror" placeholder="Date Out" aria-label="Date Out" name="collab_dateOut" value="{{old('collab_dateOut') ?? ''}}">
             @error('collab_dateOut')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="col-12">
            <label >Phone</label>
            <input type="text" class="form-control @error('collab_phone') is-invalid @enderror" id="inputPhone" placeholder="Phone" name="collab_phone" value="{{old('collab_phone') ?? ''}}">
             @error('collab_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <label >Email</label>
            <input type="email" class="form-control @error('collab_mail') is-invalid @enderror" id="inputEmail" placeholder="Email.." name="collab_mail" value="{{old('collab_mail') ?? ''}}">
             @error('collab_mail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <label>Grade</label>
            <input type="text" class="form-control @error('code_g') is-invalid @enderror" id="inputEmail" placeholder="Grade" name="code_g" value="{{old('code_g') ?? ''}}">
             @error('code_g')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


                <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i>  Save </button></div>

    </div>
  </section>

 <script src="{{ asset('js/dashboard.js') }}"></script>
 <script src="{{ asset('js/app.js') }}" defer></script>

 {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>
</html>
