<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
</head>

<body>

    <div class="sidebar" data-color="blue">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                CT
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
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
                    <a href="/courses/list">
                        <i class="now-ui-icons education_atom"></i>
                        <p>Courses</p>
                    </a>
                </li>
                <li>
                    <a href="/note">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>Notes</p>
                    </a>
                </li>
                <li>
                    <a href="./notifications.html">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="/profile">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="">
                    <a href="/Instructor">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Instructor List</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.list')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Student List</p>
                    </a>
                </li>
                <li>
                    <a href="/stuff">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Stuff List</p>
                    </a>
                </li>
                <li>
                    <a href="./typography.html">
                        <i class="now-ui-icons text_caps-small"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li> <a href="/home">
                        <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">

        <div id="wrapper">

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div id="main-content">
                            <nav class="navbar navbar-light bg-light">
                                <a class="navbar-brand"> </a>

                            </nav>
                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800">Student Management</h1>

                            <!-- DataTales Example -->
                            <span id="message"></span>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
                                        </div>
                                        <div class="col" align="center">
                                            <a href="{{route('student.sheet')}}"><button class="btn"><i
                                                        class="fa fa-download"></i>Download Sales
                                                    Report</button></a>
                                            <a class="btn btn-secondary" href="/instructor/create">Download Student
                                                List</a>
                                            |
                                            <a class="btn btn-success" href="/search">Search Instructor</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="class_table" width="100%"
                                            cellspacing="0">
                                            <tr class="table-info table-sm">
                                                <td>Student ID </td>
                                                <td>Student Name </td>
                                                <td>Student Email </td>
                                                <td>Student Address </td>
                                                <td>Action </td>
                                            </tr>

                                            @foreach ($students as $student)
                                            <tr>
                                                <td>{{$student->st_id}}</td>
                                                <td>{{$student->st_name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->address}}</td>
                                                <td>

                                                    <a class="btn btn-info"
                                                        href="{{route('student.details', ['id' => $student->st_id])}}">
                                                        Details </a>
                                                    |
                                                    <a class="btn btn-warning"
                                                        href="{{route('student.edit', ['id' => $student->st_id])}}">
                                                        Edit </a> |
                                                    <a class=" btn btn-danger"
                                                        href="{{route('student.delete', ['id' => $student->st_id])}}">
                                                        Delete </a>
                                                    |
                                                </td>
                                            </tr>
                                            @endforeach


                                        </table>
                                    </div>
                                </div>

                            </div>










































</body>


</html>