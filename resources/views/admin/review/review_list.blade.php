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
				<h3 class="box-title">Review's list</h3>
				@include('adminlayouts.partials.ReviewSearchForm')
			</div>
		<section class="content"> 
				<!-- /.box-header -->
				@include('adminlayouts.message')
	   
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover" id="customerlisttable">
				<thead>
					<tr>
						<th style="width:10%;">Sr.No</th>
						<th style="width:10%;">Product Name</th>
						<th style="width:10%">Average Rating</th>
						<th style="width:05%;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($productReview) > 0)
					@foreach($productReview as $p_review)
					<tr>
						<td>{{++$i}}</td>
						<td>{{ucfirst($p_review->productName)}}</td>
						<td>{{$rating[$p_review->productId]}}</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ route('admin.view.review', ['id' =>base64_encode($p_review->productId)]) }}">View Review</a>
									</li>
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
     
@endsection
