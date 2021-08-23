@include("../layouts.sidebar")

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <form method="POST" action="{{ route('CD.search') }}" style="width: 23%;display: flex;height: 4%;position: absolute;left: 15%;top: 14%; @if ( (app()->getLocale()) == "en" )  left: 21%; @endif">
        @csrf
    {{-- <select class="form-select" id="search" name="mission_id" aria-label="Default select example">
        @foreach ($missions_list as $list )
        <option value=" {{$list->id}} ">{{$list->mission_name}}</option>
        @endforeach
      </select> --}}
      <div style="display: flex;
      column-gap: 1%;
      margin-right: -169%;
      margin-top: -12%;">
        <div >

            <label for="">{{__('Start Date')}}</label>
            <input type="date" style="z-index: 12;" class="form-control @error('date_start') is-invalid @enderror" id="inputPhone"
         name="date_start" value="{{ request()->input('date_start') ?? '' }}">
        @error('date_start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div style="z-index: 15">
            <label for="">{{__('Finish Date')}}</label>
            <input type="date" class="form-control @error('date_finish') is-invalid @enderror" id="inputPhone"
            name="date_finish" value="{{ request()->input('date_finish') ?? '' }}">
           @error('date_finish')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
        </div>

        <div class="select_cd">
            <select class="form-select CD" name="collab_id" aria-label="Default select example" style="margin-top: 30.2%;width: 181%; @if ( (app()->getLocale()) == "en" )  margin-top: 29%;width: 129%; @endif">
                <option selected style="background-color: #e4e9f7;">{{__('Select Collaborator')}}</option>
                @foreach ($collabs as $collab )
                <option value=" {{$collab->id}} ">{{$collab->name}}</option>
                @endforeach
              </select>
            @error('collab_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="select_cd">
            <select class="form-select CD" name="mission_id" aria-label="Default select example" style="margin-top: 36%;width: 196%;margin-left: 97%; @if ( (app()->getLocale()) == "en" )  margin-left: 37%;margin-top: 36%;width: 136%; @endif">
                <option selected style="background-color: #e4e9f7;">{{__('Select Mission')}}</option>
                @foreach ($missions_list as $m )
                <option value=" {{$m->id}} ">{{$m->mission_name}}</option>
                @endforeach
              </select>
            @error('mission_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="btnCD"><button type="submit" class="btn btn-block btn-outline-primary CD" style="height: 38px;width: 138px; margin-left: -136%;margin-top: 44%; @if ( (app()->getLocale()) == "en" )  margin-left: -136%;margin-top: 42%; @endif">
        <i class="fa fa-search"></i> {{__('Search')}} </button></div>
    </form>

    @if ($missions)
    <a name="" id="" style="background-color: #fb1e00; right: -74%;top: 19.2%;" class="btn btn-perso"
    href="{{ route('pdf.CD', ['start' => $start , 'fini' => $fini ,'col' => $col,'miss'=>$miss]) }}" role="button"><i class="fa fa-download"
        aria-hidden="true">{{ __('Download') }}</i></a>
        @endif
    <div id="search_list" style="margin-top: 10%;">

    @if ($missions)
    <table class="table caption-top" style="width: 65% !important">
        <caption class="cap-style">{{__('Result')}}</caption>
        <thead class="table-light">
            <tr>
                <th>{{__('Code Mission')}}</th>
                <th>{{__('Mission')}}</th>
                <th>{{__('Collaborator')}}</th>
                <th>{{__('Date')}}</th>
                <th>{{__('Elapsed Time')}}</th>
            </tr>
        </thead>
        <tbody style="border: 0.5px">

                @foreach ( $missions as $mission )
                <tr>
                    <th>{{$mission->mission_id}}</th>
                    <td>{{__($mission->mission_name) }}</td>
                    <td>{{$mission->name}}</td>
                    <td>{{$mission->date }}</td>
                    <td>{{$mission->elapsed_time }}</td>

                </tr>

                @endforeach
                <tr>
                    <th></th>
                    <td></td>
                    <td></td>
                    <td> <span style="padding-left: 45% ; font-weight: bold">{{ __('Total') }}</span></td>
                    <td>{{$tt}}</td>
                </tr>
                {{-- <tr>
                    <th>{{__('Client')}}</th>
                    <td>{{$missions->client()->where('id', $missions->client_id)->value('social_reason') ?? 'N/A'}}</td>
                </tr>
                <tr>
                    <th>{{__('Client ID')}}</th>
                    <td>{{$missions->client()->where('id', $missions->client_id)->value('id') ?? 'N/A'}}</td>
                </tr>
                <tr>
                    <th>{{__('Start Date')}}</th>
                    <td>{{$missions->date_start ?? __('N/A')}}</td>
                </tr>
                <tr>
                    <th>{{__('Finish Date')}}</th>
                    <td>{{$missions->date_finish ?? __('N/A')}}</td>
                </tr>
                <tr>
                    <th>{{__('Year')}}</th>
                    <td>{{$missions->year ?? __('N/A')}}</td>
                </tr> --}}

        </tbody>
      </table>
    @else
    <table class="table caption-top" style="width: 65% !important">
        <caption class="cap-style">{{__('Result')}}</caption>
        <thead class="table-light">
<tr>
    <th>{{__('id')}}</th>
    <th>{{__('Mission')}}</th>
    <th>{{__('Total Hours')}}</th>
</tr>
        </thead>
        <tbody style="border: 0.5px">

                <tr>
                    <th>{{__('N/A')}}</th>
                    <td>{{__('N/A')}}</td>
                    <td>{{__('N/A')}}</td>
                </tr>



        </tbody>
      </table>
    @endif



    </div>



  </section>

 <script src="{{ asset('js/dashboard.js') }}"></script>
 <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
