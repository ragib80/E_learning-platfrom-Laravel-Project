<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="page-header">
<h1>
Question  Add
<small>
<i class="ace-icon fa fa-angle-double-right"></i>
Question for front page </small>&nbsp;<a href="/questions">Question  View</a>
<a href="/quizes/create">Quiz  index</a>
</h1>
</div><!-- /.page-header -->
<div class="row">
<div class="col-md-12">
<!-- PAGE CONTENT BEGINS -->


 <div class="alert alert-danger" style="display: none;"> </div>
<div class="alert alert-success" style="display: none;"><p>Data add Successfully </p></div>

<form class="form-horizontal" role="form" action="/questions" method="POST" >
	{{csrf_field()}}

<div class="space-4"></div>
<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Quiz Name </label>
	<div class="col-sm-10">
		 
		<select class="form-control" name="quizes_id" required="">
			<option value=" {{$quizId->id}} ">{{$quizId->quiz_name}}</option>
		</select>
		
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-2"> Quiz id </label>
	<div class="col-sm-10">
		 
		<select class="form-control" name="c_id" required="">
			<option value=" {{$quizId->c_id}} ">{{$quizId->c_id}}</option>
		</select>
		
	</div>
</div>



<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-2">Question </label>
	<div class="col-sm-10">
		<input type="text" id="form-field-2" placeholder="question" class="form-control" name="question" required="" />
		
	</div>
</div>

 
	
	<div class="col-md-6">

<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Option 1 </label>
	<div class="col-sm-9">
		<input type="text" id="form-field-2" placeholder="Option" class="form-control" name="option[]" required="" />
		
	</div>
</div>

	
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Option 2 </label>
	<div class="col-sm-9">
		<input type="text" id="form-field-2" placeholder="Option" class="form-control" name="option[]" required="" />
		
	</div>
</div>

</div>
	<div class="col-md-6">
	
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Option 3 </label>
	<div class="col-sm-9">
		<input type="text" id="form-field-2" placeholder="Option" class="form-control" name="option[]" required="" />
		
	</div>
</div>

	
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Option 4 </label>
	<div class="col-sm-9">
		<input type="text" id="form-field-2" placeholder="Option" class="form-control" name="option[]" required="" />
		
	</div>
</div>

 

</div>
	
<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-2">Right Answer</label>
	<div class="col-sm-10">
		<input type="text" id="form-field-2" placeholder="Right Answer" class="form-control" name="answer" required="" />
		
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label no-padding-right" for="form-field-2">Note : </label>
	<div class="col-sm-10">
		<input type="text" id="form-field-2" placeholder=" Note " class="form-control" name="note"   />
		
	</div>
</div>

<div class="space-4"></div>
<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		<button class="btn btn-info" type="submit">
			<i class="ace-icon fa fa-check bigger-110"></i>
			Submit
		</button>

		&nbsp; &nbsp; &nbsp;
		<button class="btn" type="reset">
			<i class="ace-icon fa fa-undo bigger-110"></i>
			Reset
		</button>
	</div>
</div>

<div class="hr hr-24"></div>

 
</form>

 <!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div>
</body>
</html>








