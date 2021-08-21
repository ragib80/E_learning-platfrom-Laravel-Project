
<div class="page-header">
<h1>
Quiz  Add
<small>
<i class="ace-icon fa fa-angle-double-right"></i>
Quiz for front page </small>&nbsp;<a href="/quizes">Quiz  View</a>
</h1>
</div><!-- /.page-header -->
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->


 <h3>Quiz Name : {{$data->quiz_name}}</h3>
 <!--@foreach($questions as $ques)
 <ul>{{$ques->question}}
 @foreach($ques->optionsdata as $opt)

<li>{{$opt->option}}</li>
@endforeach
</ul>

@endforeach-->

<hr>
 @foreach($questions as $key=>$ques)
 
 <h5> {{$key+1}}. {{$ques->question}}</h5>
  <ol   class="ul-list"  style="list-style-type: lower-alpha;" >
    @foreach($ques->optionsdata as $op)

    <li>&nbsp;<input type="radio" {{$op->option==$ques->answer ? 'checked' : ''}}  /> {{$op->option}}   </li>
   
    @endforeach
    
  </ol>
   @if($ques->note!="")
  <h5 style="color: blue;">Note: {{$ques->note}}</h5>
  @endif
  @endforeach


</div>
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
