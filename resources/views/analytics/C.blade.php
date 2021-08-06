@include("../layouts.sidebar")

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <form method="POST" action="{{ route('C.search') }}" style="width: 23%;display: flex;height: 4%;position: absolute;left: 28%;top: 14%;">
        @csrf
    {{-- <select class="form-select" id="search" name="mission_id" aria-label="Default select example">
        @foreach ($missions_list as $list )
        <option value=" {{$list->id}} ">{{$list->mission_name}}</option>
        @endforeach
      </select> --}}
      <div style="display: flex;
      column-gap: 1%;
      margin-right: -112%;
      margin-top: -12%;">
        <div >

            <label for="">{{__('Start Date')}}</label>
            <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="inputPhone"
         name="date_start" value="{{''}}">
        @error('date_start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div style="z-index: 12">
            <label for="">{{__('Finish Date')}}</label>
            <input type="date" class="form-control @error('date_finish') is-invalid @enderror" id="inputPhone"
            name="date_finish" value="{{''}}">
           @error('date_finish')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
        </div>

        <div>
            <select class="form-select" name="collab_id" aria-label="Default select example" style="margin-top: 15.5%; width: 115%; @if ( (app()->getLocale()) == "en" )  width: 78%; @endif">
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
    </div>


    <div><button type="submit" class="btn btn-block btn-outline-primary" style="height: 38px;width: 138px; margin-left: -200%;margin-top: 34%; @if ( (app()->getLocale()) == "en" )  margin-left: -199%; @endif"><i
        class="fa fa-search"></i> {{__('Search')}} </button></div>
    </form>

    @if ($missions)
    <a name="" id="" style="background-color: #fb1e00;" class="btn btn-perso"
    href="{{ route('pdf.C', ['s' => $s , 'f' => $f ,'c' => $c]) }}" role="button"><i class="fa fa-download"
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
                <th>{{__('Client')}}</th>
                <th>{{__('Total Hours')}}</th>
            </tr>
        </thead>
        <tbody style="border: 0.5px">

                @foreach ( $missions as $mission )
                <tr>
                    <th>{{$mission->id}}</th>
                    <td>{{__($mission->mission_name) }}</td>
                    <td>{{$mission->client()->where('id',$mission->client_id)->value('social_reason') }}</td>
                    <td> {{
                        $totalSecondsDiff = (abs(strtotime($mission->date_start)- (strtotime($mission->date_finish))))/60/60 . __(' Hours').' / '.(abs(strtotime($mission->date_start)- (strtotime($mission->date_finish))))/60/60/24 .__(' Days')
                        }}</td>
                </tr>

                @endforeach
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
