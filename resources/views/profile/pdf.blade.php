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
          text-align: center;
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
        table tbody tr th{
            text-align: center;
        }
        </style>
</head>
<body>
    {{-- <img src=" {{asset('images/logo.png')}} " alt=""> --}}
    <img src="images/logo.png" alt="">

    <table class="table caption-top">
        <caption class="cap-style">{{__('Profile')}}</caption>
        <thead class="table-light">

        </thead>
        <tbody>

                <tr>
                    <th>{{__('Profile Picture')}}</th>
                    <td> <img width="150px" src="storage/images/profileImg/{{ $user->image }}" alt=""> </td>
                </tr>
                <tr>
                    <th>{{__('Full Name')}}</th>
                    <td>{{$user->name }}</td>
                </tr>
                <tr>
                    <th>{{__('Email')}}</th>
                    <td>{{$user->email }}</td>
                </tr>
                <tr>
                    <th>{{__('Role')}}</th>
                    <td>{{__($user->role) }}</td>
                </tr>
                <tr>
                    <th>{{__('Date Of Birth')}}</th>
                    <td>{{$user->birth ?? __('N/A')}}</td>
                </tr>
                <tr>
                    <th>{{__('Phone Number')}}</th>
                    <td>{{$user->phone ?? __('N/A')}}</td>
                </tr>
                <tr>
                    <th>{{__('Adresse 1')}}</th>
                    <td>{{$user->adresse1 ?? __('N/A')}}</td>
                </tr>
                <tr>
                    <th>{{__('Adresse 2')}}</th>
                    <td>{{$user->adresse2 ?? __('N/A')}}</td>
                </tr>
                <tr>
                    <th>{{__('City')}}</th>
                    <td>{{$user->city ?? __('N/A')}}</td>
                </tr>
                <tr>
                    <th>{{__('State')}}</th>
                    <td>{{$user->state ?? __('N/A')}}</td>
                </tr>

        </tbody>
      </table>

      <div class="time">
        {{$time->toDateTimeString()}}
    </div>

</body>
</html>
