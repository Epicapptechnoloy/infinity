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
              <h3 class="box-title">Invoice Number:{!! 'RAS#-'.$invoiceNo->invoice_no !!}</h3> </br>
			  <h3 class="box-title">Invoice Date:{!!date("d M Y h:i A",strtotime($invoiceNo->created_at))!!}</h3></br>
			  <h3 class="box-title">Order Number:R$S#{!! $OrderId !!}</h3></br>
			  <h3 class="box-title">Order Date:{!!date("d M Y h:i A",strtotime($invoiceNo->created_at))!!}</h3>
			  
             
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
					
				</tr>
			</thead>
			<tbody>
		
			@if(count($invoiceDetails) > 0)
			@foreach($invoiceDetails as $invoiceData)

			<tr>
				<td>{{++$i}}</td>
				
				<td>{{$invoiceData->productName}}</td>
				<td>{{$invoiceData->orderDetailQty}}</td>
				<td>{{$invoiceData->total_amount}}</td>
				<td>
					@php $path = '/uploads/product/image/'.$invoiceData->image ; 
					@endphp
					@if($invoiceData->image)
					<span class="img-admin-Ad"><img style="width:50px; height:50px;" src="{{URL::asset($path) }}" width="50%" class="img-circle" alt=" Not-Found-Image"></span>
					@else
					N/A
					@endif
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
