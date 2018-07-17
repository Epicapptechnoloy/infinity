@extends('adminlayouts.master')
@section('content')
<!-- Default box -->
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Review list</li>
      </ol>
    </section>

      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Review list</h3></br>
              <h3 class="box-title">Product Name:{!!$productName->name!!}</h3></br>
              <h3 class="box-title">Average Rating:{!!$avg!!}</h3>
            </div>
            <section class="content"> 
           
            <!-- /.box-header -->
             @include('adminlayouts.message')
            
    
      <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="customerlisttable">
                <thead>
                <tr>
				  
				  <th>Sr.No</th>
				  <th>UserId</th>
                  <th>User Name</th>
                
                   <th>Rating</th>
                  <th>Comments</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				@if(count($Review) > 0)
                @foreach($Review as $review)
                <tr>
				<td>{{++$i}}</td>
				<td>{{ucfirst($review->user_id)}}</td>
				<td>{{ucfirst($review->UserName)}}</td>
				
				<td>{!!$review->rating!!}</td>
				<td>{!!$review->comments!!}</td>
                  
				<td>
				<a class="btn btn-info" href="/admin/edit-review/{{$productreviewId}}/{{base64_encode($review->review_id)}}">Edit</a>
					
				<button type="button" class="btn btn-danger confirmDialog" recordid="{{base64_encode($review->review_id)}}">Delete</button>
				</td>
					
                </tr>
                @endforeach
				@else
			<tr><td colspan="7">No record.</td></tr>
		@endif
		</tbody>
	  </table>
	</div>
	<!-- /.box-body -->     
     
    </section>   
<input type="hidden" id="r_id" />
</div>
<script type="text/javascript">
$(document).ready(function(){

  // open modal
  $('.confirmDialog').click(function(){
        var cid = $(this).attr('recordId');       
        $('#r_id').val(cid);
        $('#popUpinfo').modal('show');
  });

  // if user click on the go button
  $('#SureGo').click(function(){ 
	  window.location.replace(APP_URL+"/admin/delete-review-details/"+$('#r_id').val());      
  });    
});

</script>
     
@endsection
