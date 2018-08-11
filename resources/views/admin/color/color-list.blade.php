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
			<li class="active">Available Color</li>
		</ol>
    </section>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Color List</h3>
		</div>
		<section class="content"> 
			<!-- /.box-header -->
			@include('adminlayouts.message')
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover" id="customerlisttable">
					<thead>
						<tr>
						    <th style="width:10%;">Sr.No</th>
						    <th style="width:10%;">Color Code</th>
						    <th style="width:10%;">Color Name</th>
						    <th style="width:10%">Status</th>
						    <th style="width:05%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@if(count($Colors) > 0)
						@foreach($Colors as $color)
							<tr>
								<td>{{++$i}}</td>
								<td>{{ucfirst($color->color_code)}}</td>
								<td>{{ucfirst($color->color_name)}}</td>
								<td>
									@if($color->status == 1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-warning">Inactive</span>
									@endif
								</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
										<ul class ="dropdown-menu" role="menu">
											<li><a class="confirmDialog" href="javascript:void(0);" recordId="{{base64_encode($color->color_id)}}">Delete</a></li>
											<li><a href="{{route('editColor',[base64_encode($color->color_id)])}}">Edit</a></li>
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
	<input type="hidden" id="c_id" />
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
				window.location.replace(APP_URL+"/admin/color/delete/"+$('#c_id').val());      
			});    
		});

	</script>
  
@endsection
