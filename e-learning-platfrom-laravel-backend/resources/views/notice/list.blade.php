@extends('layouts.app')
@section('content')
<div class="main-panel" id="main-panel">

    <div id="wrapper">

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div id="main-content">

                        <span id="message"></span>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="m-0 font-weight-bold text-primary">Notices</h2>

                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="class_table" width="100%"
                                        cellspacing="0">
                                        <tr class="table-info table-sm">
                                            <td>Title</td>
                                            <td>Description</td>
                                            <td>Action</td>
                                        </tr>

                                        @foreach ($notices as $notice)
                                        <tr>
                                          <td>{{$notice->title}}</td>
                                            <td>{{$notice->description}}</td>
                                            <td>
      <a href="{{ route('notice.download', $notice->id) }}">Download</a>
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
                url: "{{ route('instructor.search') }}",
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
