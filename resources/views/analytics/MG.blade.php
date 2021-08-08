@include("../layouts.sidebar")

<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"></span>
    </div>
    <form method="POST" action="{{ route('MG.search') }}"
        style="width: 23%;display: flex;height: 4%;position: absolute;left: 28%;top: 14%;">
        @csrf
        <div style="display: flex;column-gap: 11%;margin-right: 15%;margin-top: -12%;">
            <div>

                <label for="">{{ __('Start Date') }}</label>
                <input type="date" class="form-control @error('date_start') is-invalid @enderror" id="inputPhone"
                    name="date_start" value="{{ '' }}">
                @error('date_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="">{{ __('Finish Date') }}</label>
                <input type="date" class="form-control @error('date_finish') is-invalid @enderror" id="inputPhone"
                    name="date_finish" value="{{ '' }}">
                @error('date_finish')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div>
            <button type="submit" class="btn btn-block btn-outline-primary" style="height: 37px;width: 142px;margin-top: 10px;margin-left: 18px;">
                <i class="fa fa-search"></i> {{ __('Search') }}
            </button>
        </div>
    </form>
    @if ($missions)
    <a name="" id="" style="background-color: #fb1e00;" class="btn btn-perso"
    href="{{ route('pdf.MG', ['s' => $s , 'f' => $f]) }}" role="button"><i class="fa fa-download"
        aria-hidden="true">{{ __('Download') }}</i></a>
        @endif
    <div id="search_list" style="margin-top: 10%;">

        @if ($missions)
            <table class="table caption-top" style="width: 65% !important">
                <caption class="cap-style">{{ __('Result') }}</caption>
                <thead class="table-light">
                    <tr>
                        <th>{{ __('id') }}</th>
                        <th>{{ __('Mission') }}</th>
                        <th>{{ __('Total Hours') }}</th>
                    </tr>
                </thead>
                <tbody style="border: 0.5px">

                    @foreach ($missions as $mission)
                        <tr>
                            <th>{{ $mission->id }}</th>
                            <td>{{ __($mission->mission_name) }}</td>
                            {{-- <td>{{$mission->time()->where('mission_id', $mission->id)->value('finish_time') ?? 'N/A' }}</td> --}}
                            <td>
                                {{ $totalSecondsDiff = abs(strtotime($mission->date_start) - strtotime($mission->date_finish)) / 60 / 60 . __(' Hours') . ' / ' . abs(strtotime($mission->date_start) - strtotime($mission->date_finish)) / 60 / 60 / 24 . __(' Days') }}
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        @else
            <table class="table caption-top" style="width: 65% !important">
                <caption class="cap-style">{{ __('Result') }}</caption>
                <thead class="table-light">
                    <tr>
                        <th>{{ __('id') }}</th>
                        <th>{{ __('Mission') }}</th>
                        <th>{{ __('Total Hours') }}</th>
                    </tr>
                </thead>
                <tbody style="border: 0.5px">

                    <tr>
                        <th>{{ __('N/A') }}</th>
                        <td>{{ __('N/A') }}</td>
                        <td>{{ __('N/A') }}</td>
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
