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

    <table class="table caption-top" style="text-align: center;">
        <caption class="cap-style">{{ __('Collaborators List')}}</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('Name')}}</th>
            {{-- <th scope="col">{{ __('Last Name')}}</th> --}}
            <th scope="col">{{ __('Date In')}}</th>
            <th scope="col" style="width: 130px;">{{ __('Date Out')}}</th>
            <th scope="col">{{ __('Phone')}}</th>
            <th scope="col">{{ __('Email')}}</th>
            <th scope="col">{{ __('Grade')}}</th>
            <th scope="col">{{ __('Service')}}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $collabs as $collab )
                <tr>
                    <th scope="row">{{$collab->id}}</th>
                    <td>{{$collab->name ?? __('N/A')}}</td>
                    {{-- <td>{{$collab->collab_last_name ?? __('N/A')}}</td> --}}
                    <td>{{$collab->collab_dateIn ?? __('N/A')}}</td>
                    <td>{{$collab->collab_dateOut ?? __('N/A')}}</td>
                    <td>{{$collab->phone ?? __('N/A')}}</td>
                    <td>{{$collab->email ?? __('N/A')}}</td>
                    {{-- <td>{{$collab->grade_id ?? __('N/A')}}</td> --}}
                    <td>{{__($collab->grade()->where('id', $collab->grade_id)->value('grade')) ?? __('N/A')}}</td>
                    <td>{{$collab->service()->where('id', $collab->service_id)->value('service_ligne') ?? __('N/A')}}</td>

                </tr>
            @endforeach
        </tbody>
      </table>

      <div class="time">
        {{$time->toDateTimeString()}}
    </div>

</body>
</html>
