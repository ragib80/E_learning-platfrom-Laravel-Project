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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
                <li class="active">
                    <a href="{{route('course.list')}}">
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
                        <p>Course List</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('stuff.list')}}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Stuff List</p>
                    </a>
                </li>
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
                            <h1 class="h3 mb-4 text-gray-800">Course Management</h1>

                            <!-- DataTales Example -->
                            <span id="message"></span>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="m-0 font-weight-bold text-primary">Course List</h6>
                                            <a href="{{route('course.sheet')}}"><button class="btn"><i
                                                        class="fa fa-download"></i>Download Course List</button></a>
                                        </div>
                                        <div class="col" align="center">
                                            <form>
                                                <div class="input-group no-border">
                                                    <input type="text" name="search" id="search" class="form-control"
                                                        placeholder="Search...">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="class_table" width="100%"
                                            cellspacing="0">
                                            <tr class="table-info table-sm">
                                                <td>Course ID</td>
                                                <td>Course Name</td>
                                                <td>Course Status</td>
                                                <td>Total Enrolled</td>
                                                <td>Action</td>
                                            </tr>

                                            @foreach ($courses as $course)
                                            <tr>
                                                <td>{{$course->c_id}}</td>
                                                <td>{{$course->c_name}}</td>
                                                <td>{{$course->status}}</td>
                                                <td>{{$course->enrolled}}</td>
                                                <td>

                                                    <a class="btn btn-info"
                                                        href="{{route('course.details', ['id' => $course->c_id])}}">
                                                        Details </a>
                                                    |
                                                    <a class="btn btn-warning"
                                                        href="{{route('course.edit', ['id' => $course->c_id])}}">
                                                        Edit </a> |
                                                    <a class=" btn btn-danger"
                                                        href="{{route('course.delete', ['id' => $course->c_id])}}">
                                                        Delete </a>
                                                    |
                                                </td>
                                            </tr>
                                            @endforeach



                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- footer -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                crossorigin="anonymous"></script>

            <script type="text/javascript">
            $('#search').on('keyup', function() {
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('course.search') }}",
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        $('table').html(data);
                    }
                });



            })
       
     </script>
            <script type="text/javascript">
            $.ajaxSetup({

                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
            </script>
</body>


</html>