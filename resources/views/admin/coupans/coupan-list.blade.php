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
			<li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
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
						  
							<th>Coupan Id</th>
							<th>Name</th>
							<th>Code</th>
							<th>Discount</th>
							<th>Minimum Order</th>
							<th>Total Discount</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Uses total</th>
							<th>Uses Per Customer</th>                  
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(count($coupans) > 0)
							@foreach($coupans as $coupan)

							<tr>
							 <td>{{++$i}}</td>
							  <td>{{ $coupan->coupon_id}}</td>
							  <td>{{ucfirst($coupan->name)}}</td>
							  <td>{{$coupan->code}}</td>               
							  <td>{{$coupan->discount}}</td>               
							  <td>{{$coupan->min_total}}</td>              
							  <td>{{$coupan->total}}</td>               
							  <td>{{$coupan->date_start}}</td>              
							  <td>{{$coupan->date_end}}</td>               
							  <td>{{$coupan->uses_total}}</td>               
							  <td>{{$coupan->uses_customer}}</td>               
							  <td>
								@if($coupan->status == 1)
								  <span class="label label-success">Active</span>
								@else
								  <span class="label label-warning">Inactive</span>
								@endif
							  </td> 
							  <td>
								<div class="btn-group">
									<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
									<ul class ="dropdown-menu" role="menu">
									  <li><a href="{{ $url = route('admin.coupan.show', [$coupan->coupon_id]) }}">View</a></li>
									  <li><a class="confirmDialog" href="javascript:void(0);" recordId="{{$coupan->coupon_id}}">Delete</a></li>
									  <li><a href="{{ route('admin.coupan.edit',[$coupan->coupon_id]) }}">Edit</a></li>
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
						{{ $coupans->appends(request()->except('page'))->links() }}
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
	  window.location.replace(APP_URL+"/admin/coupan/delete/"+$('#c_id').val());         
          //~ $.ajax({
               //~ type:'GET',
               //~ url:'customer/delete/'+$('#rec_id').val(),
               //~ data:'_token = <?php echo csrf_token() ?>',
               //~ success:function(data){
                  //~ $('#popUpinfo').modal('hide');
                  
                  //~ if(data.error == 0){
                    //~ $('#msgContainer').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4><p>'+data.message+'</p>');
                  //~ }else{
                        //~ $('#msgContainer').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Alert!</h4><p>'+data.message+'</p>');
                  //~ }
                  //~ $('#RecordNo_'+$('#rec_id').val()).remove();
               //~ }
            //~ });
  });
    
});
</script>   
@endsection
