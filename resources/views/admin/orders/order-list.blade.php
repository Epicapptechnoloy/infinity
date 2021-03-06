@extends('adminlayouts.master')

@section('content')

<style>
#customerlisttable{
	min-height:300px !important;
}
</style>
<!-- Default box -->
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Order list</li>
      </ol>
    </section>

      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Order's list</h3>
			  
			  @include('adminlayouts.partials.OrderSearchForm')
			  
            </div>
            <section class="content"> 
            <!-- /.box-header -->
        
            <!-- /.box-header -->

            
     <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="customerlisttable">
                <thead>
                <tr>
                  <th>Sr No.</th>                   
                  <th>Order No.</th>                   
                 
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Order Date</th>
                 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
			
			@if(count($orders) > 0)
                @foreach($orders as $order)

                <tr>
                  <td>{{++$i}}</td>
                  <td>R$S#{{$order->order_id}}</td>
                 
                  <td>{{$order->userName}}</td>
                  <td>{{$order->email}}</td>
				 <td>{!!date("d M Y h:i A",strtotime($order->odOrderDate))!!}</td>
                 
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
							<ul class ="dropdown-menu" role="menu">
							
							  <li><a class="confirmDialog" href="javascript:void(0);" recordId="{{$order->order_id}}">Delete</a></li>
							  <li><a href="{{route('admin.order.view-order',[base64_encode($order->order_id)])}}">View Order</a></li>
							  <li><a href="{{route('admin.order.invoice-no',[base64_encode($order->order_id)])}}">View InvoiceNo</a></li>
							</ul>
						</div>
					</td>
                  </td>                
                </tr>
                @endforeach
				    @else
                <tr ><td colspan="7">No record.</td></tr>
                @endif
                </tbody>
              </table>
            </div>
    </section>
	<input type="hidden" id="o_id" />
   </div>
    <script type="text/javascript">
$(document).ready(function(){

  // open modal
  $('.confirmDialog').click(function(){
        var cid = $(this).attr('recordId');       
        $('#o_id').val(cid);
        $('#popUpinfo').modal('show');
  });

  // if user click on the go button
  $('#SureGo').click(function(){ 
	  window.location.replace(APP_URL+"/admin/order/delete/"+$('#o_id').val());      
  });    
});

</script> 
@endsection
