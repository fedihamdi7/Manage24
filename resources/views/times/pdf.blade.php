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
    <img src="C:\Users\Legion 5\Desktop\Stage\Manage24\public\images\logo.png" alt="">

    <table class="table caption-top">
        <caption class="cap-style">Times</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mission</th>
            <th scope="col">Collaborator</th>
            <th scope="col">Date</th>
            <th scope="col">Start Time</th>
            <th scope="col">Elapsed Time</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $times as $time )
                <tr>
                    <th scope="row">{{$time->id}}</th>
                    {{-- <td>{{$time->mission_id ?? 'N/A'}}</td> --}}
                    <td>{{$time->mission()->where('id', $time->mission_id)->value('mission_name') ?? 'N/A'}}</td>
                    <td>{{$time->collab()->where('id', $time->collab_id)->value('collab_name') ?? 'N/A'}}</td>
                    {{-- <td>{{$time->collab_id ?? 'N/A'}}</td> --}}
                    <td>{{$time->date ?? 'N/A'}}</td>
                    <td>{{$time->start_time ?? 'N/A'}}</td>
                    <td>{{$time->elapsed_time ?? 'N/A'}}</td>

                </tr>
            @endforeach
        </tbody>
      </table>

      <div class="time">
        {{$DT->toDateTimeString()}}
    </div>

</body>
</html>
