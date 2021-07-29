@include("../layouts.sidebar")
<section class="home-section">
    <div class="home-content sticky-top">
        <i class='bx bx-menu'></i>
        <span class="text"></span>
    </div>
    @if (session('profileUpdated'))
    <div class="alert alert-dismissible alert-success fade show suc-msg alert-perso" role="alert">
        {{ session('profileUpdated') }}
        <button type="button" class="close-btn close-btn-perso" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form action=" {{route('user.update',['user'=>$user])}} " method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="div-round-img">
                    <img src="images/profileImg/{{ $user->image }}"  class="img-round">
                </div>
                <span class="font-weight-bold">{{$user->name}}</span>
                <span class="text-black-50">{{$user->role}}</span>
                <div style="    margin: 9% 0%;
                border-bottom: 1px solid #a2a2a2;
                height: 5px;
                width: 100%;"></div>
                <span><div class="mb-3">

                  <label for="" class="form-label">Change Profile Picture</label>
                  <input type="file" class="form-control" name="image" id="" value="{{ $user->image }}" aria-describedby="fileHelpId">

                </div> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                {{-- <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                </div> --}}
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Full Name</label><input type="text" class="form-control" value="{{$user->name }} " placeholder="Full Name" name="name">@error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Email" value="{{$user->email }}" name="email">@error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                    <div class="col-md-12"><label class="labels">Role</label><input type="text" readonly class="form-control" placeholder="Role" value="{{$user->role }}" name="role">@error('role')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                    <div class="col-md-12"><label class="labels">Date Of Birth</label><input type="date" class="form-control" placeholder="Date Of Birth" value="{{$user->birth }}" name="birth">@error('birth')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="Phone Number" value="{{$user->phone }}" name="phone">@error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                    <div class="col-md-12"><label class="labels">Adresse 1 </label><input type="text" class="form-control" placeholder="Adresse 1" value="{{$user->adresse1 }}" name="adresse1">@error('adresse1')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                    <div class="col-md-12"><label class="labels">Adresse 2</label><input type="text" class="form-control" placeholder="Adresse 2" value="{{$user->adresse2}}" name="adresse2">@error('adresse2')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">City</label><input type="text" class="form-control" placeholder="City" value="{{$user->city }}" name="city">@error('city')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                    <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control" placeholder="State" value="{{$user->state }}" name="state">@error('state')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> --}}
    </div>
</div>
</div>
</div>


</form>

</section>

<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>