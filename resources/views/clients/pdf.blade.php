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
          font-size: 10px;
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

    <table class="table caption-top">{{__('Clients List')}}</caption>

        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Social Reason')}}</th>
            <th scope="col">{{__('Activity')}}</th>
            <th scope="col">{{__('Adresse 1')}}</th>
            <th scope="col">{{__('Phone')}}</th>
            <th scope="col">{{__('Email')}}</th>
            <th scope="col">{{__('Contact Person')}}</th>
            <th scope="col">{{__('Website')}}</th>
            <th scope="col">{{__('Type')}}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $clients as $client )
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->social_reason ?? 'N/A'}}</td>
                    <td>{{$client->activity ?? 'N/A'}}</td>
                    <td>{{$client->adresse1 ?? 'N/A'}}</td>
                    <td>{{$client->phone ?? 'N/A'}}</td>
                    <td>{{$client->email ?? 'N/A'}}</td>
                    <td>{{$client->contact_person ?? 'N/A'}}</td>
                    <td>{{$client->website ?? 'N/A'}}</td>
                    <td>{{$client->type ?? 'N/A'}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>

      <div class="time">
        {{$time->toDateTimeString()}}
    </div>

</body>
</html>
