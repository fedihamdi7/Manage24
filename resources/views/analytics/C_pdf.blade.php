<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
          font-family: Poppins, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        table td, table th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #9d93d1;
          color: white;
        }
        img{
            /* width:100%; */

        }
        table{
            margin-top: 3%;
            margin-left: 10%;
            width: 110%;
        }
        caption{
            margin-bottom: 1%;
    font-size: 1.5em;
        }
        .time{
            position: absolute;
    top: 4%;
    right: 5%;
    font-size: 1.2em;
        }
        </style>
</head>
<body>
    {{-- <img src=" {{asset('images/logo.png')}} " alt=""> --}}
    <img src="images/logo.png" alt="">

    <table class="table caption-top" style="width: 100% !important">
        <caption class="cap-style">{{__('Result')}}</caption>
        <thead class="table-light">
            <tr>
                <th>{{__('Code Mission')}}</th>
                <th>{{__('Mission')}}</th>
                <th>{{__('Collaborator')}}</th>
                <th>{{__('Client')}}</th>
                <th>{{__('Total Hours')}}</th>
            </tr>
        </thead>
        <tbody style="border: 0.5px">

            @foreach ($missions as $key =>$mission)
            <tr>
                <th>{{ $mission->id }}</th>
                <td>{{ __($mission->mission_name) }}</td>
                <td>{{ $lecollab->collab_name .' '. $lecollab->collab_last_name}}</td>
                <td>{{$mission->client()->where('id',$mission->client_id)->value('social_reason') }}</td>

                <td>

                    @if (array_key_exists($key,$allmission))
                        {{$allmission[$key] . __(' Hours')}}
                    @else
                        {{__('N/A')}}
                    @endif
                </td>
                {{-- <td>
                    {{ $allmission[$key] . __(' Hours') ?? ' ' }}
                </td> --}}
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

      <div class="time">
        {{$time->toDateTimeString()}}
    </div>

</body>
</html>
