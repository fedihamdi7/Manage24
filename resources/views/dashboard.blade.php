<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" >
    <link rel="icon" href="images/logo.png">
    <title>Manage24</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <img src="images/logo.png" alt="" style="width: 100%">
      {{-- <span class="logo_name">Manage24</span> --}}
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('dashboard') }}">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('collab.index') }}">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Collaborators</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('collab.index') }}">Collaborators</a></li>
          <li><a href="{{ route('collab.create') }}">Add</a></li>
          {{-- <li><a href="#">Edit</a></li>
          <li><a href="#">PHP & MySQL</a></li> --}}
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="images/ff.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">{{$user->name}}</div>
        <div class="job">{{$user->role}}</div>
      </div>


      <a class="dropdown-item" href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
       <i class='bx bx-log-out' title="Logout"></i>
   </a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
   </form>


    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <table class="table caption-top">
        <caption class="cap-style">Collaborators List</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date In</th>
            <th scope="col">Date Out</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $collabs as $collab )
                <tr>
                    <th scope="row">{{$collab->id}}</th>
                    <td>{{$collab->collab_name}}</td>
                    <td>{{$collab->collab_last_name}}</td>
                    <td>{{$collab->collab_dateIn}}</td>
                    <td>{{$collab->collab_dateOut}}</td>
                    <td>{{$collab->collab_phone}}</td>
                    <td>{{$collab->collab_mail}}</td>
                    <td id="operations-style">

                        <a href="{{ route('collab.edit',['collab'=>$collab->id]) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                        <a href="" title="Delete {{ $collab->collab_name.' '.$collab->collab_last_name }}" onclick="event.preventDefault();document.querySelector('#delete-event-form').submit()"> <i class="fa fa-ban" aria-hidden="true" ></i> </a>
                        <form action="{{ route('collab.destroy',['collab'=>$collab]) }}" method="POST" id="delete-event-form">
                        @csrf @method('DELETE')
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
  </section>

 <script src="{{ asset('js/dashboard.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
