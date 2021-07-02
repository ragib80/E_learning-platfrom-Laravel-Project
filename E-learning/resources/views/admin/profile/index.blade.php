@extends('layouts.sidebar')
@section('content')
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
                                                <h3 class="mb-0">Course Information</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label"
                                                                for="input-username">Name</label>
                                                            <h3> {{$user->name}} </h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-email">Email
                                                                address</label>
                                                            <h3> {{$user->email}} </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label"
                                                                for="input-first-name">User Name</label>
                                                            <h3> {{$user->username}} </h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label" for="user">
                                                                Phone</label>
                                                            <h3> {{$user->phone}} </h3>
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

                                                            <h3> {{$user->address}} </h3>
                                                        </div>
                                                    </div>


                                                </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-body">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src="/img/mike.jpg" alt="...">
                                    <h5 class="title">{{$user->name}}</h5>
                                </a>
                                <p class="description">
                                    {{$user->address}}
                                </p>
                            </div>
                            <p class="description text-center">
                                "Why do we <br>
                                fall <br>
                                So that we can pick ourselves up"
                            </p>
                        </div>
                        <hr>
                        <div class="button-container">
                            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                <i class="fab fa-google-plus-g"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>

</html>