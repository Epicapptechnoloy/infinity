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
        <li class="active">Banner list</li>
      </ol>
    </section>
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Banner's list</h3>
		</div>
		<section class="content"> 
				<!-- /.box-header -->
			@include('adminlayouts.message')
			<div class="box-body table-responsive no-padding">
			<table class="table table-hover" id="customerlisttable">
				<thead>
					<tr>
					   <th style="width:10%;">Sr.No</th>
					   <th style="width:10%;">Banner Name</th>
					   <th style="width:10%">Status</th>
					  <th style="width:10%">Banner Image</th>
					   <th style="width:05%;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($banner) > 0)
					@foreach($banner as $b_data)
					<tr>
						<td>{{++$i}}</td>
						<td>{{ucfirst($b_data->bannerName)}}</td>
						<td>
						@if($b_data->status == 1)
						  <span class="label label-success">Active</span>
						@else
						  <span class="label label-warning">Inactive</span>
						@endif
						</td>
						<td>
							@php $path = '/uploads/banner/image/'.$b_data->bannerImage;
							@endphp
							@if($b_data->bannerImage)
							<span class="img-admin-Ad"><img style="width:50px; height:50px;" src="{{URL::asset($path) }}" width="50%" class="img-circle" alt=" Not-Found-Image"></span>
							@else
							N/A
							@endif
						</td>  
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
								<ul class ="dropdown-menu" role="menu">
							
									<li><a class="confirmDialog" href="javascript:void(0);" recordId="{{base64_encode($b_data->banner_id)}}">Delete</a></li>
									<li><a href="{{route('admin.banner.edit',[base64_encode($b_data->banner_id)])}}">Edit</a></li>
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
			</div>
		<!-- /.box-body -->     
		</section>
	</div>
	<input type="hidden" id="b_id" />
	<script type="text/javascript">
		$(document).ready(function(){
			// open modal
			$('.confirmDialog').click(function(){
				var cid = $(this).attr('recordId');       
				$('#b_id').val(cid);
				$('#popUpinfo').modal('show');
			});
			// if user click on the go button
			$('#SureGo').click(function(){ 
				window.location.replace(APP_URL+"/admin/banner/delete/"+$('#b_id').val());      
			});    
		});

	</script>
  
@endsection
