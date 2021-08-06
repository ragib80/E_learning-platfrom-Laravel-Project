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
                                                <h3 class="mb-0">Edit Stuff</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="text-danger">
                                                {{session('msg')}} <br>

                                                @foreach ($errors->all() as $err)
                                                {{$err}} <br>
                                                @endforeach
                                            </div>
                                            <h6 class="heading-small text-muted mb-4">Stuff information</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label"
                                                                for="input-username">Name</label>
                                                            <input type="text" name="fullname" id="name"
                                                                class="form-control form-control-alternative"
                                                                placeholder="Stuff Name" value="{{$stuff->fullname}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-email">Email
                                                                address</label>
                                                            <input type="text" name="email" id="email"
                                                                class="form-control form-control-alternative"
                                                                placeholder="example@example.com"
                                                                value="{{$stuff->email}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label"
                                                                for="input-first-name">Phone</label>
                                                            <input type="text" name="phone" id="input-first-name"
                                                                class="form-control form-control-alternative"
                                                                placeholder="Phone" value="{{$stuff->p_num}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label" for="input-last-name">User
                                                                Name</label>
                                                            <input type="text" name="username" id="course_id"
                                                                class="form-control form-control-alternative"
                                                                placeholder="User Name" value="{{$stuff->username}}">
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
                                                            <input id="input-address" name="address"
                                                                class="form-control form-control-alternative"
                                                                placeholder="Home Address" value="{{$stuff->address}}"
                                                                type="text">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <button class="btn btn-info">Save</button>




                                            <a class="btn btn-info" href="{{route('stuff.list')}}">Back</a>

                                    </div>


                                    </form>

                                </div>
           
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