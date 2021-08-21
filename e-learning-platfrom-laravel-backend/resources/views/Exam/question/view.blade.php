<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    

<div class="page-header">
<h1>
Question  Add
<small>
<i class="ace-icon fa fa-angle-double-right"></i>
Question for front page </small>&nbsp;<a href="/questions/create">Add new Question </a>
</h1>
</div><!-- /.page-header -->
<div class="row">
<div class="col-md-12">
<!-- PAGE CONTENT BEGINS -->



<table class="table table-bordered tale-hover" id="datatables">
	<thead>
		<tr>
			<th>SL</th>
			<th>Quiz Name</th>
			<th>Question</th>
			<th>Right Ans</th>
			
			<th>View</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($questions as $key=>$qus)
            <tr>
            	<td>{{++$key}}</td>
            	<td>{{$qus->quizes->quiz_name}}</td>
            	<td>{{$qus->question}}</td>
            	<td>{{$qus->answer}}</td>
            	<td>View</td>
            	<td><a href="/questions/{{$qus->id}}/edit">Edit</a></td>
            	<td>
            		{{Form::open(['url'=>'/questions/'.$qus->id,'method'=>'Delete'])}}
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</button>
              {{Form::close()}}
            	</td>
            </tr>
		@endforeach
	</tbody>
	
</table>



</div>
</div>




</body>
</html>