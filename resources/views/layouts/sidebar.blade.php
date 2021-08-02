<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <title>Manage24</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .active-side{
            background-color: #605c8a;
        }
        .hover-change:hover{
            color: rgb(53, 53, 148);
            cursor: pointer;
            font-size: 17px;
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img src="{{ asset('images/logo.png') }}" alt="" style="width: 49%;margin-left: 27%;margin-top: 11%;">
            {{-- <span class="logo_name">Manage24</span> --}}
        </div>
        <ul class="nav-links">
            {{-- <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li> --}}
            <li @if ('' ?? $page=="collabs")
                class="active-side"
            @endif>
                <div class="iocn-link">
                    <a href="{{ route('collab.index') }}">
                        <i class='bx bx-street-view'></i>
                        <span class="link_name">{{__('Collaborators')}}</span>
                    </a>
                     @if ($user->role == "Admin")
                    <i class='bx bxs-chevron-down arrow'></i>
                    @endif
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('collab.index') }}">{{__('Collaborators')}}</a></li>
                    @if ($user->role == "Admin")
                    <li><a href="{{ route('collab.create') }}">{{__('Add')}}</a></li>
                    @endif
                    {{-- <li><a href="#">Edit</a></li>
          <li><a href="#">PHP & MySQL</a></li> --}}
                </ul>
            </li>
            <li @if ('' ?? $page=="service")
            class="active-side"
        @endif>
                <div class="iocn-link">
                    <a href="{{ route('service.index') }}">
                        <i class='bx bxs-devices' ></i>
                        <span class="link_name">{{__('Service Line')}}</span>
                    </a>
                     @if ($user->role == "Admin")
                    <i class='bx bxs-chevron-down arrow'></i>
                    @endif
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('service.index') }}">{{__('Service Line')}}</a></li>
                     @if ($user->role == "Admin")
                    <li><a href="{{ route('service.create') }}">{{__('Add')}}</a></li>
                    @endif

                </ul>
            </li>
            <li @if ('' ?? $page=="client")
            class="active-side"
        @endif>
                <div class="iocn-link">
                    <a href="{{ route('client.index') }}">
                        <i class='bx bxs-user' ></i>
                        <span class="link_name">{{__('Clients')}}</span>
                    </a>

                     @if ($user->role == "Admin")
                    <i class='bx bxs-chevron-down arrow'></i>
                    @endif

                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('client.index') }}">{{__('Clients')}}</a></li>

                    @if ($user->role == "Admin")
                    <li><a href="{{ route('client.create') }}">{{__('Add')}}</a></li>
                    @endif

                </ul>
            </li>
            <li @if ('' ?? $page=="mission")
            class="active-side"
        @endif>
                <div class="iocn-link">
                    <a href="{{ route('mission.index') }}">
                       <i class='bx bxs-bookmark-star' ></i>
                        <span class="link_name">{{__('Missions')}}</span>
                    </a>
                     @if ($user->role == "Admin")
                    <i class='bx bxs-chevron-down arrow'></i>
                    @endif
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('mission.index') }}">{{__('Missions')}}</a></li>
                     @if ($user->role == "Admin")
                    <li><a href="{{ route('mission.create') }}">{{__('Add')}}</a></li>
                    @endif

                </ul>
            </li>
            <li @if ('' ?? $page=="time")
            class="active-side"
        @endif>
                <div class="iocn-link">
                    <a href="{{ route('time.index') }}">
                        <i class='bx bx-time'></i>
                        <span class="link_name">{{__('Time Managment')}}</span>
                    </a>
                     @if ($user->role == "Admin")
                    <i class='bx bxs-chevron-down arrow'></i>
                    @endif
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('time.index') }}">{{__('Time Managment')}}</a></li>
                  @if ($user->role == "Admin")
                    <li><a href="{{ route('time.create') }}">{{__('Add')}}</a></li>
                    @endif

                </ul>
            </li>
            <li @if ('' ?? $page=="grade")
            class="active-side"
        @endif>
                <div class="iocn-link">
                    <a href="{{ route('grade.index') }}">
                        <i class='bx bxs-graduation'></i>
                        <span class="link_name">{{__('Grades')}}</span>
                    </a>
                     @if ($user->role == "Admin")
                    <i class='bx bxs-chevron-down arrow'></i>
                    @endif
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{ route('grade.index') }}">{{__('Grades')}}</a></li>
                  @if ($user->role == "Admin")
                    <li><a href="{{ route('grade.create') }}">{{__('Add')}}</a></li>
                    @endif

                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link_name">{{__('Language')}}</span>
                    </a>
                     @if ($user->role == "Admin")
                    <i class='bx bxs-chevron-down arrow'></i>
                    @endif
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">{{__('Language')}}</a></li>
                    @foreach(config('app.languages') as $langLocale => $langName)
                   <li>  <a  href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ __($langName) }})</a></li>
                    @endforeach
                    {{-- <li><a href="#">{{__('English')}}</a></li>
                    <li><a href="#">{{__('French')}}</a></li> --}}
                </ul>
            </li>
            {{-- <li>
                <a href="#">
                    <i class='bx bx-compass'></i>
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
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Setting</a></li>
                </ul>
            </li> --}}
            <li>
                <div class="profile-details">

                    <div class="profile-content">
                        <a href=" {{route('user.index')}} ">
                        <img src="{{ asset('/storage/images/profileImg/') }}/{{ $user->image }}" onerror="this.onerror=null;this.src='storage/images/profileImg/default_profile_image.jpg';" alt="profileImg">
                        </a>
                    </div>
                    <a href=" {{route('user.index')}} ">
                    <div class="name-job">
                        <div class="profile_name">{{$user->name }}</div>
                        <div class="job">{{ __($user->role) }}</div>
                    </div>
                    </a>


                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
