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

            <div class="title-edit"> Add Mission </div>
            <div class="row">
                <div class="col">

                    <input type="text" class="form-control @error('service') is-invalid @enderror"
                        placeholder="Service" aria-label="First name" name="service_id"
                        value="{{ old('service') ?? ''  }}">
                    @error('service')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">

                    <input type="text" class="form-control @error('client') is-invalid @enderror"
                        placeholder="client" aria-label="Last name" name="client_id"
                        value="{{ old('client') ?? '' }}">
                    @error('client')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <label for="" class="DSF">Date Start</label>
                <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="inputPhone"
                 name="date_start" value="{{  old('date_start') ?? ''}}">
                @error('date_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label for="" class="DSF">Date finish</label>
                <input type="date" class="form-control @error('date_finish') is-invalid @enderror" id="inputPhone"
                 name="date_finish" value="{{  old('date_finish') ?? ''}}">
                @error('date_finish')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>





                <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-save"></i>  Save </button></div>

        </div>

    </div>
</section>

<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>

</html>
