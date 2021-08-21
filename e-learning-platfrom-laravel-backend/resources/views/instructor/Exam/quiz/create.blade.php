
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
</head>

<body class="">
  <div class="wrapper ">
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
          <li>
		  <a href="/student">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Students List</p>
            </a>
          </li>
          <li class="active ">
		  <a href="/quizes/create">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Quizes</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO</p>
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




<h1>
Quiz  Add
<small>
<i class="ace-icon fa fa-angle-double-right"></i>

</h1>
</div><!-- /.page-header -->
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->


<form class="form-horizontal" role="form" action="/quizes" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
<div class="space-4"></div>
 
 
<div class="space-4"></div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Quiz Name </label>
	<div class="col-sm-9">
		 
	 <input type="text" id="form-field-2" placeholder="Quize Name" class="col-xs-10 col-sm-5" name="quiz_name" required="" >
		 
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">  Course ID </label>
	<div class="col-sm-9">
		 
	 <input type="text" id="form-field-2" placeholder="Quize Name" class="col-xs-10 col-sm-5" name="c_id" required="" >
		 
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Description</label>
	<div class="col-sm-9">
		<input type="text" id="form-field-2" placeholder="Descriotion" class="col-xs-10 col-sm-5" name="description" required="" />
		
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Quiz Date</label>
	<div class="col-sm-9">
		<input type="date" id="form-field-2" placeholder="quiz date" class="col-xs-10 col-sm-5" name="quiz_date"   />
		
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Quiz Time</label>
	<div class="col-sm-9">
		<input type="text" id="form-field-2" placeholder="00:00"  pattern="[0-9]{2}:[0-9]{2}" class="col-xs-10 col-sm-5" name="quiz_time" required="" title="example 01:00 " />
		<span> exm: 00:00</span>
	</div> 
</div>
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Number Of Question View for User</label>
	<div class="col-sm-9">
		<input type="text" id="form-field-2" placeholder="How many question view for this quiz " class="col-xs-10 col-sm-5" name="number_of_question" required="" />
		
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


<div class="col-md-12">
	{{$quizes->links()}}
	<table class="table table-bordered" id="datatables">
       <thead>
       	<tr>
       		<th>Sl</th>
       		<th>Quiz Name</th>
               <th>Course Id</th>
       		<th>Description</th>
       		<th>Date</th>
       		<th>Time</th>
        
       		<th>Num of Exam Qus</th>
       		<th>Status</th>
       		<th>Add Question</th>
       		<th>Details</th>
       		
       		<th>Delete</th>
       	</tr>
       </thead>
       <tbody>
       	@foreach($quizes as $key=>$data)
       	<tr>
       		<td>{{++$key}} </td>
       		<td>{{$data->quiz_name}} </td> 
               <td>{{$data->c_id}} </td>
       		<td>{{$data->description}} </td>
       		<td>{{$data->quiz_date}} </td>
       		<td>{{$data->quiz_time}} </td>
       		 
       		<td>{{$data->number_of_question}} </td>
       		<td><input type="checkbox" name="status" class="quiz-status" data_id="{{$data->id}}" {{$data->status=='1'?'checked':''}}> </td>

       		<td><a href="/quizes/addquestion/{{$data->id}}">Add Question</a></td>
       		<td><a href="/quizes/{{$data->id}}">Details</a></td>
       		
       		<td>
                <a class="btn btn-danger btn-sm"  href="/quizes/delete/{{$data->id}}">Delete</a>
             </td>
       	</tr>
       	@endforeach
       </tbody>
	</table>
</div>




<script type="text/javascript">
  
	$(document).on('click','.quiz-status',function(){
     var id=$(this).attr('data_id');
   var url=("{!!url('/')!!}");
   
     $.get(url+'/quiz_status/'+id,function(fb){
     	alert('Staus Successfully changed');
     });
	});
</script>



            <script type="text/javascript">
                
                $('#category').on('change',function(e){
                    console.log(e);

                    var categories_id= e.target.value;

                    $.get('/json-catelogs?categories_id=' + categories_id,function(data){
                        console.log(data);

                    $('#catelog').empty();
          $('#catelog').append('<option value="" disable="true" selected="true">Select a Catelog</option>');

          $.each(data, function(index, districtsObj){
            $('#catelog').append('<option value="'+ districtsObj.id +'">'+ districtsObj.catelog +'</option>');
          });
         
                    });
                });
            </script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#summernote').summernote({
			height:'200px',
			placeholder:'Description',
			toolbar: [
    ['style', ['fontname','bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr', 'readmore']],
            ['genixcms', ['elfinder']],
            ['view', ['fullscreen', 'codeview']],
  ],
		 onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0],editor,welEditable);
        }	 
		});
	});
</script>
<script type="text/javascript">
function previewImage(event) {
var output = document.getElementById('output');
output.src = URL.createObjectURL(event.target.files[0]);
};
</script>

</body>
</html>