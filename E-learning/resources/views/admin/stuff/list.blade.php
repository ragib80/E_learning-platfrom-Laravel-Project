@extends('layouts.sidebar')
@section('content')
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
                        <h1 class="h3 mb-4 text-gray-800">Stuff Management</h1>

                        <!-- DataTales Example -->
                        <span id="message"></span>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="m-0 font-weight-bold text-primary">Stuff List</h2>
                                        <a href="{{route('stuff.sheet')}}"><button class="btn"><i
                                                    class="fa fa-download"></i>Download Stuff List</button></a>
                                        <a href="{{route('stuff.add')}}"><button class="btn"><i
                                                    class="fa fa-add"></i>Add
                                                Stuff</button></a>
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
                                            <td>Stuff ID</td>
                                            <td>Stuff Name</td>
                                            <td>Stuff Email</td>
                                            <td>Stuff Address</td>
                                            <td>Action</td>
                                        </tr>

                                        @foreach ($stuffs as $stuff)
                                        <tr>
                                            <td>{{$stuff->s_id}}</td>
                                            <td>{{$stuff->fullname}}</td>
                                            <td>{{$stuff->email}}</td>
                                            <td>{{$stuff->address}}</td>
                                            <td>

                                                <a class="btn btn-info"
                                                    href="{{route('stuff.details', ['id' => $stuff->s_id])}}">
                                                    Details </a>
                                                |
                                                <a class="btn btn-warning"
                                                    href="{{route('stuff.edit', ['id' => $stuff->s_id])}}">
                                                    Edit </a> |
                                                <a class=" btn btn-danger"
                                                    href="{{route('stuff.delete', ['id' => $stuff->s_id])}}">
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
        @endsection
        <!-- footer -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{ route('stuff.search') }}",
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