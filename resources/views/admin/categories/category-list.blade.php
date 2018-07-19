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
			<li class="active">Category list</li>
		</ol>
    </section>

    <div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Category list</h3>
		  <!-- form for seraching here-->
			@include('adminlayouts.partials.CategorySearchForm')
		<!-- end here-->
		  
		</div>
    <section class="content"> 
           
	<!-- /.box-header -->
	@include('adminlayouts.message')
            
    
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="customerlisttable">
			<thead>
				<tr>
					<th style="width:10%">Id</th>
					<th style="width:20%">Name</th>
					<th style="width:20%">Description</th>
					<th style="width:20%">Status</th>
					<th style="width:20%">Image</th>
					<th style="width:10%">Action</th>
				</tr>
			</thead>
            <tbody>
				@if(count($categories) > 0)
                @foreach($categories as $category)
                <tr>
					<td>{{ $category->category_id}}</td>
					<td>{{ucfirst($category->name)}}</td>
					<td>{!!$category->description!!}</td>               
					<td>
						@if($category->status == 1)
						  <span class="label label-success">Active</span>
						@else
						  <span class="label label-warning">Inactive</span>
						@endif
					</td>
					<td>
						@php $path = '/assets/upload/images/category/'.$category->image ; 
						@endphp
						@if($category->image)
						<span class="img-admin-Ad"><img style="width:50px; height:50px;" src="{{URL::asset($path) }}" width="50%" class="img-circle" alt=" Not-Found-Image"></span>
						@else
						N/A
						@endif
					</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
							<ul class ="dropdown-menu" role="menu">
							
							  <li><a class="confirmDialog" href="javascript:void(0);" recordId="{{base64_encode($category->category_id)}}">Delete</a></li>
							  <li><a href="{{route('admin.category.edit',[base64_encode($category->category_id)])}}">Edit</a></li>
							</ul>
						</div>
					</td>
                </tr>
                @endforeach
				@else
				<tr><td colspan="7">No record.</td></tr>
				@endif
			</tbody>
		</table>
		<div class="row">
			<div class="dataTables_info" id="datatable-responsive_info" role="status" aria-live="polite">
				{{ $categories->appends(request()->except('page'))->links() }}
			</div>
		</div>
	</div>
	<!-- /.box-body -->     
     
    </section>   
<input type="hidden" id="c_id" />
</div>
<script type="text/javascript">
$(document).ready(function(){

  // open modal
  $('.confirmDialog').click(function(){
        var cid = $(this).attr('recordId');       
        $('#c_id').val(cid);
        $('#popUpinfo').modal('show');
  });

  // if user click on the go button
  $('#SureGo').click(function(){ 
	  window.location.replace(APP_URL+"/admin/category/delete/"+$('#c_id').val());      
  });    
});

</script>
     
@endsection
