@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3></h3>

					<p>Orders({{$totalOrders}})</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="{{ route('admin.order-list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3></h3>

					<p>Customers({{$totalUser}})</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="{{ route('admin.customers') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3></h3>
					<p>Products({{$totalProducts}})</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="{{ route('admin.product-list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         
        </div>
        <!-- ./col -->
    </div>
      <!-- /.row -->
	<div class="row">
		<div class="col-md-12">
			<div class="custom-heading">
				Activity Tracking
				&nbsp;
				<small>(last 7 days)</small>
			</div>
		</div>
	</div>

    <div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Users</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
			</div>
		</div>
		<!-- /.box-header -->
		
		<div class="box-body">
			<div class="table-responsive">
				<table class="table no-margin">
					<thead>
						<tr>
							<th>U_ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Status</th>
							<th>Created Date</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($customers) > 0): ?>    
								<?php foreach($customers as $customer): ?>
										<tr>
											<td>{{$customer->id}}</td>
											<td><?=$customer->name?></td>
											<td><?=$customer->email?></td>
											<td>
												@if($customer->status == 1)
													<span class="label label-success">Active</span>
												@else
													<span class="label label-danger">Inactive</span>
												@endif
											</td>
											 <td><?=date("d M Y h:i A",strtotime($customer->created_at))?></td>
											
										</tr>
								<?php endforeach; ?>
						<?php else: ?>
								<tr>
									<td colspan="5" class="no-record">
										No records found.
									</td>
								</tr>
						<?php endif; ?>    
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.box-body -->
		
		<div class="box-footer clearfix">
		{{--<a href="{{ route('new-customer') }}" class="btn btn-sm btn-info btn-flat pull-left">Add New Customer</a>--}}
			<a href="{{ route('admin.customers') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Customer</a>
		</div>
		<!-- /.box-footer -->
    </div>
                   
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Orders</h3>
  
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			
			<div class="box-body">
				<div class="table-responsive">
					<table class="table no-margin">
						<thead>
							<tr>
								<th>O_ID</th>
								<th>User Name</th>
								<th>Order Number</th>  
								<th>Order Date</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($orders) > 0): ?>    
									<?php foreach($orders as $order): ?>
											<tr>
												<td><?=$order->user_id?></td>
												<td><?=$order->userName?></td>
												<td>R$S#<?=$order->order_id?></td>
												<td><?=date("d M Y h:i A",strtotime($order->orderDate))?></td>
											</tr>                                    
									<?php endforeach; ?>
							<?php else: ?>
									<tr>
										<td colspan="7" class="no-record">
											No records found.
										</td>
									</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>  
			
			<div class="box-footer clearfix">
				<!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
				<a href="{{ route('admin.order-list') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
			</div>             
		</div>
		
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Discount And Offers</h3>
  
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			
			<div class="box-body">
				<div class="table-responsive">
					<table class="table no-margin">
						<thead>
							<tr>
								<th>D_ID</th>
								<th>Name</th>
								<th>Code</th>
								<th>Discount</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($coupans) > 0): ?>    
									<?php foreach($coupans as $coupan): ?>                                    
											<tr>
												<td><?=$coupan->coupon_id?></td>
												<td><?=$coupan->name?></td>
												<td><?=$coupan->code?></td>
												<td><?=$coupan->discount?></td>
												 <td><?=date("d M Y h:i A",strtotime($coupan->date_start))?></td>
												 <td><?=date("d M Y h:i A",strtotime($coupan->date_end))?></td>
												
												<td>
													@if($coupan->status == 1)                      
													  <span class="label label-success">Active</span>
													
													@else
													  <span class="label label-danger">Expired</span>
													@endif
												</td>
											</tr>
									<?php endforeach; ?>
							<?php else: ?>
									<tr>
										<td colspan="7" class="no-record">
											No records found.
										</td>
									</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			 <div class="box-footer clearfix">
				<a href="{{ route('admin.AddCoupanForm') }}" class="btn btn-sm btn-info btn-flat pull-left">Add New Discount And Offers</a>
				<a href="{{ route('admin.coupan-list') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Discount And Offers</a>
			</div>     
			<!-- /.box-body -->
        </div>
            
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Products</h3>
  
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			
			<div class="box-body">
				<div class="table-responsive">
					<table class="table no-margin">
						<thead>
							<tr>
								<th>P_ID</th>
								<th>Name</th>
								<th>SKU</th>
								<th>Model</th>
								<th>Price</th>                                    
								<th>Status</th>
								<th>Created Date</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($products) > 0): ?>    
									<?php foreach($products as $product): ?>                                    
											<tr>
												<td><?=$product->product_id?></td>
												<td><?=$product->name?></td>
												<td><?=$product->sku?></td>
												<td><?=$product->model?></td>                                                   
												<td><?=$product->price?></td>                                                   
												<td>@if($product->status == 1)
													  <span class="label label-success">Active</span>
													@else
													  <span class="label label-warning">Inactive</span>
													@endif
												</td>
											   
												 <td><?=date("d M Y h:i A",strtotime($product->created_at))?></td>
											</tr>
									<?php endforeach; ?>
							<?php else: ?>
									<tr>
										<td colspan="7" class="no-record">
											No records found.
										</td>
									</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			 <div class="box-footer clearfix">
				<a href="{{ route('admin.add.product') }}" class="btn btn-sm btn-info btn-flat pull-left">Add New Product</a>
				<a href="{{ route('admin.product-list') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Product</a>
			</div>     
			<!-- /.box-body -->
		</div>
@endsection
