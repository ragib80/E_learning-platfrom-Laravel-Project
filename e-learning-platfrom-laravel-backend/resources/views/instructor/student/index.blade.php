<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD</title>
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Instracture Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<div class="sidebar" data-color="orange">
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
            <a href="/files/view">
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
          <li class="active ">
            <a href="/Student">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Student List</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Typography</p>
            </a>
          </li>
          <li class="active-pro">
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
                                            <a href="{{route('student.all')}}"><button class="btn"><i
                                                        class="fa fa-download"></i>Download Student List</button></a>
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
                                                <td>Student ID</td>
                                                <td>Student Name</td>
                                                <td>Student Email</td>
                                                <td>Student Address</td>
                                                <td>Action</td>
                                            </tr>

                                            @foreach ($studentList as $student)
                                            <tr>
                                                <td>{{$student->s_id}}</td>
                                                <td>{{$student->st_name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->address}}</td>
                                                <td>

                                                    <a class="btn btn-info"
                                                        href="">
                                                        Details </a>
                                                    |
                                                    <a class="btn btn-warning"
                                                        href="">
                                                        Edit </a> |
                                                    <a class=" btn btn-danger"
                                                        href="">
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
                    url: "{{ route('student.search') }}",
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



       <!-- <div id="header">
            <h1>Student Index</h1>
        </div>
        <div id="menu">
        
            <ul>
                <li>
                    <a href="/student">Index</a>
                </li>
                <li>
                    <a href="add.php">Add</a>
                </li>
                <li>
                    <a href="update.php">Update</a>
                </li>
                <li>
                    <a href="delete.php">Delete</a>
                </li>
            </ul>
        </div>
        <div class="content">
        <div class="row">
          <div class="col-md-12">
            

          <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div id="main-content">
                            <nav class="navbar navbar-light bg-light">
                                <a class="navbar-brand"> </a>

                            </nav>
                           
                            <h1 class="h3 mb-4 text-gray-800">Student Management</h1>

                            
                            <span id="message"></span>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
                                            <a href="{{route('student.all')}}"><button class="btn"><i
                                                        class="fa fa-download"></i>Download Student List</button></a>
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
                                                <td>Student ID</td>
                                                <td>Student Name</td>
                                                <td>Student Email</td>
                                                <td>Student Address</td>
                                                <td>Action</td>
                                            </tr>

                                            @foreach ($studentList as $student)
                                            <tr>
                                                <td>{{$student->s_id}}</td>
                                                <td>{{$student->st_name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->address}}</td>
                                                <td>

                                                    <a class="btn btn-info"
                                                        href="/student/details/{{$student['s_id']}}">
                                                        Details </a>
                                                    |
                                                    <a class="btn btn-warning"
                                                        href="">
                                                        Edit </a> |
                                                    <a class=" btn btn-danger"
                                                        href="">
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

            </div>-->



        <!--<div id="main-content">
        <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand"> </a>
  <form class="form-inline">
  <a class="btn btn-secondary" href="{{route('student.all')}}"> Dwonload </a>|  
  <a class="btn btn-success" href="/student/search">Search Student</a>  
  </form>
  
</nav>
    <h2>All Records</h2>
    <table class="table table-bordered" id="class_table" width="100%" cellspacing="0" cellpadding="7">
            <tr class="table-info">
            <td>student ID </td>
            <td>student Name </td>
            <td>student email </td>
            <td> Course Id  </td>
            
            <td> Action </td>
        </tr>

        @foreach ($studentList as $student)
        <tr>

        <td>{{$student->s_id}}</td>
            <td>{{$student->st_name}}</td>
            <td>{{$student->email}}</td>
           < <td>{{$student->dob}}</td>
            <td>{{$student->address}}</td>
        <td>{{$student->pnum}}</td>
            <td>{{$student->c_id}}</td>

           
   <td>

                
                <a class="btn btn-info" href="/student/details/{{$student['s_id']}}"> Details </a> 
                <a  class="btn btn-warning" href=""> Report Issue </a> 
                
            
        </tr>
        @endforeach
               
            </table>
</div>
</div>
</div>
</div>
</div>
</div>-->


 <!-- 
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
                    url: "{{ route('student.search') }}",
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
            </script>-->
</body>
</html>

       
        