<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="_token" content="{{ csrf_token() }}">
    <title>
        Admin Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/demo/demo.css" rel="stylesheet" />
    <link href="/css/details.css" rel="stylesheet" />
</head>

<body>

    <div class="sidebar" data-color="blue">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                EL
            </a>
            <a href="{{route('home')}}" class="simple-text logo-normal">
                Home
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="/dashboard">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('course.list')}}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>Courses</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('notice.list')}}">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p>Notice</p>
                    </a>
                </li>

                <li>
                    <a href="{{route('instructor.list')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Instructor List</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('stuff.list')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Stuff List</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.list')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Student List</p>
                    </a>
                </li>
                <li> <a href="{{route('logout')}}">
                        <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <main class="py-6">
        <!-- <div class="bg-image bg-parallax overlay" style="background-image:url(./img/home-background.jpg)"></div> -->
        <div>
            @yield('content')



        </div>
    </main>