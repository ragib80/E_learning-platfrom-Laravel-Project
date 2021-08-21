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
 <a class="btn btn-info" href="/student"> Student Index</a>
 
 <form class="form-inline">

   <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 </form>
</nav>

<div id="main-content" class="main">



   <h1>Student Details </h1>
   <table cellpadding="7px" class="table table-striped">
   <tr class="table-info">
           <td>Student ID </td>
           <td>Student Name </td>
           <td>Student email </td>
           <td>Enrolled CourseId </td>
           <td> Student Address </td>
           <td> Phone no </td>
           
           
       </tr>

      
       <tr>

           <td>{{$student->s_id}}</td>
           <td>{{$student->st_name}}</td>
           <td>{{$student->email}}</td>
           <td>{{$student->c_id}}</td>
           <td>{{$student->address}}</td>
           <td>{{$student->pnum}}</td>
          
 
       </tr>
       
   </table>
   <a class="btn btn-danger" href="">Edit Info</a>

   </div>
</body>



</html>