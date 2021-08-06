@extends('layouts.sidebar')
@section('content')
<div class="main-panel" id="main-panel">

    <div id="wrapper">

        <div id="header">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">

                    <div id="main-content">
                        <nav class="navbar navbar-light bg-light">
                            <a class="navbar-brand"> </a>
                        </nav>
                        {{session('msg')}}
                        <h1>Total No. of Students: {{$students}}</h1> <br>
                        <h1>Total No. of Instructor: {{$instructors}}</h1><br>
                        <h1>Total No. of Support Stuff: {{$stuffs}}</h1>
                        <h1>Total No. of Courses: {{$courses}}</h1>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
</body>


</html>
