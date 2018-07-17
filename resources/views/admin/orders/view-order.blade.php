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
        <li class="active">Order Details</li>
      </ol>
    </section>

      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Order No:R$S#{{$OrderId}}</h3>
            </div>
            <section class="content"> 
            <!-- /.box-header -->
        
            <!-- /.box-header -->
             @include('adminlayouts.message')
            
     <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="customerlisttable">
                <thead>
					<tr>
						<th>Sr no.</th>                   
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Total Amount</th>
						<th>Image</th>
						<th>Order Status</th>
					</tr>
                </thead>
                <tbody>
			
				@if(count($orderdetails) > 0)
                @foreach($orderdetails as $viewOrder)

                <tr>
					<td>{{++$i}}</td>
					<td>{{$viewOrder->productName}}</td>
					<td>{{$viewOrder->orderDetailQty}}</td>
					<td>{{$viewOrder->total_amount}}</td>
					<td>
						@php $path = '/uploads/product/image/'.$viewOrder->image ; 
						@endphp
						@if($viewOrder->image)
						<span class="img-admin-Ad"><img style="width:50px; height:50px;" src="{{URL::asset($path) }}" width="50%" class="img-circle" alt=" Not-Found-Image"></span>
						@else
						N/A
						@endif
					</td>
					<td>
						@if($viewOrder->orderDetailStatus == 1)                      
						  <span class="label label-info">Confirmed</span>
						@elseif($viewOrder->orderDetailStatus == 2)
						  <span class="label label-info">Shipped</span>
						@elseif($viewOrder->orderDetailStatus == 3)
						  <span class="label label-success">Deliverd</span>
						@elseif($viewOrder->orderDetailStatus == 4)
						  <span class="label label-danger">Cancel</span>
						@else
						  <span class="label label-warning">Pending</span>
						@endif
						{{--<form action="{{route('admin.order-status')}}" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="orderId" value="{{$viewOrder->order_id}}"/>
							<input type="hidden" name="productId" value="{{$viewOrder->product_id}}"/>
							<select name="status" id="status" onchange="this.form.submit()" required>
								<option value="">Change Status</option>
								<option value="0">Pending</option>
								<option value="1">Confirmed</option>							
								<option value="2">Shipped</option>
								<option value="3">Deliverd</option>
								<option value="4">Cancel</option>
							</select>
						</form>--}}
					</td>
                </tr>
                @endforeach
				    @else
                <tr><td colspan="7">No record.</td></tr>
                @endif
                </tbody>
              </table>
            </div>
    </section>           
   </div>
     
@endsection
