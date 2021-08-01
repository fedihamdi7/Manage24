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
    <img src="C:\Users\Legion 5\Desktop\Stage\Manage24\public\images\logo.png" alt="">

    <table class="table caption-top">
        <caption class="cap-style"><span style="font-weight: bold">{{$collabs->collab_name}} {{$collabs->collab_last_name}}</span></caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date In</th>
            <th scope="col">Date Out</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Grade</th>
            <th scope="col">Service</th>

          </tr>
        </thead>
        <tbody>
                <tr>
                    <th scope="row">{{$collab->id}}</th>
                    <td>{{$collab->collab_name ?? 'N/A'}}</td>
                    <td>{{$collab->collab_last_name ?? 'N/A'}}</td>
                    <td>{{$collab->collab_dateIn ?? 'N/A'}}</td>
                    <td>{{$collab->collab_dateOut ?? 'N/A'}}</td>
                    <td>{{$collab->collab_phone ?? 'N/A'}}</td>
                    <td>{{$collab->collab_mail ?? 'N/A'}}</td>
                    {{-- <td>{{$collab->grade_id ?? 'N/A'}}</td> --}}
                    <td>{{$collab->grade()->where('id', $collab->grade_id)->value('grade') ?? 'N/A'}}</td>
                    <td>{{$collab->service()->where('id', $collab->service_id)->value('service_ligne') ?? 'N/A'}}</td>
                </tr>
        </tbody>
      </table>

      <div class="time">
        {{$time->toDateTimeString()}}
    </div>

</body>
</html>
