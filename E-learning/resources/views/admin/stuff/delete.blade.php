<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link href="/css/details.css" rel="stylesheet" />
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
                <li>
                    <a href="{{route('instructor.list')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Instructor List</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.list')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Stuff List</p>
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('stuff.list')}}">
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
                <li>
                    <a href="/home">
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
                            <nav class="navbar navbar-light bg-light ">
                                <a class="navbar-brand"> </a>


                            </nav>

                            <div id=" main-content" class="main">

                                <div class="col-xl-8 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h3 class="mb-0">Stuff Information</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label"
                                                                    for="input-username">Name</label>
                                                                <h3> {{$stuff->fullname}} </h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-control-label"
                                                                    for="input-email">Email
                                                                    address</label>
                                                                <h3> {{$stuff->email}} </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label"
                                                                    for="input-first-name">Phone</label>
                                                                <h3> {{$stuff->p_num}} </h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label" for="course">
                                                                    Enrolled
                                                                    Course</label>
                                                                <h3> {{$stuff->c_id}} </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                                <!-- Address -->
                                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label"
                                                                    for="input-address">Address</label>

                                                                <h3> {{$stuff->address}} </h3>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <button class="btn btn-danger">Delete</button>
                                                    <a class="btn btn-info" href="{{route('stuff.list')}}">Back</a>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>









       
                 </div>
                    </div>
</body>



</html>