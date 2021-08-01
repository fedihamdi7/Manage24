@include("../layouts.sidebar")
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"></span>
    </div>
    @if (session('gradeUpdated'))
        <div class="alert alert-dismissible alert-success fade show suc-msg" role="alert">
            {{ session('gradeUpdated') }}
            <button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container cont-edit">
        <form method="POST" action="{{ route('grade.store') }}">
            @csrf
            <div class="title-edit"> Create Grade </div>
            <label for="" >Grade</label>
            <div class="form-group">

              <textarea class="form-control" name="grade" id="" rows="5"></textarea>
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
