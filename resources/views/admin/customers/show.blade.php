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
								@if(!empty($customer))  
								<tr>
									<td><b>User name</b></td>
								<td><b>{!! $customer['name'] !!}</b></td>
								</tr>
								<tr>
									<td><b>Email</b></td>
									<td><b>{!! $customer['email'] !!}</b></td>
								</tr>
								<tr>
									<td><b>Contact</b></td>
									<td><b>{!!  ucfirst($customer['number']) !!}</b></td>
								</tr>
								<tr>
									<td><b>Status</b></td>
									<td style="<?php echo ($customer['status']==1)? "color:green;":"color:red;";?>" ><b><?php echo ($customer['status']==1)? "Active":"Inactive";?></b></td>
								</tr>
								<tr>
									<td><b>Pin Code</b></td>
									<td><b>{!! $customer['zipcode'] !!}</b></td>
								</tr>
								<tr>
									<td><b>Address</b></td>
									<td><b>{!! date('d M Y',strtotime($customer['address']))!!}</b></td>
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
