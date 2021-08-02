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
            width: 103%;
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

    <table class="table caption-top">
        <caption class="cap-style">{{__('Missions List')}}</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">{{__('Mission')}}</th>
            <th scope="col">{{__('Service')}}</th>
            <th scope="col">{{__('Client')}}</th>
            <th scope="col">{{__('Start Date')}}</th>
            <th scope="col">{{__('Finish Date')}}</th>
            <th scope="col">{{__('Year')}}</th>
            <th scope="col">{{__('Path')}}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $missions as $mission )
                <tr>
                    <th scope="row">{{$mission->mission_name}}</th>
                    <td>{{$mission->service()->where('id', $mission->service_id)->value('service_ligne') ?? 'N/A'}}</td>
                    <td>{{$mission->client()->where('id', $mission->client_id)->value('social_reason') ?? 'N/A'}}</td>
                    <td>{{$mission->date_start ?? 'N/A'}}</td>
                    <td>{{$mission->date_finish ?? 'N/A'}}</td>
                    <td>{{$mission->year ?? 'N/A'}}</td>
                    <td>{{$mission->path ?? 'N/A'}}</td>

                </tr>
            @endforeach
        </tbody>
      </table>

      <div class="time">
        {{$time->toDateTimeString()}}
    </div>

</body>
</html>
