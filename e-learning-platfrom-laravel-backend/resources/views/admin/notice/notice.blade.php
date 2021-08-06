@extends('layouts.sidebar')
@section('content')


<div id="main-content">

    <h1 class="m-0 font-weight-bold text-primary"> Upload Files</h1>
    <div class="container">
        <div class="main-panel" id="main-panel">

            <h1> Upload Files: <small>Upload size maximum 10 MiB</small></h1>
        </div>

        <!-- Bootstrap Upload Control - START -->
        <div class="main-panel" id="main-panel">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="text-danger">
                    {{session('msg')}} <br>

                    @foreach ($errors->all() as $err)
                    {{$err}} <br>
                    @endforeach
                </div>
                <div class="text-success">
                    {{session('success')}} <br>

                    @foreach ($errors->all() as $err)
                    {{$err}} <br>
                    @endforeach
                </div>
                <form method="POST" action="/files" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="title">
                    <input type="text" name="description" placeholder="description">
                    <input type="file" name="file">
                    <p style="text-align: right; margin-top: 20px;">
                        <input type="submit" class="btn btn-lg btn-primary">
                    </p>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

        <!-- you need to include the ShieldUI CSS and JS assets in order for the Upload widget to work -->
        <link rel="stylesheet" type="text/css"
            href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
        <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js">
        </script>


        <!-- Bootstrap Upload Control - END -->

    </div>
</div>






@endsection
