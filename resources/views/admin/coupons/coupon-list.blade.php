@extends('adminlayouts.master')

@section('content')
<!-- Default box -->
<style>
#customerlisttable{
	max-width: auto !important;
}
</style>
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin/home"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active">Discounts And Offers list</li>
		</ol>
    </section>
    <div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Discounts And Offers list</h3>
			<!-- form for seraching here-->
				@include('adminlayouts.partials.CoupanSearchForm')
			<!-- end here-->
		</div>
		<section class="content"> 
			@include('adminlayouts.message')
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover" id="customerlisttable" style="width:1300px">
					<thead>
						<tr>
							<th>Sr. No</th>
							@php
							if(app('request')->input('order-by') == 'asc')
							  $orderBy = 'desc';
							else
							  $orderBy = 'asc';  
							  if( app('request')->input('page'))
							  $page = app('request')->input('page');
							else
							  $page = 1;                      
							@endphp
						  
							<th>Name</th>
							<th>Coupon Code</th>
							<th>Discount</th>
							<th>Minimum Order Price</th>
							<th>Valid From</th>
							<th>Valid To</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(count($coupons) > 0)
							@foreach($coupons as $coupon)
							<tr>
								<td>{{++$i}}</td>
								<td>{{ucfirst($coupon->name)}}</td>
								<td>{{$coupon->coupon_code}}</td>               
								<td>Rs. {{$coupon->discount}}</td>               
								<td>Rs. {{$coupon->amount_limit}}</td>              
								<td>{!!date("d M Y ",strtotime($coupon->valid_from))!!}</td>              
								<td>{!!date("d M Y ",strtotime($coupon->valid_to))!!}</td>               
								<td>
									@if($coupon->status == 1)
										<span class="label label-success">Active</span>
									@else
										<span class="label label-warning">Inactive</span>
									@endif
								</td> 
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
										<ul class ="dropdown-menu" role="menu">
										  <li><a href="{{ $url = route('admin.coupon.show', [$coupon->coupon_id]) }}">View</a></li>
										  <li><a class="confirmDialog" href="javascript:void(0);" recordId="{{$coupon->coupon_id}}">Delete</a></li>
										  <li><a href="{{ route('admin.coupon.edit',[$coupon->coupon_id]) }}">Edit</a></li>
										</ul>
									</div>
								</td>                
							</tr>
						@endforeach
						@else
						<tr ><td colspan="7">No record.</td></tr>
						@endif
					</tbody>
				</table>
				<div class="row">
					<div class="dataTables_info" id="datatable-responsive_info" role="status" aria-live="polite">
						{{ $coupons->appends(request()->except('page'))->links() }}
					</div>
				</div>
			</div>
			<!-- /.box-body -->     
			<input type="hidden" id="c_id" />
		</section>
	</div>
  <script type="text/javascript">
$(document).ready(function(){

  // open modal
  $('.confirmDialog').click(function(){
        var rid = $(this).attr('recordId');
        $('#c_id').val(rid);    
        $('#popUpinfo').modal('show');
  });

  // if user click on the go button
  $('#SureGo').click(function(){ 
	  window.location.replace(APP_URL+"/admin/coupon/delete/"+$('#c_id').val());         
          
  });
    
});
</script>   
@endsection
