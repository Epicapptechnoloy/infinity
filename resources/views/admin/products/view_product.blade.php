@extends('adminlayouts.master')
@section('content')

	<!-- Right side column. Contains the navbar and content of the page -->
	
	<div class=" col-md-offset-11 paddingBottom10">
		<a class="btn btn-primary" href="{{ URL::previous() }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a> 
	</div>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
					</div>
				<!-- /.box-header -->
					<div class="box-body" >
						<table class="table table-bordered table-hover">
							<thead>
								<tr><th><b>Key</b></th>
								<th><b>Value</b></th></tr>
							</thead>
							<tbody>
								@if(!empty($Product))  
								<tr>
									<td><b>Product Name</b></td>
								<td><b>{!! $Product->productName !!}</b></td>
								</tr>
								<tr>
									<td><b>Category Name</b></td>
									<td><b>{!! $Product->CategoryName !!}</b></td>
								</tr>
								<tr>
									<td><b>Model</b></td>
									<td><b>{!! $Product->model !!}</b></td>
								</tr>
								<tr>
									<td><b>Sku</b></td>
									<td><b>{!! $Product->sku !!}</b></td>
								</tr>
								<tr>
									<td><b>Status</b></td>
									<td style="<?php echo ($Product->status==1)? "color:green;":"color:red;";?>" ><b><?php echo ($Product->status==1)? "Active":"Inactive";?></b></td>
								</tr>
								<tr>
									<td><b>Price</b></td>
									<td><b>{!! $Product->price !!}</b></td>
								</tr>
								
								<tr>
									<td><b>Date available</b></td>
									<td><b>{!! date('d M Y',strtotime($Product->date_available))!!}</b></td>
								</tr>
								<tr>
									<td><b>Image</b></td>
									<td>
										<div class="col-xs-6">
											@php
												 $path = '/uploads/product/image/'.$Product->productImage; 
												
											@endphp
											<span class="info-box-icon2">
												@if($Product->image)
												<img src="{{URL::asset($path) }}" width="10%" class="img-circle" alt=" image">
												@else
												<b>N/A</b>
												@endif
											</span>	
										</div>
									</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
				<!-- /.box-body -->
				</div>
			  <!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		  <!-- /.row -->
	</section>
	   <!-- /.content -->
<!-- /.right-side -->

@endsection
