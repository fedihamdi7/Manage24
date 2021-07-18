<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js"
        integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
        integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Document</title>
</head>

<body>

    <aside id="sidebar" class="nano">
        <div class="nano-content">
            <div class="logo-container"><img src="images/logo.png" alt=""></div>
            <!-- <a class="compose-button">Compose</a> -->
            <menu class="menu-segment">
                <ul>
                    <li><a href="#">Tasks & Projects</a></li>
                    <li><a href="#">Calendar</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Employees</a></li>
                    <!-- <li><a href="#">Trash</a></li> -->
                </ul>
            </menu>
            <div class="separator"></div>
            <div class="menu-segment">
                <ul class="labels">
                    <li class="title">Labels <span class="icon">+</span></li>
                    <li><a href="#">Dribbble <span class="ball pink"></span></a></li>
                    <li><a href="#">Roommates <span class="ball green"></span></a></li>
                    <li><a href="#">Bills <span class="ball blue"></span></a></li>
                </ul>
            </div>
            <div class="separator"></div>
            <div class="menu-segment">
                <ul class="chat">
                    <li class="title">Chat <span class="icon">+</span></li>
                    <li><a href="#"><span class="ball green"></span>Laura Turner</a></li>
                    <li><a href="#"><span class="ball green"></span>Kevin Jones</a></li>
                    <li><a href="#"><span class="ball blue"></span>John King</a></li>
                    <li><a href="#"><span class="ball blue"></span>Jenny Parker</a></li>
                    <li><a href="#"><span class="ball blue"></span>Paul Green</a></li>
                    <li><a href="#" class="italic-link">See offline list</a></li>
                </ul>
            </div>
            <div class="bottom-padding"></div>
        </div>
    </aside>
    <main id="main">
        <div class="overlay"></div>
        <header class="header">

            <h1 class="page-title"><a class="sidebar-toggle-btn trigger-toggle-sidebar"><span class="line"></span><span
                        class="line"></span><span class="line"></span><span class="line line-angle1"></span><span
                        class="line line-angle2"></span></a><a><span
                        class="icon glyphicon glyphicon-chevron-down"></span></a></h1>

            <div class="user">
                <img src="f.jpg" alt="">
                <h1> Fedi Hamdi</h1>
                <i class="fas fa-arrow-down"></i>
            </div>

            <div class="user-settings">


                    <a class="item">Profile</a>
                    <a class="item">Upgrade</a>
                    <a class="item">Log out</a>

            </div>

        </header>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>

</body>

</html>
