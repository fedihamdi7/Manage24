@include("../layouts.sidebar")
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
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
        <form method="POST" action="{{ route('client.store') }}">
            @csrf
            <div class="title-edit"> Create Client </div>
            <div class="row">
                <div class="col">

                    <input type="text" class="form-control @error('social_reason') is-invalid @enderror"
                        placeholder="Social Reason" aria-label="First name" name="social_reason"
                        value="{{ old('social_reason') }}">
                    @error('social_reason')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" class="form-control @error('activity') is-invalid @enderror"
                        placeholder="Activity" aria-label="Last name" name="activity"
                        value="{{ old('activity') }}">
                    @error('activity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">

                <input type="text" class="form-control @error('adresse1') is-invalid @enderror" id="inputPhone"
                    placeholder="Adresse 1" name="adresse1" value="{{ old('adresse1') ?? ''}}">
                @error('adresse1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">

                <input type="text" class="form-control @error('adresse2') is-invalid @enderror" id="inputPhone"
                    placeholder="Adresse 2" name="adresse2" value="{{ old('adresse2') }}">
                @error('adresse2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col">

                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                        placeholder="Phone" aria-label="First name" name="phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">

                    <input type="text" class="form-control @error('fax') is-invalid @enderror"
                        placeholder="Fax" aria-label="First name" name="fax"
                        value="{{ old('fax') }}">
                    @error('fax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>
            <div class="col-12">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                    placeholder="Email.." name="email" value="{{ old('collab_mail') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-12">
                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                    placeholder="Contact Person" name="contact_person" value="{{ old('contact_person') }}">
                @error('contact_person')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="sub-btn"><button type="submit" class="btn btn-block btn-outline-primary"><i
                        class="fa fa-save"></i> Save </button></div>
        </form>

    </div>
</section>

<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>

</html>
